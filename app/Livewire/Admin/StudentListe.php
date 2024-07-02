<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class StudentListe extends Component
{




    #[Layout('components.layouts.admin-layout')]
    public function render()
    {
        return view('livewire.admin.student-liste',[
            'students' => User::role('Student')->orderBy('id','desc')->get(),
        ]);
    }
}
