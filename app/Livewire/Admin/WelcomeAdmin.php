<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class WelcomeAdmin extends Component
{
    public function mount() {
        //dd(Auth::user()->hasRole('Teacher'));
            if (Auth::check()) {
                if (!Auth::user()->hasRole('Admin')) {
                    return redirect()->route('welcome');        
                }
            }
    }

    #[Layout('components.layouts.admin-layout')]
    public function render()
    {
        return view('livewire.admin.welcome-admin');
    }
}
