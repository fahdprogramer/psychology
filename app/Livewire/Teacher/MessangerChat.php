<?php

namespace App\Livewire\Teacher;

use App\Models\Discussion;
use App\Models\Notification;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MessangerChat extends Component
{
    public string $content = '';
    public $sponsorship,$professor,$student;

    public function mount(User $student_id) {
        $this->student = $student_id;
        $this->sponsorship = Sponsorship::where('student_id',$student_id->id)->where('teacher_id',Auth::user()->id)->where('state','accepted')->first();
        if (!$this->sponsorship) {
            return redirect()->route('welcome');
        }
        $this->professor = Auth::user();
    }

    public function send() {
        if ($this->content!='') {
          $message = new Discussion();
        $message->sender_id = $this->professor->id;
        $message->reciver_id =  $this->student->id;
        $message->discussion_id = $this->sponsorship->id;
        $message->content = $this->content;
        $message->save();  
        $this->content='';
        }
        
    }

    public function finish() {
        $this->sponsorship->state = 'finished';
        $this->sponsorship->save();
        $notification = new Notification();
        $notification->user_id = $this->student->id;
        $notification->content = 'لقد أنهى الاستاذ "'.$this->professor->name.'" المرافقة، حظا موفقا لك في مسارك الدراسي! ';
        $notification->save();
        $notification2 = new Notification();
        $notification2->user_id = 1;
        $notification2->content = 'لقد أنهى الاستاذ "'.$this->professor->name.'" مرافقت الطالب "'.$this->student->name.'"!';
        $notification2->save();
        return redirect()->route('welcome.teacher');
        
    }

    
    public function presence() {
        $this->sponsorship->presence = !$this->sponsorship->presence ;
        $this->sponsorship->save();
        if ($this->sponsorship->presence) {
            $notification = new Notification();
        $notification->user_id = $this->student->id;
        $notification->content = 'لقد طلب الاستاذ "'.$this->professor->name.'" أن تكون هناك مرافقة حطورية بينكما ';
        $notification->save();
        } else {
            $notification = new Notification();
        $notification->user_id = $this->student->id;
        $notification->content = 'لقد ألغى الاستاذ "'.$this->professor->name.'" طلبه في أن تكون بينكما مرافقة حظورية ';
        $notification->save();
        }
        
        
    }

    

    
    #[Layout('components.layouts.teacher-layout')]
    public function render()
    {
        return view('livewire.teacher.messanger-chat',[
            'messages' => Discussion::where('discussion_id',$this->sponsorship->id)->orderBy('id','asc')->get(),
        ]);
    }
}