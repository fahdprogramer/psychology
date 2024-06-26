<?php

namespace App\Livewire\Student;

use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SponsorshipTimer extends Component
{
    public $timer;
    public function render()
    {
        
      
            $this->timer = Sponsorship::where('student_id', Auth::user()->id)->where('state', 'on_standby')->first();

        if ($this->timer) {
            if ($this->timer->created_at->diffInMinutes() > 2880) { // tow days -> 2880 min
                $this->timer->state = 'ignored';
                $this->timer->save();
                //return redirect()->route('welcome');
            }
        }
        
        
        
        return view('livewire.student.sponsorship-timer');
    }
}