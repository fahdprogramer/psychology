<div class="px-1 sm:px-2 md:px-5 lg:px-10 xl:px-20 py-5">
    
 @auth
 <div>
     <h1 class="font-bold m-4 text-xl">
    مرحبا سيد <span class="text-blue-800">{{ auth()->user()->name }}</span> !
  </h1> 

 </div>
 <livewire:welcomepage.sponsorship-request>
 @endauth
   
        
        <div class="hidden">
            <livewire:contact-us>
            <livewire:welcomepage.our-testimonial>
        </div>
                
                    
        </div>
