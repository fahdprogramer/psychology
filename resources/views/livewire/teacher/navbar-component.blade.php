<nav class='p-4 flex justify-between items-center text-xs sm:text-sm md:text-base bg-rose-100'>
    <a href="{{ route('welcome.teacher') }}" class='flex justify-center items-center'>
        <button class='p-4 rounded-full bg-rose-200 ml-2'>logo</button>
        <h1>اسم الموقع</h1>
    </a>
    @auth
        <div class="hidden sm:flex justify-center items-center">
            <button
                class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300">حسابي</button>
            @auth
                <a href="{{ route('show.notifications') }}">
                    <button
                        class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300 flex">الإشعارات
                        (<livewire:other.nbr-notification>) </button>
                </a>
            @endauth

        </div>
    @endauth
    <div class="flex justify-center items-center">
        <a href="{{ route('show.notifications') }}" class="sm:hidden">
            <livewire:other.nbr-notification>
        </a>
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-black sm:hidden rotate-90  bg-slate-300 flex justify-center items-center hover:bg-slate-200 focus:ring-4 focus:outline-none focus:ring-slate-200 font-medium 
rounded-lg text-sm px-2 py-1 pt-2 text-center dark:bg-slate-600 dark:hover:bg-slate-700 
dark:focus:ring-slate-200 "
            type="button"> ااا

        </button>
    </div>

    <!-- Dropdown menu -->
    <div id="dropdown"
        class="z-10 hidden bg-slate-200 divide-y divide-gray-100 rounded-lg shadow w-fit dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            @auth
                <li class="mb-3">
                    <a href="{{ route('profile') }}">
                        <button
                            class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300">حسابي</button>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('welcome') }}">
                        <button
                            class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300 flex">
                            الصفحة الرئيسية
                        </button>
                    </a>
                </li>
            @endauth
            @guest
                <li class="">
                    <a href="{{ route('login') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">تسجيل
                        الدخول</a>
                </li>
            @endguest
            @auth
                <li class="">
                    <button wire:click='logout'
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-600">تسجيل
                        الخروج</button>
                </li>
            @endauth

        </ul>
    </div>

    <div class="hidden sm:flex">
        @guest

            <a href="{{ route('login') }}"
                class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg  px-5 py-2.5 text-center ">تسجيل
                الدخول
                في الموقع</a>
        @endguest
        @auth
            <button wire:click='logout'
                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg  px-5 py-2.5 text-center ">تسجيل
                الخروج</button>
        @endauth

    </div>
</nav>
