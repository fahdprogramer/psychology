<?php

namespace App\Livewire\Teacher;

use Livewire\Attributes\Layout;
use Livewire\Component;

class TeacherNotification extends Component
{
    #[Layout('components.layouts.teacher-layout')]
    public function render()
    {
        return view('livewire.teacher.teacher-notification');
    }
}
