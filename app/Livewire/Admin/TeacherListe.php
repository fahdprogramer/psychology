<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TeacherListe extends Component
{
    #[Layout('components.layouts.admin-layout')]
    public function render()
    {
        return view('livewire.admin.teacher-liste',[
            'teachers' => User::role('Teacher')->orderBy('id','desc')->get(),
        ]);
    }
}
