<div wire:poll class="p-4 bg-[#b1a067] bg-opacity-20 lg:p-10 lg:grid grid-cols-2 lg:gap-10 mb-4  rounded-xl"
    id="contact_us">
    @if ($is_onreq != null)
        <div class="flex justify-center items-center {{ $is_onreq->state == 'on_standby' ? '' : 'hidden' }}">
            <div>
                <h1 class="text-2xl text-center">لديك طلب في انتظار موافقة الأستاذ <span
                        class="text-3xl font-bold text-blue-600">{{ $selected_professor->name }} (
                        <span>{{ $selected_professor->userspeciality->speciality->name }}</span> )</span> </h1>
                <div>
                    <livewire:student.sponsorship-timer>
                </div>

            </div>
        </div>
        <div class="flex justify-center items-center {{ $is_onreq->state == 'accepted' ? '' : 'hidden' }}">
            <div class="">
                <h1 class="text-2xl text-center">أنت في مرافقة مع الأستاذ <span
                        class="text-3xl font-bold text-blue-600">{{ $selected_professor->name }} (
                        <span>{{ $selected_professor->userspeciality->speciality->name }}</span> )</span> </h1>
                <div class="flex justify-center items-center">
                    <a href="{{ route('chat.messanger') }}"
                        class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-16 py-3 mx-auto text-center mt-7">الذهاب
                        إلى
                        الرسائل</a>
                </div>

            </div>
        </div>
    @endif

    @if (!$is_onreq)


        <div>
            @if (!$refuses->isEmpty())
                <h1 class="text-red-700 text-center">لقد رفض طلبك من قبل الأستاذ:
                    @foreach ($refuses as $item)
                        "{{ $item->teacher->name }}" 
                        @if ($loop->last)
                            .
                            @break
                        @endif
                     ، و
                @endforeach
            </h1>
            
        @endif
        <form wire:submit="save" class="">
            @if (!$refuses->isEmpty())
<div class="flex justify-between items-center my-5">
    <h1 class="text-2xl text-center font-bold x_wd_display_underline w-fit">قم باختيار أستاذ آخر</h1>
    <button wire:click='newer' type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">طلب مرافقة جديدة كليا</button>
            
</div>
            @else
            <h1 class="text-2xl m-5 mx-auto text-center font-bold x_wd_display_underline w-fit">طلب مرافقة جديدة
            </h1>
            @endif
            @if ($noTeacher)
                <h1 class="text-red-700 text-center">يجب عليك أن تغير عنوان ومحتوى طلبك بمشكلة منطقية</h1>
            @endif

            <select wire:model.live="professor" id="professors"
                class="bg-slate-200  border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                style="animation-delay:1.2s;">
                <option selected>إختر الأستاذ المرافق</option>
                @foreach ($professors as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} (
                        <span>{{ $item->userspeciality->speciality->name }}</span> )</option>
                @endforeach
            </select>
            <div class="min-h-[16px]">
                @error('professor')
                    <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                @enderror
            </div>





            <div class="w-full justify-center items-center">



                <div class="relative">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-xs opacity-50 mx-1"> عنوان الطلب</span>

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
                        <span class="text-xs opacity-50 mx-1"> محتوى الطلب</span>

                    </div>

                    <textarea type="text" cols="40" rows="3" type="text" id="content" name="content" wire:model="content"
                        required placeholder="قم بكتابة طلبك هنا، وسيقوم الأستاذ بمراسلتك في أقرب وقت ممكن"
                        class="mx-auto bg-slate-200 border px-4 border-gray-300 text-gray-900  rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                </textarea>

                </div>
                <div class="min-h-[16px]">
                    @error('content')
                        <h4 class="text-red-700  text-center"> {{ $message }}</h4>
                    @enderror
                </div>
            </div>





            <div class="flex justify-center w-full mt-5">
                <button type="submit"
                    class="text-gray-900  mb-3 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg  px-20 py-3 text-center mx-auto">إرسال
                    الطلب</button>
            </div>
        </form>
    </div>
@endif

<div class=" w-full h-full">
    <img src="images/other/1.jpg" class="w-full h-full rounded-xl" alt="website">
</div>
</div>
