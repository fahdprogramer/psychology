<div  class="py-10 my-3 px-4 bg-slate-50 bg-opacity-60 rounded-3xl" wire:poll>
    <h1 class="font-bold text-2xl text-lime-900">قائمة الطلبة الذين يطلبون مرافقتك لهم </h1>
    @if ($mysponsored->isEmpty())
       <h2 class="text-red-500 text-center">لاتوجد طلبات مرافقة حاليا</h2> 
       @else
 




<div class="relative overflow-x-auto shadow-md sm:rounded-lg my-6">
    <table class="w-full text-sm text-left rtl:text-right text-lime-100 dark:text-lime-100">
        <thead class="text-xs text-black font-bold uppercase bg-lime-600 bg-opacity-60 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    اسم الطالب
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                      عنوان الطلب
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
            <tr class="{{($loop->iteration % 2 == 0)?'bg-lime-600':'bg-lime-500'}} bg-opacity-40 border-b border-lime-400">
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-lime-100">
                    {{$item->student->name}}
                </th>
            
                <td class="px-6 py-4 ">
                    {{$item->title}}
                    </td>
            
            
                    <td class="px-6 py-4 ">
                        <div class="flex justify-center">
                        <button wire:click='accept({{$item->id}})'  class="text-black mx-auto bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">موافقة</button>
                    </div>
                        </td>
                
                    <td class="px-6 py-4 ">
                        <div class="flex justify-center">
                        <button wire:click='refuse({{$item->id}})'  class="text-black mx-auto bg-gradient-to-r from-rose-400 via-rose-500 to-rose-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-rose-300 dark:focus:ring-rose-800 shadow-lg shadow-rose-500/50 dark:shadow-lg dark:shadow-rose-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">رفض</button>
                    </div>
                        </td>
            </tr>
            @endforeach
            
         
            
        </tbody>
    </table>
</div>
@endif


</div>
