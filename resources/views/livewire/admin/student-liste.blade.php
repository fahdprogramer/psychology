<div class="py-28 px-4 bg-slate-50 bg-opacity-60  min-h-screen">
    <div class="">
       <h1 class="font-bold text-2xl text-blue-900">قائمة الطلبة المسجلين في الموقع</h1>
    @if ($students->isEmpty())
        <h2 class="text-red-500 text-center">قائمة فارغة لايوجد أي طالب حاليا</h2>
    @else  
    </div>
   
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-6">
            <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                <thead class="text-xs text-black font-bold uppercase bg-blue-600 bg-opacity-60 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>

                        <th scope="col" class="px-6 py-3">
                            اسم ولقب الطالب
                        </th>

                        <th scope="col" class="px-6 py-3">
                            الايميل
                        </th>

                        <th scope="col" class="px-6 py-3">
                            رقم الهاتف
                        </th>
                        <th scope="col" class="px-6 py-3">
                            تاريخ الإضافة
                        </th>


                    </tr>
                </thead>
                <tbody class="text-black">
                    @foreach ($students as $item)
                        <tr
                            class="{{ $loop->iteration % 2 == 0 ? 'bg-blue-600' : 'bg-blue-500' }} bg-opacity-40 border-b border-blue-400">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-blue-100">
                                {{ $loop->iteration }}
                            </th>



                            <td class="px-6 py-4 ">
                                {{ $item->name }}
                            </td>

                            <td class="px-6 py-4 ">
                                {{ $item->email }}
                            </td>

                            <td class="px-6 py-4 ">
                                {{ $item->phone }}
                            </td>
                            <td class="px-6 py-4">
                                <div>{{ $item->created_at->format('Y-m-d') }}</div>
                                <div>{{ $item->created_at->format('H:i') }}</div>

                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    @endif


</div>
