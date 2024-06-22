<?php

namespace App\Livewire\Admin;

use App\Models\Request;
use Livewire\Component;

class ShowSells extends Component
{
    public function render()
    {
        return view('livewire.admin.show-sells',[
            'sells' => Request::groupBy('req_num')->get(),
        ]);
    }
}
