<?php

namespace App\Livewire\Other;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NbrNotification extends Component
{
    public function render()
    {
        if (Auth::check()) {
           return view('livewire.other.nbr-notification',[
            'nbr' => Notification::where('user_id',Auth::user()->id)->count(),
        ]);  
        } else {
            return view('livewire.other.nbr-notification',[
            'nbr' => 0,
        ]); 
        }
        
       
    }
}
