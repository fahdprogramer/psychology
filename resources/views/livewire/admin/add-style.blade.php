<div class="p-4 sm:p-8 md:p-12 lg:p-20 ">
    <form wire:submit="save">
    <h1 class="font-bold text-3xl mb-8 text-center">إضافة نموذج جديد للبدلة</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2  text-xs lg:text-sm">
      


        <div class="px-4">
            <div class="flex items-center mb-5">

                <h1 class="font-bold">إختر اللون الخاص بهاذا النموذج</h1>

                <input type="color" class="mx-4" id="head" name="head" wire:model.live='color' />
                {{ $color }}
            </div>
            <div class="flex items-center ">


                <h1 class="font-bold">هل بالأعمار ام بالاحجام</h1>



                <fieldset class="mr-3 flex gap-3">
                    <legend class="sr-only">Countries</legend>

                    <div class="flex items-center ">
                        <input wire:model.live="radio" id="country-option-1" type="radio" name="countries"
                            value="size" wire:click='initialize'
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                            checked>
                        <label for="country-option-1"
                            class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                            بالأحجام
                        </label>
                    </div>

                    <div class="flex items-center ">
                        <input wire:model.live="radio" id="country-option-2" type="radio" name="countries"
                            value="age" wire:click='initialize'
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                        <label for="country-option-2"
                            class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            بالأعمار
                        </label>
                    </div>


                </fieldset>

            </div>
            <h1 class="font-bold mt-5">إختر {{ $radio == 'size' ? 'الأحجام' : 'الأعمار' }} المتوفرة لهذا النموذج</h1>
            <ul class="grid mt-3 grid-cols-3 lg:grid-cols-6 {{ $radio == 'size' ? '' : 'hidden' }}">
                <li wire:click="setValue('s')"
                    class="{{ $s ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    S</li>
                <li wire:click="setValue('m')"
                    class="{{ $m ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-xl shadow-blue-300 text-xs transition-all duration-500">
                    M</li>
                <li wire:click="setValue('l')"
                    class="{{ $l ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    L</li>
                <li wire:click="setValue('xl')"
                    class="{{ $xl ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    XL</li>
                <li wire:click="setValue('xxl')"
                    class="{{ $xxl ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    XXL</li>
                <li wire:click="setValue('xxxl')"
                    class="{{ $xxxl ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    XXXL</li>

            </ul>
            <ul class="grid mt-3 grid-cols-3 lg:grid-cols-6 {{ $radio == 'age' ? '' : 'hidden' }}">
                <li wire:click="setValue('zero')"
                    class="{{ $zero ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    0-1</li>
                <li wire:click="setValue('one')"
                    class="{{ $one ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    1-2</li>
                <li wire:click="setValue('two')"
                    class="{{ $two ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-xl shadow-blue-300 text-xs transition-all duration-500">
                    2-3</li>
                <li wire:click="setValue('three')"
                    class="{{ $three ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    3-4</li>
                <li wire:click="setValue('four')"
                    class="{{ $four ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    4-5</li>
                <li wire:click="setValue('five')"
                    class="{{ $five ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    5-6</li>

                    <li wire:click="setValue('six')"
                    class="{{ $six ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    6-7</li>
                <li wire:click="setValue('seven')"
                    class="{{ $seven ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    7-8</li>
                <li wire:click="setValue('eight')"
                    class="{{ $eight ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-xl shadow-blue-300 text-xs transition-all duration-500">
                    8-9</li>
                <li wire:click="setValue('nine')"
                    class="{{ $nine ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    9-10</li>
                <li wire:click="setValue('ten')"
                    class="{{ $ten ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    10-11</li>
                    <li wire:click="setValue('eleven')"
                    class="{{ $eleven ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    11-12</li>

                    <li wire:click="setValue('twelve')"
                    class="{{ $twelve ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    12-13</li>

                    <li wire:click="setValue('thirteen')"
                    class="{{ $thirteen ? 'bg-blue-900 translate-y-2 text-white font-bold' : '' }} border-2 border-blue-700 p-2 m-3 min-w-12 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400 text-xs transition-all duration-500">
                    13-14</li>

            </ul>
           

            <h1 class="font-bold mt-5">أضف بعض الصور لهذا النموذج</h1>
            <div class="bg-slate-200 mt-5 rounded-3xl border border-slate-400 py-2 cursor-pointer {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                style="animation-delay:1.2s;">
                <div class="flex justify-center ">
                    <label for="upload">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-12 h-12 mx-auto text-slate-600">
                            <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                            <path fill-rule="evenodd"
                                d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="file" class="hidden" wire:model="photos" name="image" id="upload" multiple>
                        <h1 class="text-center text-slate-400 text-sm font-semibold ">قم برفع صورتين على الأقل لهذا النموذج
                            </h1>

                    </label>

                </div>
            </div>
            <div class="grid grid-cols-3 gap-5 mt-4 min-h-56">
                @foreach ($photos as $photo)
                  <img src="{{ $photo->temporaryUrl() }}" class="w-full h-56 rounded-xl" alt="">
              @endforeach
              </div>
            @error('photos.*')
                <h1 class="error text-center text-red-600">{{ $message }}</h1>
            @enderror

          

        </div>

        <div class="px-4">
            <h1 class="font-bold ">قم بتحديد الكمية :</h1>
            @if ($radio=='size')
            <ul class=" mt-4">
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        S</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_s',{{ $nbr_s + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_s }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_s',{{ $nbr_s == 1 ? '' : $nbr_s - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_s'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{ $s? 'hidden' : '' }}"></div>
                </div>
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        M</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_m',{{ $nbr_m + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_m }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_m',{{ $nbr_m == 1 ? '' : $nbr_m - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_m'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{ $m? 'hidden' : '' }}"></div>
                </div>
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-xl shadow-blue-300  transition-all duration-500">
                        L</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_l',{{ $nbr_l + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_l }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_l',{{ $nbr_l == 1 ? '' : $nbr_l - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_l'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{ $l? 'hidden' : '' }}"></div>
                </div>
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        XL</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_xl',{{ $nbr_xl + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_xl }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_xl',{{ $nbr_xl == 1 ? '' : $nbr_xl - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_xl'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{ $xl? 'hidden' : '' }}"></div>
                </div>
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        2XL</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_xxl',{{ $nbr_xxl + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_xxl }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_xxl',{{ $nbr_xxl == 1 ? '' : $nbr_xxl - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_xxl'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{ $xxl? 'hidden' : '' }}"></div>
                </div>
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        3XL</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_xxxl',{{ $nbr_xxxl + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_xxxl }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_xxxl',{{ $nbr_xxxl == 1 ? '' : $nbr_xxxl - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_xxxl'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{ $xxxl ? 'hidden' : '' }}"></div>
                </div>

            </ul>
            @else
            <ul class=" mt-4">
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        0-1</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_zero',{{ $nbr_zero + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_zero }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_zero',{{ $nbr_zero == 0 ? '' : $nbr_zero - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_zero'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $zero? 'hidden' : '' }}"></div>
                </div>
               
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        1-2</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_one',{{ $nbr_one + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_one }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_one',{{ $nbr_one == 0 ? '' : $nbr_one - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_one'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $one? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        2-3</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_two',{{ $nbr_two + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_two }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_two',{{ $nbr_two == 0 ? '' : $nbr_two - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_two'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $two? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        3-4</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_three',{{ $nbr_three + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_three }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_three',{{ $nbr_three == 0 ? '' : $nbr_three - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_three'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $three? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        4-5</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_four',{{ $nbr_four + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_four }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_four',{{ $nbr_four == 0 ? '' : $nbr_four - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_four'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $four? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        5-6</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_five',{{ $nbr_five + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_five }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_five',{{ $nbr_five == 0 ? '' : $nbr_five - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_five'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $five? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        6-7</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_six',{{ $nbr_six + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_six }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_six',{{ $nbr_six == 0 ? '' : $nbr_six - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_six'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $six? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        7-8</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_seven',{{ $nbr_seven + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_seven }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_seven',{{ $nbr_seven == 0 ? '' : $nbr_seven - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_seven'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $seven? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        8-9</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_eight',{{ $nbr_eight + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_eight }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_eight',{{ $nbr_eight == 0 ? '' : $nbr_eight - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_eight'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $eight? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        9-10</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_nine',{{ $nbr_nine + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_nine }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_nine',{{ $nbr_nine == 0 ? '' : $nbr_nine - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_nine'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $nine? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        10-11</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_ten',{{ $nbr_ten + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_ten }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_ten',{{ $nbr_ten == 0 ? '' : $nbr_ten - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_ten'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $ten? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        11-12</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_eleven',{{ $nbr_eleven + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_eleven }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_eleven',{{ $nbr_eleven == 0 ? '' : $nbr_eleven - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_eleven'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $eleven? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        12-13</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_twelve',{{ $nbr_twelve + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_twelve }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_twelve',{{ $nbr_twelve == 0 ? '' : $nbr_twelve - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_twelve'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $twelve? 'hidden' : '' }}"></div>
                </div>
               
          
                <div class="flex items-center relative">
                    <li
                        class="text-xs border-2 border-blue-700 p-2 m-3 w-16 cursor-pointer text-center shadow-lg shadow-blue-300 hover:bg-blue-400  transition-all duration-500">
                        13-14</li>
                    <div class="flex items-center mr-2 md:mr-4 lg:mr-8">
                        <i class="fa-solid fa-square-plus text-3xl text-lime-500"
                            wire:click="$set('nbr_thirteen',{{ $nbr_thirteen + 1 }})"></i>
                        <h1 class="text-xl text-blue-900 font-bold px-2 md:px-4">{{ $nbr_thirteen }}</h1>
                        <i class="fa-solid fa-square-minus  text-3xl text-lime-500"
                            wire:click="$set('nbr_thirteen',{{ $nbr_thirteen == 0 ? '' : $nbr_thirteen - 1 }})"></i>
                        <input type="number" wire:model.live='nbr_thirteen'
                            class="mx-4 bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <div class="absolute bg-white  w-full h-full bg-opacity-70 {{   $thirteen? 'hidden' : '' }}"></div>
                </div>
               
          

            </ul>
            @endif
           

            
            
        </div>

    </div>
    <div class="flex justify-center items-center">
<button type="submit"
                                class="text-white text-xl px-40 mt-4 mx-auto bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg   py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                إضافة  </button>
            </div>
    </form>
</div>
