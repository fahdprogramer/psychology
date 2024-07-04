<div wire:poll class="">
    <div class="hidden sm:block">
        {{ $nbr }}
    </div>
    <div class="relative m-6 inline-flex w-fit sm:hidden">
        @auth
            @if ($nbr)
                <div
                    class="absolute  bottom-auto left-0 right-auto top-0 z-10 inline-block -translate-x-2/4 
    -translate-y-1/2 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 rounded-full bg-pink-700 
    p-2.5 text-xs">
                </div>
            @endif
        @endauth


        <div
            class="flex items-center p-1 justify-center rounded-lg bg-indigo-400   text-center text-white shadow-lg dark:text-gray-200">
            <span class="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </div>
    </div>
</div>
