<?php

namespace App\Livewire\Admin;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class AdminNavbar extends Component
{
    public function logout(Logout $logout)
    {
        $logout();

        return redirect()->route('login');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-navbar');
    }
}
