<?php

namespace App\Livewire\Student;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SponsorshipTimer extends Component
{
    public function render()
    {
        return view('livewire.student.sponsorship-timer',[
            'timer' => Sponsorship::where('student_id',Auth::user()->id)->where('state','on_standby')->first(),
        ]
    
    );
    }
}
