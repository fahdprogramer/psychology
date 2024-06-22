<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg shadow-slate-200">
    <div
        class="hidden sm:flex justify-between items-center text-[10px] md:text-xs lg:text-sm mx-10 md:mx-20 lg:mx-32 px-4 py-2 bg-[#79dfc1] rounded-tl-3xl rounded-br-3xl rounded-tr-lg rounded-bl-lg">
        <div class="flex z-10 items-center">
            <a href=""><span class="mx-1 hover:text-amber-700">Roseline Store</span></a>
            <a href="mailto:roselinestore24@gmail.com"><span
                    class="mx-1 hover:text-amber-700">roselinestore24@gmail.com</span></a>

        </div>
        <ul class="flex items-center">
            <a href="" class="flex items-center hover:text-amber-500"><span
                    class="border-l-2 ml-0.5 h-4 rotate-12 border-slate-500 hover:text-amber-500"></span>
                <li class="mx-1 hover:text-amber-700">سياسة الخصوصية</li>
            </a>
            <a href="" class="flex items-center hover:text-amber-500"><span
                    class="border-l-2 ml-0.5 h-4 rotate-12 border-slate-500 hover:text-amber-500"></span>
                <li class="mx-1 hover:text-amber-700">شروط الاستخدام</li>
            </a>
            <a href="" class="flex items-center hover:text-amber-500"><span
                    class="border-l-2 ml-0.5 h-4 rotate-12 border-slate-500 hover:text-amber-500"></span>
                <li class="mx-1 hover:text-amber-700">البيع والاسترجاع</li>
            </a>
        </ul>

    </div>
    <div
        class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2 sm:px-6 md:py-4 lg:p-8  relative ">
        <a href="/" class="md:w-24 lg:w-72 hidden md:flex items-center space-x-3 rtl:space-x-reverse ">
            <img src="/images/icon/icon.png" class="md:w-36 md:h-20 lg:w-72  h-36 absolute z-0 md:top-1 lg:top-1"
                alt="RoseLine" />
        </a>


        <div class="hidden w-full md:block md:w-auto mb-2" id="navbar-dropdown">
            <ul
                class="flex flex-col md:text-sm  xl:text-lg font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-2 lg:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 {{ request()->routeIs('welcome') ? 'text-white md:text-blue-700 bg-blue-700
 md:bg-transparent' : 'md:hover:text-blue-700 hover:bg-gray-100' }}   rounded  md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent hover:transition-all hover:duration-300"
                        aria-current="page">الرئيسية</a>
                </li>
                <li>
                    <a href="{{ route('show.all.products') }}"
                        class="block py-2 px-3 text-gray-900 rounded {{ request()->routeIs('show.all.products') ? 'text-white md:text-blue-700 bg-blue-700
 md:bg-transparent' : 'md:hover:text-blue-700 hover:bg-gray-100' }}  md:hover:bg-transparent md:border-0  md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent hover:transition-all hover:duration-300">قائمة
                        المنتجات</a>
                </li>
                @role('Admin')
                    <li>
                        <a href="{{ route('add.product') }}"
                            class="block py-2 px-3 text-gray-900 rounded  {{ request()->routeIs('add.product') ? 'text-white md:text-blue-700 bg-blue-700
 md:bg-transparent' : 'md:hover:text-blue-700 hover:bg-gray-100' }} md:hover:bg-transparent md:border-0  md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 scale-105 dark:hover:text-white md:dark:hover:bg-transparent hover:transition-all hover:duration-300 font-bold">إضافة</a>
                    </li>
                    <li>
                        <a href="{{ route('show.sells') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent hover:transition-all hover:duration-300">المبيعات</a>
                    </li>
                
                @endrole

                <li class="hidden">
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent hover:transition-all hover:duration-300">خدمات</a>
                </li>
                @unlessrole('Admin')
                    <li>
                        <a href="{{ route('welcome') }}#contact_us"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent hover:transition-all hover:duration-300">راسلنا</a>
                    </li>
                @endunlessrole
                @guest
                    <li>
                        <a href="{{ route('login') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent hover:transition-all hover:duration-300"
                            aria-current="page">الدخول</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent hover:transition-all hover:duration-300"
                            aria-current="page">التسجيل</a>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="flex justify-between md:justify-center  w-full md:w-fit items-center">


            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center ml-3  p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="flex items-center">
                @auth
                    <a href="{{ route('show.card') }}" class="ml-3 relative">
                        <i
                            class="fa fa-shopping-bag fa-2x text-xl sm:text-2xl md:text-3xl text-[#79dfc1] hover:text-amber-500 hover:transition-all hover:duration-500"></i>
                        <span
                            class="absolute bg-amber-500 rounded-full text-xs p-0.5 -top-1 left-3 min-w-5 flex items-center justify-center text-black">{{ $numCard }}</span>
                    </a>
                @endauth
                @guest
                    <a href="{{ route('show.guest.card') }}" class="ml-3 relative">
                        <i
                            class="fa fa-shopping-bag fa-2x text-xl sm:text-2xl md:text-3xl text-[#79dfc1] hover:text-amber-500 hover:transition-all hover:duration-500"></i>
                        <span
                            class="absolute bg-amber-500 rounded-full text-xs p-0.5 -top-1 left-3 min-w-5 flex items-center justify-center text-black">{{ $numCard }}</span>
                    </a>
                @endguest



                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar">
                    <i
                        class="fas fa-user fa-2x text-xl ml-3 sm:text-2xl md:text-3xl  text-[#79dfc1] hover:text-amber-500 hover:transition-all hover:duration-500"></i></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar"
                    class="z-10 hidden font-normal bg-slate-200  divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:transition-all hover:duration-300">الصفحة الشخصية</a>
                        </li>
                        <li>
                            <a href="#"
                                class=" hidden px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:transition-all hover:duration-300">الأرباح</a>
                        </li>
                        <li>
                            <a href="#"
                                class="hidden px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:transition-all hover:duration-300">التعديلات</a>
                        </li>

                    </ul>
                    @auth
                        <div wire:click="logout" class=" block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white hover:transition-all hover:duration-300">تسجيل
                                الخروج
                        </div>
                    @endauth

                </div>


                <div class="relative hidden">
                    <div class="absolute inset-y-0 end-3 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-[#79dfc1] dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full  ps-4 text-sm text-gray-900 border border-amber-500 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="بحث عن منتج ..." required />
                </div>
            </div>

        </div>

    </div>
</nav>
