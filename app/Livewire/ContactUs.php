<?php

namespace App\Livewire;

use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactUs extends Component
{

    
    use LivewireAlert;

    
    #[Validate('required')]
    public string $name = '';


    #[Validate('required')]
    public string $title = '';


    #[Validate('required')]
    public string $email = '';


    #[Validate('required')]
    public string $content = '';

    public function save()
    {
        $this->validate();
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->title = $this->title;
        $contact->content = $this->content;
        $contact->save();

        $this->alert('success', 'فريق روزلين يشكركم على مراسلتكم له، سيتم الرد على رسالتكم قريبا');
        return redirect('/');
    }



    
    public function render()
    {
        return view('livewire.contact-us');
    }
}
