<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;
    use LivewireAlert;

   // #[Validate('image')]
    public $photo;

    #[Validate('required')]
    public string $price = '';

    #[Validate('required')]
    public string $category = '';

    public $product,$craftman,$categories,$old_photo;
    public function mount(Product $product)
    {
        $this->categories = Category::get();
        $this->product =  $product;
        $this->category =  $product->type;
        $this->price =  $product->price;
        $this->old_photo =  $product->photo;
    }

    public function save()
    {
        $this->validate();
        
        $this->product->price = $this->price;
        $this->product->type = $this->category;
        if ($this->photo) {
        $mypath = $this->photo->store(path: 'public/products');
        $this->product->photo = $mypath;
        }
        
        $this->product->created_id = Auth::user()->id;
        $this->product->save();
        
        $this->alert('success', 'تمت تعديل البدلة بنجاح');
        return redirect()->route('show.all.products');
    }
    
    public function render()
    {
        return view('livewire.admin.edit-product');
    }
}
