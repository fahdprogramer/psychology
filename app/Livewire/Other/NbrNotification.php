<?php

namespace App\Livewire\Other;

use App\Models\Discussion;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NbrNotification extends Component
{
    public function render()
    {
        $i = 0;

        if (Discussion::where('reciver_id', Auth::user()->id)->where('is_reading', false)->count()) {
            $i = 1;
        }

        if (Auth::check()) {
            return view('livewire.other.nbr-notification', [
                'nbr' => Notification::where('user_id', Auth::user()->id)->count() + $i,
            ]);
        } else {
            return view('livewire.other.nbr-notification', [
                'nbr' => 0,
            ]);
        }
    }
}
