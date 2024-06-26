<?php

namespace App\Livewire\Teacher;

use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SponsoredsRequest extends Component
{
    use LivewireAlert;

    public $mysponsored;

    public function accept(Sponsorship $sponsorship)
    {
       /*  if ($sponsorship->state == 'ignored') {
            $this->alert('info', 'لقد ألغي الطلب، مر أكثر من يومين على الطلب !!');
            return redirect()->route('welcome.teacher');
        } */
        $sponsorship->state = 'accepted';
        $sponsorship->save();
        return redirect()->route('teacher.chat.messanger', [$sponsorship->student_id]);
    }

    public function refuse(Sponsorship $sponsorship)
    {
       /*  if ($sponsorship->state == 'ignored') {
            $this->alert('info', 'لقد ألغي الطلب، مر أكثر من يومين على الطلب !!');
            return redirect()->route('welcome.teacher');
        } */
        $sponsorship->state = 'refused';
        $sponsorship->save();
    }

    public function info(Sponsorship $sponsorship) {
        $this->alert('info', $sponsorship->content, [
            //'position' => 'center',
            'timer' => '10046',
            'toast' => true,
            //'showCancelButton' => true,
           ]);
    }

    public function render()
    {
        $this->mysponsored = Sponsorship::where('teacher_id', Auth::user()->id)->where('state', 'on_standby')->get();
if (!$this->mysponsored->isEmpty()) {
  foreach ($this->mysponsored as $item) {
            

      
            if ($item->created_at->diffInMinutes() > 2880) { // tow days -> 2880 min
                $item->state = 'ignored';
                $item->save();
            }
        
        }  
}
        
        return view('livewire.teacher.sponsoreds-request');
    }
}