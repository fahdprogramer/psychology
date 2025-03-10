<?php

namespace App\Livewire\Other;

use App\Models\Discussion;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowNotification extends Component
{
    public $is_reading;

    public function mount() {
        $this->is_reading = Discussion::where('reciver_id',Auth::user()->id)->where('is_reading',false)->count();
    }


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
