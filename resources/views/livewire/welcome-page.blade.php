<div>
<div class="px-1 sm:px-2 md:px-5 lg:px-10 xl:px-20 ">
    
 @auth
 <div class="p-4">
     <h1 class="font-bold  text-xl">
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
        <div class="xl:-px-20">
          <livewire:welcomepage.show-page1>  
        </div>
        
    </div>