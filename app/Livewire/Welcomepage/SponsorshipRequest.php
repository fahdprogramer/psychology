<?php

namespace App\Livewire\Welcomepage;

use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SponsorshipRequest extends Component
{

    use LivewireAlert;
    
    public $professors, $selected_professor='',$is_onreq=false ;
    
    #[Validate('required')]
    public string $professor = '';

    #[Validate('required')]
    public string $title = '';
    
    #[Validate('required')]
    public string $content = '';
    
    public function mount()
    {
        $this->professors = User::role('Teacher')->get();
        $this->is_onreq = Sponsorship::where('student_id',Auth::user()->id)->where('state','on_standby')->orwhere('state','accepted')->first();
        if ($this->is_onreq) {
            $this->selected_professor = User::where('id',$this->is_onreq->teacher_id)->first()->name;
        }
//dd($this->is_onreq);
    }

    public function save()
    {
        $this->validate();
        $sponsorship = new Sponsorship();
        $sponsorship->title = $this->title;
        $sponsorship->state = 'on_standby';
        $sponsorship->content = $this->content;
        $sponsorship->student_id = Auth::user()->id;
        $sponsorship->teacher_id = $this->professor;
        $sponsorship->save();
        $this->selected_professor = User::where('id',$this->professor)->first()->name;
        $this->is_onreq=true;
        $this->alert('success', 'تمت إرسال طلبك بنجاح');
       // return redirect()->route('add.style', ['sponsorship' => $sponsorship->id]);
    }
    
    public function render()
    {
        return view('livewire.welcomepage.sponsorship-request');
    }
}