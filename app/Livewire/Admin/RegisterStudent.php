<?php

namespace App\Livewire\Admin;

use App\Models\Specialization;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RegisterStudent extends Component
{
    use LivewireAlert;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $speciality='', $specialities;

    /**
     * Handle an incoming registration request.
     */

     public function mount() {
        $this->specialities = Specialization::all();
        
     }
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required',  'min:10', 'max:13'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        $user->assignRole('Student');
        //DB::table('userspecialities')->insert(['user_id' => $user->id,'speciality_id' => $this->speciality]);
        //Auth::login($user);

        $this->alert('info', 'تمت إضافة حساب الطالب بنجاح', [
            'position' => 'center',
            'timer' => '5046',
            'toast' => true,
            //'showCancelButton' => true,
           ]);
           $this->reset();

       // $this->redirect(RouteServiceProvider::HOME, navigate: true);
        
        //$this->redirectIntended(default: route('welcome', absolute: false), navigate: false);
    }
    #[Layout('components.layouts.admin-layout')]
    public function render()
    {
        return view('livewire.admin.register-student');
    }
}
