<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    
    #[Validate('image')]
    public $photo;

    #[Validate('required')]
    public string $price = '';

    #[Validate('required')]
    public string $category = '';

    public $product,$craftman,$categories;
    public function mount()
    {
        $this->categories = Category::get();
    }

    public function save()
    {
        $this->validate();
        $product = new Product();
        $product->price = $this->price;
        $product->type = $this->category;
        $mypath = $this->photo->store(path: 'public/products');
        $product->photo = $mypath;
        $product->created_id = Auth::user()->id;
        $product->save();
        
        $this->alert('success', 'تمت إضافة البدلة بنجاح');
        return redirect()->route('add.style', ['product' => $product->id]);
    }
    
    public function render()
    {
        return view('livewire.admin.add-product');
    }
}
