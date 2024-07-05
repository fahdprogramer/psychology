<div class="">
@auth
  <div class="px-1 sm:px-2 md:px-5 lg:px-10 xl:px-20 py-20 pb-36 sm:pb-20  min-h-screen">
    

 <div class="p-4">
     <h1 class="font-bold  text-xl">
    مرحبا أيها الطالب <span class="text-blue-800">{{ auth()->user()->name }}</span> !
  </h1> 

 </div>
 <livewire:welcomepage.sponsorship-request>
 
   


        <div class="hidden">
            <livewire:contact-us>
            <livewire:welcomepage.our-testimonial>
        </div>
                
             
        </div>  
@endauth


           
        @guest
        <div class="xl:-px-20">
            <livewire:welcomepage.show-page2>
                       </div>
        @endguest  
    </div>