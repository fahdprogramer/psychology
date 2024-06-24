<div class="p-4 bg-[#d7c9b7] bg-opacity-20 lg:px-10 lg:grid grid-cols-2 lg:gap-10 " id="contact_us">
   
    <div class=" w-full">
        <img src="images/other/deal.png" class="w-full" alt="RoseLine">
    </div>
    <div>
        <form wire:submit="save" class="">
            <h1 class="text-2xl m-5 mx-auto text-center font-bold x_wd_display_underline w-fit">مراسلة إدارة الموقع
            </h1>
            <div class="w-full justify-center items-center">

                <div class="relative">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-xs opacity-50 mx-1"> السيد:</span>

                    </div>

                    <input type="text" id="name" name="name" wire:model="name" required
                        class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                </div>
                <div class="min-h-[16px]">
                    @error('name')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>


            <div class="w-full justify-center items-center">



                <div class="relative">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-xs opacity-50 mx-1">الإيميل او الهاتف</span>

                    </div>

                    <input type="text" id="email" name="email" wire:model="email" required
                        class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                </div>
                <div class="min-h-[16px]">
                    @error('email')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>


            <div class="w-full justify-center items-center">



                <div class="relative">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-xs opacity-50 mx-1"> الموضوع</span>

                    </div>

                    <input type="text" id="title" name="title" wire:model="title" required
                        class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                </div>
                <div class="min-h-[16px]">
                    @error('title')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>




            <div class="w-full justify-center items-center">
                <div class="relative">
                    <div class="absolute bottom-1 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-xs opacity-50 mx-1"> أكتب استفسارك هنا</span>

                    </div>

                    <textarea type="text" cols="40" rows="3" type="text" id="content" name="content" wire:model="content"
                        required placeholder="قم بكتابة استفسارك هنا، وسيقوم فريقنا بمراسلتك في أقرب وقت ممكن"
                        class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                </textarea>

                </div>
                <div class="min-h-[16px]">
                    @error('content')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>





            <div class="flex justify-center mt-5">
                <button type="submit"
                    class="text-gray-900  bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">إرسال</button>
            </div>
        </form>
    </div>
</div>
