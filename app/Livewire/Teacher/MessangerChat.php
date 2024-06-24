<?php

namespace App\Livewire\Teacher;

use App\Models\Discussion;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MessangerChat extends Component
{
    public string $content = '';
    public $sponsorship,$professor,$student_id;

    public function mount($student_id) {
        $this->student_id = $student_id;
        $this->sponsorship = Sponsorship::where('student_id',$student_id)->where('teacher_id',Auth::user()->id)->where('state','accepted')->first();
        if (!$this->sponsorship) {
            return redirect()->route('welcome');
        }
        $this->professor = Auth::user();
    }

    public function send() {
        if ($this->content!='') {
          $message = new Discussion();
        $message->sender_id = $this->student_id;
        $message->reciver_id = $this->professor->id;
        $message->discussion_id = $this->sponsorship->id;
        $message->content = $this->content;
        $message->save();  
        $this->content='';
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