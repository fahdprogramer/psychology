<nav class='p-4 flex justify-between items-center text-xs sm:text-sm md:text-base bg-rose-100'>
    <div class='flex justify-center items-center'>
        <button class='p-4 rounded-full bg-rose-200 ml-2'>logo</button>
        <h1>اسم الموقع</h1>
    </div>
    @auth
       <div class="flex justify-center items-center">
        <button class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300">حسابي</button>
        <button class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300">الإشعارات</button>
        <button class="text-center mx-2 px-2 font-bold hover:font-semibold hover:text-blue-700 transition-all duration-300">طلبات المرافقة</button>
    </div> 
    @endauth
    
    <div>
@guest
   
        <a href="{{route('login')}}"
            class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg  px-5 py-2.5 text-center ">تسجيل الدخول
            في الموقع</a>
@endguest
   @auth
        <button wire:click='logout'
            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg  px-5 py-2.5 text-center ">تسجيل
            الخروج</button>
   @endauth     
       
    </div>
</nav>