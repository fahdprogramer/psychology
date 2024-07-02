<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WelcomePage extends Component
{
    public function mount() {
        //dd(Auth::user()->hasRole('Teacher'));
            if (Auth::check()) {
                if (Auth::user()->hasRole('Admin')) {
                    return redirect()->route('welcome.admin');        
                }elseif (Auth::user()->hasRole('Teacher')) {
                    return redirect()->route('welcome.teacher');        
                }
            }
    }
    public function render()
    {
        return view('livewire.welcome-page');
    }
}