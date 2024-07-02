<div>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الصفحة الشخصية') }}
        </h2>
    </x-slot>

    <div class="pt-8 pb-20 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <livewire:myprofile.update-profile />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:myprofile.update-password />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:myprofile.delete-user />
                </div>
            </div>
        </div>
    </div>
</div>
