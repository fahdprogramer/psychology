<div class="h-full grid grid-cols-5 ">
    <div class="col-span-4 bg-opacity-40 bg-slate-300 h-full p-8">
        <div class="rounded-b-2xl bg-slate-300 h-96 overflow-y-auto p-6 rotate-180">
            <div class="rotate-180">
                @foreach ($messages as $item)
                @if ($item->sender_id==auth()->user()->id)
                <div class="flex justify-start items-center  mb-2">
                    <span class="px-6 py-6 rounded-full bg-rose-300 ml-3">أنت</span>
                    <h1 class="rounded-xl bg-rose-400 w-fit max-w-[60%] px-4 py-2 rounded-tr-none">{{$item->content}}</h1>
                </div>
                    @else
                    <div class="flex justify-start items-center  mb-2" dir="ltr">
                        <span class="px-4 py-6 rounded-full bg-emerald-300 mr-3">الأستاذ</span>
                        <h1
                            class="rounded-xl text-left bg-emerald-400 w-fit max-w-[60%] h-fit px-4 py-2 rounded-tl-none">
                            وعليكم السلام أهلا كيف الحال</h1>
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
    <div class="col-span-1 bg-opacity-40 bg-slate-500 h-full p-6  flex justify-center items-center">
        <div class="">
            <h1 class="text-center">الأستاذ المرافق : <span class="text-blue-900 font-bold">ميدون محمد</span></h1>
        </div>
    </div>
</div>