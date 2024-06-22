<div class="grid  grid-cols-1 md:grid-cols-2 gap-2 md:py-10 lg:py-20 md:px-4 lg:px-10  lg:text-sm">

    <div class="flex justify-center items-center">


        <div class="relative h-[250px] md:h-[350px] w-80">

            <img src="{{ Storage::url($selected_image_url) }}" id="myImg{{ 0 }}"
                class="object-fill -z-50 h-full w-full " alt="Roseline Store">

            <ul class="absolute z-30 flex -translate-x-1/2 bottom-2 left-1/2 ">
                @foreach ($style_images as $key => $image)
                    <button
                        class="w-4 h-4 bg-rose-300 border-2 {{ $key == $order ? 'border-white' : 'border-blue-600' }}  rounded-full mx-1">
                    </button>
                @endforeach
            </ul>
            @if ($style_images->count() > 1)
                <!-- Slider controls -->
                <button wire:click="GoBack" type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-rose-200 border-2 border-blue-400 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-blue-400 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button wire:click="GoAhead" type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-rose-200 border-2 border-blue-400 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-blue-400 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            @endif
        </div>



    </div>




    <div class="p-4">
        @role('Admin')
            <div class="flex justify-between items-center">
                <a href="{{ route('edit.style', [$selected_style->id]) }}" class="">
                    <h1 class="bg-lime-300 mb-6 p-2 rounded-xl border-2 border-lime-500 w-fit">تعديل هذا النموذج</h1>
                </a>
                <a href="{{ route('add.style', [$selected_style->product->id]) }}" class="">
                    <h1 class="bg-lime-300 mb-6 p-2 rounded-xl border-2 border-lime-500 w-fit">إضافة نموذج جديد</h1>
                </a>

            </div>
        @endrole
        <h1 class="font-bold ">إختر اللون الذي تريده</h1>
        <ul class="flex my-2 z-0">

            @foreach ($styles as $style)
                <div wire:click="setSelected_style({{ $style }})"
                    class="relative  ml-6 {{ $selected_style->id == $style->id ? 'shadow-black  translate-y-2' : '' }}  transition-all -z-0 duration-300 hover:shadow-orange-950  w-fit  rounded-full cursor-pointer">
                    <div class="absolute   w-full h-full"></div>
                    <input type="color"
                        class="border-transparent  {{ $selected_style->id == $style->id ? 'shadow-orange-400 shadow' : '' }} "
                        disabled id="head" name="head" value="{{ $style->color }}" />

                </div>

                <span>
                </span>
            @endforeach
        </ul>

        <h1 class="font-bold mt-3">إختر الحجم الذي يناسبك</h1>
        <ul class="grid  grid-cols-3 lg:grid-cols-6 my-2 {{ $selected_style->ageORsize == 'age' ? 'hidden' : '' }}">
            <button class="{{ $selected_size == 's' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->s ? 'border-blue-700' : 'border-red-700') }} border-2   p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("s")'>
                S</button>
            <button class="{{ $selected_size == 'm' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->m ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("m")'>
                M</button>
            <button class="{{ $selected_size == 'l' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->l ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("l")'>
                L</button>
            <button class="{{ $selected_size == 'xl' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->xl ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("xl")'>
                XL</button>
            <button class="{{ $selected_size == 'xxl' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->xxl ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("xxl")'>
                XXL</button>
            <button class="{{ $selected_size == 'xxxl' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->xxxl ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("xxxl")'>
                XXXL</button>

        </ul>
        <ul class="grid  grid-cols-3 lg:grid-cols-6 my-2 {{ $selected_style->ageORsize == 'age' ? '' : 'hidden' }}">
            <button class="{{ $selected_size == 'zero' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->zero ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("zero")'>
                0-1</button>
            <button class="{{ $selected_size == 'one' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->one ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("one")'>
                1-2</button>
            <button class="{{ $selected_size == 'two' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->two ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("two")'>
                2-3</button>
            <button class="{{ $selected_size == 'three' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->three ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("three")'>
                3-4</button>
            <button class="{{ $selected_size == 'four' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->four ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("four")'>
                4-5</button>
            <button class="{{ $selected_size == 'five' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->five ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("five")'>
                5-6</button>
            <button class="{{ $selected_size == 'six' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->six ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("six")'>
                6-7</button>
            <button class="{{ $selected_size == 'seven' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->seven ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("seven")'>
                7-8</button>
            <button class="{{ $selected_size == 'eight' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->eight ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("eight")'>
                8-9</button>
            <button class="{{ $selected_size == 'nine' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->nine ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("nine")'>
                9-10</button>
            <button class="{{ $selected_size == 'ten' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->ten ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("ten")'>
                10-11</button>
            <button class="{{ $selected_size == 'eleven' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->eleven ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("eleven")'>
                11-12</button>
            <button class="{{ $selected_size == 'twelve' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->twelve ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("twelve")'>
                12-13</button>
            <button class="{{ $selected_size == 'thirteen' ? 'bg-blue-900 translate-y-2 text-white border-blue-200' : ($selected_style->thirteen ? 'border-blue-700' : 'border-red-700') }} border-2 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg transition-all duration-300 shadow-blue-300 hover:bg-blue-400 text-xs"
                wire:click='setSelected_size("thirteen")'>
                13-14</button>


        </ul>


        <div class="min-h-3 mb-6 sm:flex justify-between items-center mt-5">
            <div>
                <div class="mb-4 sm:mb-0 {{ $selected_size ? '' : 'hidden' }}">

                    <h1 class="text-red-600 text-center {{ $selected_style->$selected_size ? 'hidden' : '' }}">هذا
                        المنتج غير متوفر في المخزون</h1>
                    <h1 class="text-blue-950 text-center {{ $selected_style->$selected_size ? '' : 'hidden' }}">بقي في
                        المخزون <span class="font-bold"> {{ $selected_style->{'nbr_' . $selected_size} }} قطع</span>
                    </h1>
                </div>
            </div>


            <a href="https://api.whatsapp.com/send?phone=0674317033" class="flex justify-center items-center">
                <h1
                    class="flex justify-center p-1 rounded-lg items-center {{ $selected_style->$selected_size ? 'text-blue-950' : 'text-lime-700' }}  text-center border border-lime-700">
                    <i class="fa-brands fa-square-whatsapp text-3xl ml-3"></i>
                    إضغط هنا لتتواصل معنا عبر الواتساب
                </h1>
            </a>
        </div>
        <div class="{{ $selected_style->$selected_size ? 'flex' : 'hidden' }} justify-between items-center ">
            <h1 class="font-bold mt-3">إختر الكمية اللتي تريدها</h1>
            <div class="text-xl">
                <button class="font-bold rounded-full border-rose-400 border-2 px-2 py-0.5"
                    wire:click="$set('quantity',{{ $quantity != $selected_style->{'nbr_' . $selected_size} ? $quantity + 1 : $quantity }})">+</button>
                <span class="mx-4">{{ $quantity }}</span>
                <button class="font-bold rounded-full border-rose-400 border-2 px-2 py-0.5"
                    wire:click="$set('quantity',{{ $quantity != 1 ? $quantity - 1 : $quantity }})">-</button>
            </div>
            <div></div>
        </div>

        <div class="flex justify-between items-center ">

            <button wire:click='AddToCard({{ $selected_style->id }})'
                class="{{ $selected_style->$selected_size && !$in_card ? 'flex' : 'hidden' }} mb-4 sm:mb-0  items-center text-xs sm:text-sm text-[#1c5f4b] p-2 rounded-2xl border m-2 border-[#1c5f4b]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 ml-1">
                    <path fill-rule="evenodd"
                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                        clip-rule="evenodd" />
                </svg>

                أضف إلى السلة</button>
            <button wire:click='RemoveFromCard({{ $selected_style->id }})'
                class="{{ $selected_style->$selected_size && $in_card ? 'flex' : 'hidden' }} mb-4 sm:mb-0  items-center text-xs sm:text-sm text-[#5f1c55] p-2 rounded-2xl border m-2 border-[#b93a3a]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 ml-1">
                    <path fill-rule="evenodd"
                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                        clip-rule="evenodd" />
                </svg>

                حذف من السلة</button>
            <a href="{{ route('complete.card.process', [$selected_style->id, $selected_size, $quantity]) }}"><button
                    class="{{ $selected_style->$selected_size ? 'flex' : 'hidden' }}  items-center text-xs sm:text-sm text-[#1c5f4b] p-2 rounded-2xl border m-2 border-[#1c5f4b]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 ml-1">
                        <path fill-rule="evenodd"
                            d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                            clip-rule="evenodd" />
                    </svg>

                    شراء هذا المنتج فقط اللآن</button></a>

        </div>

    </div>
</div>
