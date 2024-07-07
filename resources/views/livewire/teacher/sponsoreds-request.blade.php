<div class="py-10 my-3 px-4 bg-slate-50 bg-opacity-60 rounded-3xl" wire:poll>
    <h1 class="font-bold text-2xl text-lime-900">قائمة الطلبة الذين يطلبون مرافقتك لهم </h1>
    @if ($mysponsored->isEmpty())
        <h2 class="text-red-500 text-center">لاتوجد طلبات مرافقة حاليا</h2>
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-6">
            <table class="w-full text-sm text-left rtl:text-right text-lime-100 dark:text-lime-100">
                <thead class="text-xs text-black font-bold uppercase bg-lime-600 bg-opacity-60 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            عنوان الطلب
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            عرض المحتوى
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            تأكيد
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            رفض
                        </th>

                    </tr>
                </thead>
                <tbody class="text-black">
                    @foreach ($mysponsored as $item)
                        <tr
                            class="{{ $loop->iteration % 2 == 0 ? 'bg-lime-600' : 'bg-lime-500' }} bg-opacity-40 border-b border-lime-400">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-lime-100">
                                {{ $loop->iteration }}
                            </th>

                            <td class="px-6 py-4 ">
                                {{ $item->title }}
                            </td>


                            <td class="px-6 py-4 ">
                                <div class="flex justify-center">
                                    <button wire:click='info({{ $item->id }})'
                                        class="text-black mx-auto bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm p-1  text-center "><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-8 text-lime-100">
                                            <path fill-rule="evenodd"
                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </td>

                            <td class="px-6 py-4 ">
                                <div class="flex justify-center">
                                    <button
                                        onclick=" 
                                        Swal.fire({
                                            title: 'هل أنت متأكد!',
                                            text: 'ستقوم بالموافقة على الطلب!',
                                            icon: 'تنبيه',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            cancelButtonText: 'إلغاء',
                                            confirmButtonText: 'نعم قم بالموافقة!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                @this.accept({{ $item->id }})
                                            }
                                        })
                                    "
                                        class="text-black mx-auto bg-gradient-to-r from-lime-400 via-lime-500 to-lime-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">موافقة</button>
                                </div>
                            </td>
                            <script></script>
                            <td class="px-6 py-4 ">
                                <div class="flex justify-center">
                                    <button
                                        onclick="
                                         Swal.fire({
                                    title: 'هل أنت متأكد!',
                                    text: 'ستقوم برفض هذه المرافقة!',
                                    icon: 'تنبيه',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    cancelButtonText: 'إلغاء',
                                    confirmButtonText: 'نعم قم بالرفض!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        @this.refuse({{ $item->id }})
                                    }
                                })
                                        "
                                        class="text-black mx-auto bg-gradient-to-r from-rose-400 via-rose-500 to-rose-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-rose-300 dark:focus:ring-rose-800 shadow-lg shadow-rose-500/50 dark:shadow-lg dark:shadow-rose-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">رفض</button>
                                </div>
                            </td>
                        </tr>
                       
                    @endforeach



                </tbody>
            </table>
        </div>
    @endif


</div>
