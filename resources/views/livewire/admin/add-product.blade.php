<div class="p-4 sm:p-8 md:p-12 lg:p-20 text-center">
    <h1 class="font-bold text-3xl mb-4">إضافة لباس جديد</h1>
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-1">


        <div class="md:px-12">
            <form wire:submit="save">
            <select wire:model.live="category" id="countries"
                class="bg-slate-200  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                style="animation-delay:1.2s;">
                <option selected>إختر نوع اللباس</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <div class="min-h-[16px]">
                @error('category')
                    <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                @enderror
            </div>

            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                style="animation-delay:1.2s;">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-xs opacity-50 mx-1"> سعر البدلة</span>

                    </div>

                    <input wire:model.live='price' type="number" id="price" name="price" wire:model="price" required 
                        autocomplete="price"
                        class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                </div>
                <div class="min-h-[16px]">
                    @error('price')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>

            <div class="bg-slate-200 rounded-3xl border border-slate-400 py-2 cursor-pointer {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
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
                        <input type="file" class="hidden" wire:model="photo" name="image" id="upload">
                        <h1 class="text-center text-slate-400 text-sm font-semibold ">قم برفع الصورة الرئيسية لهذه
                            البدلة</h1>

                    </label>

                </div>
            </div>
            @error('photo')
                <h1 class="error text-center text-red-600">{{ $message }}</h1>
            @enderror

            <button type="submit"
                                class="text-white mt-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                إضافة  </button>
            </form>
        </div>


        <div class="flex justify-center items-center px-14 sm:px-20">
            <div class="rounded-2xl border border-amber-400 hover:shadow-2xl shadow-slate-200 w-full">
                <div class="w-full h-64 sm:h-72  overflow-hidden relative">
                    <h1 class="absolute py-1 px-3 {{ $category ? '' : 'hidden' }} min-w-10 text-center bg-[#74ecc8] rounded-2xl top-3 left-2">
                        {{ $category ? $category : '' }}</h1>
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" id="myImg{{ 0 }}"
                            class="w-full h-64 sm:h-72 rounded-t-2xl hover:scale-125 transition duration-300"
                            alt="Roseline Store">
                    @else
                        <img src="empty" id="myImg{{ 0 }}"
                            class="w-full h-64 sm:h-72 rounded-t-2xl hover:scale-125 transition duration-300"
                            alt="Roseline Store">
                    @endif

                </div>

                <div class="px-2 sm:px-6 py-2">
                    <h1 class="text-lg font-bold text-left">{{ $price ? $price : '0' }} دج</h1>
                    <button
                        class="flex items-center text-xs sm:text-sm md:text-lg text-[#1c5f4b] p-1 rounded-2xl border m-2 border-amber-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 ml-1">
                            <path fill-rule="evenodd"
                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                clip-rule="evenodd" />
                        </svg>

                        أضف إلى السلة</button>
                </div>

            </div>
        </div>


    </div>

</div>
