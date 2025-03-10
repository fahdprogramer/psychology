<nav
    class='absolute z-10  text-white w-full px-4 flex justify-between items-center text-xs sm:text-sm md:text-base bg-black bg-opacity-50'>

    <a href="{{ route('index.page.teacher') }}" class='flex justify-center items-center'>
        <img src="/images/icon/1.png" class="w-20" alt="">
    </a>
    @auth
        <div class=" justify-center items-center hidden sm:flex">


            <a href="{{ route('welcome') }}">
                <button
                    class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300 {{Request()->route()->named('welcome.teacher')? 'text-blue-300' : ''}}">فضاء
                    الأستاذ </button>
            </a>
            <a href="{{ route('teacher.profile') }}">
                <button
                    class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300 {{Request()->route()->named('teacher.profile')? 'text-blue-300' : ''}}">حسابي</button>
            </a>

            <a href="{{ route('show.notifications.teacher') }}">
                <button
                    class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300 {{Request()->route()->named('show.notifications.teacher')? 'text-blue-300' : ''}} flex">الإشعارات
                    (<livewire:other.nbr-notification>)
                </button>
            </a>

        </div>
    @endauth
    <div class="flex justify-center items-center sm:hidden">
        <a href="{{ route('show.notifications.teacher') }}" class="sm:hidden">
            <livewire:other.nbr-notification>
        </a>

        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-white sm:hidden rotate-90 bg-slate-300 flex justify-center items-center hover:bg-slate-200 focus:ring-4 focus:outline-none focus:ring-slate-200 font-medium 
rounded-lg text-sm px-2 py-1 pt-2 text-center dark:bg-slate-600 dark:hover:bg-slate-700 
dark:focus:ring-slate-200"
            type="button"> ااا

        </button>

    </div>


    <!-- Dropdown menu -->
    <div id="dropdown"
        class="z-10 hidden bg-slate-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            @auth
                <li class="mb-3">
                    <a href="{{ route('teacher.profile') }}">
                        <button
                            class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300">حسابي</button>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('welcome') }}">
                        <button
                            class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300 flex">
                            فضاء الأستاذ
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
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">تسجيل
                        الخروج</button>
                </li>
            @endauth

        </ul>
    </div>


    <div class="hidden sm:block">
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
