<div class="px-1 sm:px-2 md:px-5 lg:px-10 xl:px-20 py-5">
    @auth
    <div>
        <h1 class="font-bold m-4 text-xl">
       مرحبا دكتور <span class="text-blue-800">{{ auth()->user()->name }}</span> !
     </h1> 
   
    </div>
    <livewire:teacher.sponsored-liste>
    @endauth
      
           <livewire:contact-us>
           
                   
                       
           </div>
   