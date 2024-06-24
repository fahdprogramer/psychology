<?php

namespace App\Livewire\Student;

use App\Models\Discussion;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MessangerChat extends Component
{
   
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
        return view('livewire.student.messanger-chat',[
            'messages' => Discussion::where('discussion_id',$this->sponsorship->id)->orderBy('id','asc')->get(),
        ]);
    }
}
