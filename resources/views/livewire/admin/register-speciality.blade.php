<div>
    <form wire:submit="register">
        @csrf

<div class="grid grid-cols-3 gap-3">
    
    <div class="text-center font-bold flex justify-center items-center"> قم بإضافة تخصص جديد : </div>
    <div class="flex justify-center items-center h-full ">
        
        
            <div class="w-full justify-center items-center {{ $errors->isEmpty() ? 'animate__animated animate__fadeInDown' : ''}}" style="animation-delay:1.2s;" >
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-xs opacity-50 mx-1"> اسم التخصص</span>
                        
                          </div>
                          
                          <input type="text" id="name" name="name" wire:model="name" required  autocomplete="name" class="mx-auto bg-slate-200 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" >
                        </div>
                   <div class="min-h-[16px]">@error('name')<h4 class="text-red-700  text-center"> {{ $message }}</h4>@enderror</div>
            </div>
            
    </div>
    <button type="submit" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 shadow-lg shadow-lime-500/50 rounded-lg text-sm px-9  text-center  font-bold w-fit mx-auto" >إضافة التخصص</button>
    
</div>
    </form>
</div>
