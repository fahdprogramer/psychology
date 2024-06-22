<div class="py-6">


    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <h1 class="text-5xl text-center mb-4">قائمة الألبسة</h1>
    <div class="flex justify-between items-center">

        <ul class="flex items-center justify-center w-full">
            <div class="grid  grid-cols-3 sm:grid-cols-6 lg:grid-cols-6 gap-5 justify-items-stretch mb-2 lg:mb-0">
                <button
                    class="min-w-max cursor-pointer p-2 text-sm {{ $category == 'all' ? 'bg-amber-400 text-white' : 'bg-slate-200' }}   text-center rounded-xl"
                    wire:click="$set('category','all')">كل الألبسة</button>
                <button
                    class="min-w-max cursor-pointer p-2 text-sm {{ $category == 'women' ? 'bg-amber-400 text-white' : 'bg-slate-200' }}   text-center rounded-xl"
                    wire:click="$set('category','women')">نساء</button>
                <button
                    class="min-w-max cursor-pointer p-2 text-sm {{ $category == 'children' ? 'bg-amber-400 text-white' : 'bg-slate-200' }}   text-center rounded-xl"
                    wire:click="$set('category','children')">أطفال</button>
                <button
                    class="min-w-max cursor-pointer p-2 text-sm {{ $category == 'boys' ? 'bg-amber-400 text-white' : 'bg-slate-200' }}   text-center rounded-xl"
                    wire:click="$set('category','boys')">أولاد</button>
                <button
                    class="min-w-max cursor-pointer p-2 text-sm {{ $category == 'girls' ? 'bg-amber-400 text-white' : 'bg-slate-200' }}   text-center rounded-xl"
                    wire:click="$set('category','girls')">بنات</button>
                <button
                    class="min-w-max cursor-pointer p-2 text-sm {{ $category == 'babys' ? 'bg-amber-400 text-white' : 'bg-slate-200' }}   text-center rounded-xl"
                    wire:click="$set('category','babys')">رضع</button>

            </div>
        </ul>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-8 my-3">

        @foreach ($products as $product)
            <div class="rounded-2xl border border-amber-400 hover:shadow-2xl shadow-slate-200 relative">
                <div class="w-full h-64 sm:h-72  overflow-hidden relative">
                    <h1
                        class="absolute py-1 px-3  min-w-10 text-center {{ $product->type == 'أولاد' ? 'bg-[#74ecc8]' : 'bg-[#ec74da]' }}  {{ $product->type == 'نساء' ? 'border-2 border-[#9f2f8c]' : '' }}  rounded-2xl top-3 left-2 z-50">
                        {{ $product->type }}</h1>
                    <img src="{{ Storage::url($product->photo) }}" id="myImg{{ $product->id }}"
                        class="w-full h-64 sm:h-72 rounded-t-2xl hover:scale-125 transition duration-300"
                        alt="Roseline Store">
                </div>
                <a href="{{ $product->styles->isEmpty() ? '' : route('show.product', [$product->id]) }}">
                    <div class="px-2 sm:px-6 py-2 pb-20 sm:pb-24">
                        <div class="{{ $product->quantity ? 'hidden' : '' }}">
                            <h1 class="text-center text-red-600">قريبا سيتم إضافة مخزون من هذا المنتج</h1>
                        </div>
                        <ul class="grid grid-cols-3 gap-1 sm:gap-3 my-1">
                            <li
                                class="{{ $product->zero ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                0-1</li>

                            <li
                                class="{{ $product->one ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                1-2</li>

                            <li
                                class="{{ $product->two ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                2-3</li>

                            <li
                                class="{{ $product->three ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                3-4</li>

                            <li
                                class="{{ $product->four ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                4-5</li>

                            <li
                                class="{{ $product->five ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                5-6</li>

                            <li
                                class="{{ $product->six ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                6-7</li>

                            <li
                                class="{{ $product->seven ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                7-8</li>

                            <li
                                class="{{ $product->eight ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                8-9</li>

                            <li
                                class="{{ $product->nine ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-xs border-lime-400">
                                9-10</li>

                            <li
                                class="{{ $product->ten ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-xs border-lime-400">
                                10-11</li>

                            <li
                                class="{{ $product->eleven ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-xs border-lime-400">
                                11-12</li>

                            <li
                                class="{{ $product->twelve ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-xs border-lime-400">
                                12-13</li>

                            <li
                                class="{{ $product->thirteen ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-xs border-lime-400">
                                13-14</li>


                            <li
                                class="{{ $product->s ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                S</li>
                            <li
                                class="{{ $product->m ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                M</li>
                            <li
                                class="{{ $product->l ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                L</li>
                            <li
                                class="{{ $product->xl ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                XL</li>
                            <li
                                class="{{ $product->xxl ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                2XL</li>
                            <li
                                class="{{ $product->xxxl ? '' : 'hidden' }} w-fit text-center px-2 bg-lime-50  rounded-xl border text-sm border-lime-400">
                                3XL</li>
                        </ul>
                        <div class="absolute bottom-2 w-full left-0 px-4">
                            <div class="flex justify-between items-center">
                                <h1>الكمية: <span class="font-semibold">{{ $product->quantity }}</span></h1>
                                <h1 class="text-lg font-bold text-left">{{ $product->price }} دج</h1>
                            </div>
                            @unlessrole('Admin')
                                <button
                                    class="flex items-center text-xs sm:text-sm md:text-lg text-[#1c5f4b] p-1  px-5 rounded-2xl border m-2 border-amber-400">


                                    عرض النماذج</button>
                            @else
                                <div class="block sm:flex justify-between  items-center  mt-3  sm:-mr-4 sm:ml-0">
                                    <a href="{{ route('edit.product', [$product->id]) }}" class="">
                                        <h1
                                            class="bg-lime-300 mb-2 text-xs sm:text-sm p-2 rounded-xl border-2 border-lime-500">
                                            تعديل المنتج</h1>
                                    </a>

                                    <a href="{{ route('add.style', [$product->id]) }}" class="">
                                        <h1 class="bg-lime-300 text-xs sm:text-sm p-2 rounded-xl border-2 border-lime-500">
                                            إضافة نموذج</h1>
                                    </a>
                                </div>
                            @endunlessrole

                        </div>
                    </div>
                </a>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImg" + {{ 0 }});
                console.log(img);
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }
            </script>
        @endforeach


    </div>
    @if ($products->isEmpty())
        <h1 class="font-semibold text-center text-red-600 text-xl my-3">قريبا سيتم ملئ هذا الصنف</h1>
        <div class="flex justify-center">
            <img src="/images/other/2.jpg" class="w-full sm:w-1/2" alt="RoseLine">
        </div>
    @endif
</div>
