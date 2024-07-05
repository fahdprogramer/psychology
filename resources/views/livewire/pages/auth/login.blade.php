<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // $intendedUrl = session()->has('url.intended') ? session('url.intended') : RouteServiceProvider::HOME;

        // $this->redirect($intendedUrl, navigate: true);
        if (Auth::user()->hasRole('Admin')) {
            $this->redirectIntended(default: route('welcome.admin', absolute: false), navigate: false);
        }elseif (Auth::user()->hasRole('Teacher')) {
            $this->redirectIntended(default: route('welcome.teacher', absolute: false), navigate: false);
        } else {
            
            $this->redirectIntended(default: route('welcome', absolute: false), navigate: false);
        }
    }
}; ?>


<div class="z-10 flex  items-center justify-center sm:h-full ">
    <style>
        @media (max-width: 639px) {
            .fahd {
                background-image: url('/images/welcomeImages/01.jpg');
                background-position: center;
                background-repeat: repeat;
                background-size: cover;
                position: relative;
            }
        }
    </style>

    <div class="w-full min-[330px]:w-80 sm:w-full  h-fit">
        <a href="{{ route('welcome') }}" class='flex justify-center items-center'>
            <img src="images/icon/1.png" class="w-28" alt="">
        </a>
        <h1 class="flex justify-center items-center mb-5 text-2xl font-bold text-center text-yellow-50  {{ $errors->isEmpty() ? 'animate animate__animated animate__fadeIn' : '' }}"
            style="animation-duration: 2s;animation-delay: 2s;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-8 h-8 ml-3 text-lime-400">
                <path fill-rule="evenodd"
                    d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm5.03 4.72a.75.75 0 0 1 0 1.06l-1.72 1.72h10.94a.75.75 0 0 1 0 1.5H10.81l1.72 1.72a.75.75 0 1 1-1.06 1.06l-3-3a.75.75 0 0 1 0-1.06l3-3a.75.75 0 0 1 1.06 0Z"
                    clip-rule="evenodd" />
            </svg>

            الدخول الى المنصة
        </h1>

        <form wire:submit="login">


            <div class="min-h-[16px] ">
                @error('email')
                    <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                @enderror
            </div>
            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                style="animation-delay: 0.9s;">
                <label class="block mb-2 text-lg font-medium  text-gray-50">الإيميل</label>
                <input type="email" name="email" wire:model="form.email"
                    class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="الايميل">
                <div class="min-h-[16px] ">
                    @error('form.email')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>
            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                style="animation-delay: 0.7s;">
                <label class="block mb-2 text-lg font-medium  text-gray-50">الرقم السري</label>
                <input type="password" name="password" wire:model="form.password"
                    class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="الرمز السري">
                <div class="min-h-[16px] ">
                    @error('form.password')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>

            <div class="flex mt-4 justify-center outline-none transform active:scale-75 transition-transform"><button
                    type="submit"
                    class="text-gray-900 {{ $errors->isEmpty() ? 'animate__animated animate__fadeInUp' : '' }} bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 shadow-lg shadow-lime-500/50 rounded-lg text-sm px-12 py-2.5 text-center me-2 my-2 font-bold "
                    style="animation-duration: 2s;animation-delay: 0s;">الدخول</button>
            </div>
        </form>

        <div class="flex justify-center mt-3 {{ $errors->isEmpty() ? 'animate__animated animate__fadeInUp' : '' }}"
            style="animation-duration: 4s;animation-delay: 3s;">
            <a href="{{ route('password.request') }}" class="flex items-center"
                style="-webkit-tap-highlight-color: transparent;" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 text-red-500">
                    <path fill-rule="evenodd"
                        d="M15.75 1.5a6.75 6.75 0 0 0-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 0 0-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 0 0 .75-.75v-1.5h1.5A.75.75 0 0 0 9 19.5V18h1.5a.75.75 0 0 0 .53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1 0 15.75 1.5Zm0 3a.75.75 0 0 0 0 1.5A2.25 2.25 0 0 1 18 8.25a.75.75 0 0 0 1.5 0 3.75 3.75 0 0 0-3.75-3.75Z"
                        clip-rule="evenodd" />
                </svg>
                <h2
                    class="text-center text-xl text-red-500 mr-2 outline-none transform active:scale-75 transition-transform">
                    نسيت الرمز السري !</h2>
            </a>

        </div>

    </div>
</div>
