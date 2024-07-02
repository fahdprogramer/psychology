<?php

namespace App\Livewire\Admin;

use App\Models\Specialization;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RegisterSpeciality extends Component
{
    use LivewireAlert;

    public string $name = '';

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        Specialization::create($validated);
        $this->flash('info', 'تمت إضافة التخصص بنجاح', [
            'position' => 'center',
            'timer' => '5046',
            'toast' => true,
            //'showCancelButton' => true,
        ]);
        $this->reset();
        return redirect()->route('welcome.admin');
    }


    public function render()
    {
        return view('livewire.admin.register-speciality');
    }
}
