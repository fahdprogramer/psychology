<div class="py-10">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <div class="px-4  pt-2 pb-20 lg:pb-0 lg:px-20">
        @if (!empty($cards))

            <h1 class="font-bold p-2">سلة الطلبيات</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mb-2">
                @foreach ($cards as $mycard)
                    <div class="col-span-1 grid grid-cols-2 bg-[#d7c9b76f] rounded-2xl border-2 border-l-rose-300"
                        wire:key="{{ $mycard['id'] }}">
                        <div class="flex ">

                            <div class="w-full "><img src="{{ Storage::url($mycard['image']) }}"
                                    id="myImg{{ $mycard['id'] }}" class="rounded-3xl object-cover w-full h-60"
                                    alt="RoseLine Store"></div>
                        </div>

                        <div class="py-2 px-2   border-l ">
                            <span class="flex justify-end items-center cursor-pointer">
                                <svg wire:click='RemoveFromCard("{{ $mycard['id'] }}")'
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-8 h-8 text-red-500">
                                    <path fill-rule="evenodd"
                                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </span>
                            <a href="/" class="">
                                <h1 class="text-xs my-4 truncate font-semibold uppercase">المقاس: 
                                   {{$this->convertSize($mycard['size'])}}
                                </h1>
                            </a>
                            <h1 class="text-center mb-4">{{ $mycard['price'] * $mycard['quantity'] }} دج
                            </h1>
                            <div class=" justify-around my-4 items-center">

                                <div class="flex justify-center items-center">
                                    <svg wire:click='increaseNbr("{{ $mycard['id'] }}")'
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-10 h-10 cursor-pointer">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span class="mx-1 text-xl">{{ $mycard['quantity'] }}</span>
                                    <svg wire:click='decreaseNbr("{{ $mycard['id'] }}")'
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-10 h-10 cursor-pointer">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </div>
                            </div>
                            <div>
                                <h1 class="text-red-700 text-center text-xs">بقي في
                                    المخزون <span class="font-bold"> {{ $this->getstyle($mycard['style_id'])->{'nbr_'.$mycard['size']} }} قطع</span> </h1>
                            </div>
                        </div>

                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg" + {{ $mycard['id'] }});
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
                    </div>
                @endforeach
            </div>
            <form wire:submit="completeProcess">

                <div class="relative mt-4 p-2 pt-6 border border-blue-500 rounded-2xl">
                    <h1 class="absolute left-5 -top-3 bg-white px-1">معلومات المشتري</h1>
                    <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                        style="animation-delay:1.2s;">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <span class="text-xs opacity-50 mx-1"> الإسم واللقب</span>
                            </div>

                            <input type="text" id="name" name="name" wire:model="name" required autofocus
                                autocomplete="name"
                                class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                        </div>
                        <div class="min-h-[16px]">
                            @error('name')
                                <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                        style="animation-delay:1.2s;">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <span class="text-xs opacity-50 mx-1"> العنوان</span>
                            </div>

                            <input type="text" id="address" name="address" wire:model="address" required autofocus
                                autocomplete="address"
                                class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                        </div>
                        <div class="min-h-[16px]">
                            @error('address')
                                <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                            @enderror
                        </div>
                    </div>



                    <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                        style="animation-delay: 0.9s;">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <span class="text-xs opacity-50 mx-1">رقم الهاتف</span>

                            </div>

                            <input type="number" id="phone" name="phone" wire:model="phone" required autofocus
                                autocomplete="phone"
                                class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                        </div>
                        <div class="min-h-[16px]">
                            @error('phone')
                                <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : '' }}"
                        style="animation-delay:1.2s;">
                        <div class="relative">
                            <div class="absolute top-12 left-0 flex items-center pl-3 pointer-events-none">
                                <span class="text-xs opacity-50 mx-1"> تعليمات الطلبية</span>

                            </div>

                            <textarea type="text" cols="40" rows="3" id="additional_info" name="additional_info"
                                wire:model="additional_info" required autofocus autocomplete="additional_info"
                                class="mx-auto bg-slate-200 border  px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2"></textarea>
                        </div>
                        <div class="min-h-[16px]">
                            @error('additional_info')
                                <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                            @enderror
                        </div>
                    </div>

                    <h1 class="text-rose-400 text-base  text-center">ملاحظة: سعر التوصيل في داخل مدينة تمنراست <span
                            class="font-bold text-red-600">مجاني</span>

                    </h1>

                </div>



                <div class="flex justify-around items-center mt-2 pt-2 border-t border-purple-500">
                    
                        <button type="submit"
                            class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">شراء
                            الآن</button>
                   
                    <h1>{{ $Totale }} دج</h1>
                </div>
            </form>
        @else
            <div class="p-4 sm:p-8 md:p-12 lg:p-20">
                <h1 class="text-xl text-center">سلتك فارغة قم باختيار بعض المنتجات </h1>
                <div class="flex justify-center items-center mt-8">
                    <a href="{{ route('show.all.products') }}">
                        <button
                            class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            تسوق قائمة المنتجات </button></a>
                </div>

            </div>
        @endif
    </div>





</div>
