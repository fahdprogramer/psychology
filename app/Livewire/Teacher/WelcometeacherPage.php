<?php

namespace App\Livewire\Teacher;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class WelcometeacherPage extends Component
{

    public function mount() {
        //dd(Auth::user()->hasRole('Teacher'));
            if (Auth::check()) {
                if (!Auth::user()->hasRole('Teacher')) {
                    return redirect()->route('welcome');        
                }
            }
    }

    
    #[Layout('components.layouts.teacher-layout')]
    public function render()
    {
        return view('livewire.teacher.welcometeacher-page');
    }
}