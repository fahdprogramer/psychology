<div wire:poll class="h-full sm:grid sm:grid-cols-5 py-20 pb-[150px] sm:pb-20">

    <div class="relative sm:col-span-4 bg-opacity-40 bg-slate-300 h-full p-2 sm:p-8">
       
        @if ($sponsorship->presence)
        <div class="p-2 rounded-2xl shadow-md shadow-red-500 mb-6 text-xs">
            <h2 class="text-red-700 font-bold  text-center">ملاحظة: لقد طلبت أن تكون المرافقة حضورية </h2>
        </div>
    @endif
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown1" 
        class="absolute z-20 p-2" type="button"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="sm:hidden size-9 text-slate-500">
            <path fill-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm0 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM15.375 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                clip-rule="evenodd" />
        </svg>
            </button>
            
            <!-- Dropdown menu -->
            <div wire:ignore id="dropdown1" class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                  <li>
                    <button wire:click='presence' class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">المرافقة الحضورية</button>
                  </li>
                
                  
                  <li>
                    <button onclick="myFunction()" class="block px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">إنهاء المرافقة</button>
                  </li>
                </ul>
            </div>
            
        <div class="rounded-b-2xl bg-slate-300 h-[70svh] sm:h-96 overflow-y-auto p-2 sm:p-6 pb-10 sm:pb-0 rotate-180">
            
            @if ($messages->isEmpty())
                <div class="flex justify-center items-center rotate-180 h-full text-xl">
                    قم بكتابة رسالة ترحيب الى الطالب {{ $student->name }}
                </div>
            @endif

            <div class="rotate-180">

                @foreach ($messages as $item)
                    @if ($item->sender_id == auth()->user()->id)
                        <div class="flex justify-start items-center  mb-2">
                            <span class="sm:px-5 sm:py-5 rounded-full bg-rose-300 ml-3">أنت</span>
                            <h1 class="rounded-xl bg-rose-400 w-fit max-w-[60%] text-xs sm:text-sm px-2 sm:px-4 py-1 sm:py-2 rounded-tr-none">
                                {{ $item->content }}</h1>
                            <h2 class="text-slate-400 text-[8px] sm:text-xs mx-3">{{ $item->created_at->format('H:i Y-m-d') }}</h2>
                        </div>
                    @else
                        <div class="flex justify-start items-center  mb-2" dir="ltr">
                            <span class="sm:px-4 sm:py-6 rounded-full bg-emerald-300 mr-3">الطالب</span>
                            <h1
                                class="rounded-xl text-left bg-emerald-400 w-fit max-w-[60%] text-xs sm:text-sm h-fit px-2 sm:px-4 py-1 sm:py-2 rounded-tl-none">
                                {{ $item->content }}</h1>
                            <h2 class="text-slate-400 text-[8px] sm:text-xs mx-3">{{ $item->created_at->format('Y-m-d H:i') }}</h2>
                        </div>
                    @endif
                @endforeach


            </div>



        </div>
        <form wire:submit="send">
            <div class=" w-full flex items-center rounded-b-2xl bg-slate-300 py-2 px-8">

                <input type="text" id="small-input" wire:model='content'
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                <button type="submit" class="p-1 rounded-md bg-slate-200 bg-opacity-50 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 rotate-180 text-blue-600">
                        <path
                            d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                    </svg>

                </button>
            </div>
        </form>
    </div>
    <div class="col-span-1 bg-opacity-40 bg-slate-500 h-full p-6 hidden sm:flex justify-center items-center">
        <div class="">
            <h1 class="text-center">الطالب : <span class="text-blue-900 font-bold">{{ $student->name }}</span></h1>
            <div class="flex justify-center items-center">
                <button onclick="myFunction()" type="button"
                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-xs px-2 py-2.5 text-center mt-4">إنهاء
                    المرافقة</button>
            </div>
            <div class="flex justify-center items-center mt-6 {{ $sponsorship->presence ? 'hidden' : '' }}">
                <button wire:click='presence' type="button"
                    class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-xs px-2 py-2.5 text-center mt-4">طلب
                    المرافقة الحضورية</button>
            </div>
            <div class="flex justify-center items-center mt-6 {{ $sponsorship->presence ? '' : 'hidden' }}">
                <button wire:click='presence' type="button"
                    class="text-white bg-gradient-to-r from-rose-400 via-rose-500 to-rose-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-rose-300 dark:focus:ring-rose-800 shadow-lg shadow-rose-500/50 dark:shadow-lg dark:shadow-rose-800/80 font-medium rounded-lg text-xs px-2 py-2.5 text-center mt-4">إلغاء
                    طلب المرافقة الحضورية</button>
            </div>
     
        </div>
    </div>
    <script>
        
        function myFunction() {
            Swal.fire({
                title: "هل أنت متأكد!",
                text: "ستقوم بإنهاء هذه المرافقة!",
                icon: "تنبيه",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "إلغاء",
                confirmButtonText: "نعم قم بالإنهاء!"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.finish()
                }
            });
        }
    </script>
</div>
