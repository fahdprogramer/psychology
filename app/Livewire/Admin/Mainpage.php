<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Mainpage extends Component
{
    #[Layout('components.layouts.admin-layout')]
    public function render()
    {
        return view('livewire.admin.mainpage');
    }
}
