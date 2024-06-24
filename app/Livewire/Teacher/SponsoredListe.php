<?php

namespace App\Livewire\Teacher;

use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SponsoredListe extends Component
{
    public function render()
    {
        return view('livewire.teacher.sponsored-liste',[
            'mysponsored' => Sponsorship::where('teacher_id',Auth::user()->id)->where('state','accepted')->get(),
        ]);
    }
}
