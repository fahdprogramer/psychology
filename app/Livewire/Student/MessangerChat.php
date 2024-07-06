<?php

namespace App\Livewire\Student;

use App\Models\Discussion;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class MessangerChat extends Component
{

    use LivewireAlert;

   
    public string $content = '';
    public $sponsorship,$professor;

    public function mount() {
        $this->sponsorship = Sponsorship::where('student_id',Auth::user()->id)->where('state','accepted')->first();
        if (!$this->sponsorship) {
            return redirect()->route('welcome');
        }
        $this->professor = User::where('id',$this->sponsorship->teacher_id)->first();
    }

    public function send() {
        $exist = Sponsorship::where('student_id',Auth::user()->id)->where('state','accepted')->first();
        if (!$exist) {
            $this->flash('info', 'لقد قام الأستاذ بإنهاء مرافقتك', [
                'position' => 'center',
                'timer' => '5046',
                'toast' => true,
                //'showCancelButton' => true,
               ]);
            return redirect()->route('welcome');
        }
        if ($this->content!='') {
          $message = new Discussion();
        $message->sender_id = Auth::user()->id;
        $message->reciver_id = $this->professor->id;
        $message->discussion_id = $this->sponsorship->id;
        $message->content = $this->content;
        $message->save();  
        $this->content='';
        }
        
    }

   

    public function render()
    {
        Discussion::where('reciver_id',Auth::user()->id)->where('is_reading',false)->update(['is_reading'=>true]);

        return view('livewire.student.messanger-chat',[
            'messages' => Discussion::where('discussion_id',$this->sponsorship->id)->orderBy('id','asc')->get(),
        ]);
    }
}