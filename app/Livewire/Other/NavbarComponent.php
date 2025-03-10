<?php

namespace App\Livewire\Other;

use App\Livewire\Actions\Logout;

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
