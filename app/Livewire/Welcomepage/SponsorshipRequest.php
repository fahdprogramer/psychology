<?php

namespace App\Livewire\Welcomepage;

use App\Models\Notification;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SponsorshipRequest extends Component
{

    use LivewireAlert;
    
    public $professors, $selected_professor='',$is_onreq=false,$refuses,$noTeacher=false ;
    
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
            $this->selected_professor = User::where('id',$this->is_onreq->teacher_id)->first();
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
        $this->selected_professor = User::where('id',$this->professor)->first();
        $this->is_onreq=Sponsorship::where('student_id',Auth::user()->id)->where('state','on_standby')->orwhere('state','accepted')->first();
        
        $notification = new Notification();
        $notification->user_id = $this->professor;
        $notification->content = 'لديك طلب جديد لمرافقة طالب من الطلبة';
        $notification->save();

        $this->alert('success', 'تمت إرسال طلبك بنجاح');
       // return redirect()->route('add.style', ['sponsorship' => $sponsorship->id]);
       $this->reset(['title', 'professor','content']);
    }
    
    public function newer() {
        Sponsorship::where('student_id',Auth::user()->id)->where('state','refused')->update(['state'=>'new']);
        return redirect()->route('welcome');
    }
    
    public function render()
    {
        $this->refuses = Sponsorship::where('student_id',Auth::user()->id)->where('state','refused')->orderBy('id','desc')->get();
        if (!$this->refuses->isEmpty()) {
            $this->title = $this->refuses[0]->title;
            $this->content = $this->refuses[0]->content;
            $this->professors = User::role('Teacher')->whereNotIn('id', $this->refuses->select('teacher_id'))->get();
            if ($this->professors->isEmpty()) {
                Sponsorship::where('student_id',Auth::user()->id)->where('state','refused')->update(['state'=>'new']);
                $this->reset(['title', 'professor','content']);
                $notification = new Notification();
        $notification->user_id = Auth::user()->id;
        $notification->content = 'يجب أن تكون مشكلتك منطقية او قم بتغيير عنوان طلبك ومحتواه رجاءا!!';
        $notification->save();
            }
        }else {
            $this->professors = User::role('Teacher')->get();
        }
        
        $this->is_onreq = Sponsorship::where('student_id',Auth::user()->id)->where('state','on_standby')->orwhere('state','accepted')->first();
        return view('livewire.welcomepage.sponsorship-request');
    }
}