<?php

namespace App\Livewire\Teacher;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MessangerPage extends Component
{
    
    public $student;

    public function mount(User $student_id) {
        $this->student = $student_id;
    }
    
    #[Layout('components.layouts.teacher-layout')]
    public function render()
    {
        return view('livewire.teacher.messanger-page');
    }
}
