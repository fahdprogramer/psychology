<?php

namespace App\Livewire\Welcomepage;

use App\Models\Product;
use Livewire\Component;

class AllProducts extends Component
{

    public $category='all';

    public function render()
    {
if ($this->category=='all') {
    return view('livewire.welcomepage.all-products',[
            'products' => Product::all(),
        ]);
} elseif ($this->category=='women') {
    return view('livewire.welcomepage.all-products',[
            'products' => Product::where('type','نساء')->get(),
        ]);
} elseif ($this->category=='boys') {
    return view('livewire.welcomepage.all-products',[
        'products' => Product::where('type','أولاد')->get(),
        ]);
} elseif ($this->category=='girls') {
    return view('livewire.welcomepage.all-products',[
            'products' => Product::where('type','بنات')->get(),
        ]);
} elseif ($this->category=='babys') {
    return view('livewire.welcomepage.all-products',[
            'products' => Product::where('type','رضع')->get(),
        ]);
} elseif ($this->category=='children') {
    return view('livewire.welcomepage.all-products',[
            'products' => Product::where('type','رضع')->orwhere('type','بنات')->orwhere('type','أولاد')->get(),
        ]);
} else {
    
}

        
    }
}
