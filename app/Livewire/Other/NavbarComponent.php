<?php

namespace App\Livewire\Other;

use App\Livewire\Actions\Logout;
use App\Models\Card;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class NavbarComponent extends Component
{




    public function logout(Logout $logout)
    {
        $logout();

        return redirect()->route('login');
    }


    public function render()
    {
        return view('livewire.other.navbar-component');
    }
}
