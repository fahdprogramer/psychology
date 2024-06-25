<?php

namespace App\Livewire\Teacher;

use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SponsoredsRequest extends Component
{

    public function accept(Sponsorship $sponsorship) {
        $sponsorship->state = 'accepted';
        $sponsorship->save();
        return redirect()->route('teacher.chat.messanger',[$sponsorship->student_id]);
    }
    
    public function refuse(Sponsorship $sponsorship) {
        $sponsorship->state = 'refused';
        $sponsorship->save();
    }
    
    public function render()
    {
        return view('livewire.teacher.sponsoreds-request',[
            'mysponsored' => Sponsorship::where('teacher_id',Auth::user()->id)->where('state','on_standby')->get(),
        ]);
    }
}