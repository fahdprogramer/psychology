<div>

<div class="px-1 sm:px-2 md:px-5 lg:px-10 xl:px-20 py-20 pb-36 sm:pb-20  min-h-screen">
    @auth
    <div class="p-4">
        <h1 class="font-bold text-xl">
       مرحبا دكتور <span class="text-blue-800">{{ auth()->user()->name }}</span> !
     </h1> 
   
    </div>
    <livewire:teacher.sponsoreds-request>
      <livewire:teacher.sponsored-liste>
        @endauth
      
        
        
             <div class="hidden">
               <livewire:contact-us>
            </div>      
                       
           </div>
        
           
          </div>