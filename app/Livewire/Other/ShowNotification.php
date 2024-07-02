<?php

namespace App\Livewire\Other;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowNotification extends Component
{


    public function delete(Notification $n) {
        $n->delete();
    }

    public function removeAll() {
        Notification::where('user_id',Auth::user()->id)->delete();
    }


    public function render()
    {
        return view('livewire.other.show-notification',[
            'notifications' => Notification::where('user_id',Auth::user()->id)->orderBy('id','desc')->get() ,
        ]);
    }
}
