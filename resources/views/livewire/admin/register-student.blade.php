<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-6 h-[100vh] justify-center items-center">
    <div class="hidden sm:block col-span-1 md:col-span-3  rounded-3xl sm:rounded-l-none border-r-2  border-cyan-400 lg:col-span-4 w-full h-full"
        style="background-image: url('/images/background/6.jpg');
    background-position: center;
    background-repeat: repeat;
    background-size: cover ;
    position: relative;">
        <div class="flex justify-center items-center h-full rounded-3xl sm:rounded-l-none">
            <a href="{{ route('student.liste') }}">
                <button type="button"
                    class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">عرض
                    قائمة الطلبة</button>
            </a>
        </div>
    </div>
    <div class="w-full  h-full col-span-1 md:col-span-2 rounded-3xl sm:rounded-r-none  lg:col-span-2  justify-center items-center bg-[#0f141d]"
        style="background-image: url('/images/background/9.jpg');background-position: center;
            background-repeat: repeat;
            background-size: cover ;
            position: relative;">
        <div
            class=" flex w-full  h-full justify-center items-center rounded-3xl sm:rounded-r-none bg-white bg-opacity-30  sm:pt-0">
            <div class="w-full px-10 ">
                <a href="/" class="flex justify-center sm:hidden items-center mb-10  ">
                    <div class="logo">
                        <h1 class="text-4xl text-white min-w-max text-center mb-2 sm:mb-0"
                            style="font-family: 'Great Vibes', cursive;
        font-weight: 400;
        font-style: normal;">
                            Student's Haven</h1>
                    </div>
                </a>
                <div class="z-10 sm:h-full flex justify-center sm:items-center rounded-3xl sm:rounded-r-none">
                    <style>
                        @media (max-width: 640px) {
                            .fahd {
                                background-image: url('/images/welcomeImages/01.jpg');
                                background-position: center;
                                background-repeat: repeat;
                                background-size: cover;
                                position: relative;
                            }
                        }

                        @layer base {

                            input[type="number"]::-webkit-inner-spin-button,
                            input[type="number"]::-webkit-outer-spin-button {
                                -webkit-appearance: none;
                                margin: 0;
                            }
                        }
                    </style>
                    <div class="w-full min-[330px]:w-80 sm:w-full  h-fit rounded-3xl sm:rounded-r-none">
                        <h1 class="flex justify-center items-center mb-8 text-2xl font-bold text-center text-yellow-50  {{ $errors->isEmpty() ? 'animate animate__animated animate__fadeIn' : '' }}"
                            style="animation-duration: 2s;animation-delay:2s;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8 ml-3 text-lime-400">
                                <path
                                    d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                            </svg>

                            إضافة حساب لطالب
                        </h1>

                        <form wire:submit="register">
                            @csrf

                            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                                style="animation-delay:1.2s;">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-xs opacity-50 mx-1"> الإسم واللقب</span>

                                    </div>

                                    <input type="text" id="name" name="name" wire:model="name" required
                                        autocomplete="name"
                                        class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                </div>
                                <div class="min-h-[16px]">
                                    @error('name')
                                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                                style="animation-delay: 0.9s;">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-xs opacity-50 mx-1">الإميل</span>

                                    </div>

                                    <input type="text" id="email" name="email" wire:model="email" required
                                        autocomplete="email"
                                        class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                </div>
                                <div class="min-h-[16px]">
                                    @error('email')
                                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                                style="animation-delay: 0.9s;">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-xs opacity-50 mx-1">رقم الهاتف</span>

                                    </div>

                                    <input type="number" id="phone" name="phone" wire:model="phone" required
                                        autocomplete="phone"
                                        class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                </div>
                                <div class="min-h-[16px]">
                                    @error('phone')
                                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                                    @enderror
                                </div>
                            </div>


                            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                                style="animation-delay: 0.7s;">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-xs opacity-50 mx-1">الرمز السري</span>

                                    </div>

                                    <input type="password" id="password" name="password" wire:model="password"
                                        class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                </div>
                                <div class="min-h-[16px]">
                                    @error('password')
                                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                                style="animation-delay: 0.5s;">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-xs opacity-50 mx-1">تأكيد الرمز السري</span>

                                    </div>

                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        wire:model="password_confirmation" required autocomplete="confirmPassword"
                                        class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                </div>
                                <div class="min-h-[16px]">
                                    @error('password_confirmation')
                                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="flex justify-center mt-4 outline-none transform active:scale-75 transition-transform">
                                <button type="submit"
                                    class="text-gray-900 {{ $errors->isEmpty() ? 'animate__animated animate__fadeInUp' : '' }} bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 shadow-lg shadow-lime-500/50 rounded-lg text-sm px-9 py-2.5 text-center me-2 my-2 font-bold"
                                    style="animation-duration: 2s;animation-delay: 0s;">إضافة طالب</button>

                        </form>


                    </div>
                    <a href="{{ route('student.liste') }}"
                        class="sm:hidden flex  justify-center mt-4 outline-none transform active:scale-75 transition-transform"><button
                            type="submit"
                            class="text-gray-900 {{ $errors->isEmpty() ? 'animate__animated animate__fadeInUp' : '' }} bg-gradient-to-r from-blue-200 via-blue-400 to-blue-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-lg text-sm px-16 py-2.5 text-center me-2 my-2 font-bold"
                            style="animation-duration: 2s;animation-delay: 0s;">عرض قائمة الطلبة</button>
                    </a>
                </div>
            </div>
        </div>

    </div>


</div>
