<?php

namespace App\Livewire\Product;

use App\Models\Card;
use App\Models\Product;
use App\Models\Style;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ShowProduct extends Component
{

    use LivewireAlert;

    public $product,$styles,$selected_style,$style_images,$selected_size='',$selected_image_url,$quantity=1,$order=0;
    

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->styles = $this->product->styles;
        $this->selected_style = $this->styles->first();
        $this->style_images = $this->selected_style->images;
        $this->selected_image_url = $this->selected_style->images->first()->name;
        

    }

    public function GoAhead() {
        if ($this->order!=$this->style_images->count()-1) {
            $this->order=$this->order+1;
            $this->selected_image_url = $this->selected_style->images[$this->order]->name;
        }else{
            $this->selected_image_url = $this->selected_style->images->first()->name;
            $this->order=0;
        }
    }
    public function GoBack() {
        if ($this->order!=0) {
            $this->order=$this->order-1;
            $this->selected_image_url = $this->selected_style->images[$this->order]->name;
        }else{
            $this->selected_image_url = $this->selected_style->images->last()->name;
            $this->order=$this->style_images->count()-1;
        }
    }

    public function setSelected_size($size) {
       
        $this->selected_size = $size;
        $this->quantity = 1;
        
    }

    public function setSelected_style(Style $style) {
        $this->selected_style = $style;
        $this->style_images = $this->selected_style->images;
        $this->selected_image_url = $this->selected_style->images->first()->name;
    }

    public function AddToCard(Style $style) {
        if ($style->{'nbr_'.$this->selected_size}-$this->quantity<0) {

            $this->flash('error', 'إنتهاء كمية', [
                'position' => 'top',
                'timer' => 7000,
                'toast' => true,
                'text' => 'لقد إخترت كمية أكبر من الموجودة في المخزون',
               ],'show_product/'.$this->product->id); 
                return back();
        }
        if (Auth::check()) {
            
             $card = new Card();
    $card->user_id = Auth::user()->id;
    $card->style_id = $style->id;
    $card->situation = '';
    $card->size = $this->selected_size;
    $card->quantity = $this->quantity;
    $card->save();

  
        //return redirect()->route('show.product', ['product' => $this->product->id]);
        } else {
               // Check if a cart session exists
    $cart = Session::get('cart');

    if (empty($cart)) {
        $cart = []; // Create an empty array if cart doesn't exist
    }

     
        $cart[$style->id.'_'.$this->selected_size] = [
            'id' => $style->id.'_'.$this->selected_size,
            'style_id' => $style->id,
            'size' => $this->selected_size,
            'quantity' =>  $this->quantity,
            'image' =>$style->images->first()->name,
            'price' =>$style->product->price,
        ];
    Session::put('cart', $cart); // Update session with cart items
  

        }

        $this->dispatch('AddToCard'); 

        $this->alert('success', 'تمت الإضافة إلى السلة  بنجاح');
   
    }

    public function RemoveFromCard(Style $style) {
        
        if (Auth::check()) {
            Card::where('user_id',Auth::user()->id)->where('style_id',$this->selected_style->id)->where('size',$this->selected_size)->delete();
        
        } else {
            $cart = Session::get('cart');
            unset($cart[$style->id.'_'.$this->selected_size]); // Remove the product from the cart array
            
           
            Session::put('cart', $cart); // Update session with modified cart
        }
        
        $this->dispatch('RemoveFromCard'); 
        $this->alert('success', 'تمت الإزالة من السلة  بنجاح');
    }
    
    public function render()
    {
        if (Auth::check()) {
            return view('livewire.product.show-product',[
            'in_card' => Card::where('user_id',Auth::user()->id)->where('style_id',$this->selected_style->id)->where('size',$this->selected_size)->count(),
        ]);
        } else {
            $cart = Session::get('cart');
            //Session::forget('cart');
            //session()->pull('cart');
            //dd($cart);        
           if (empty($cart)) {
            return view('livewire.product.show-product',[
                'in_card' =>0,
            ]);
            
        }else{
            return view('livewire.product.show-product',[
                'in_card' =>(array_key_exists($this->selected_style->id.'_'.$this->selected_size, $cart)),
            ]);
        }
        
    }
    }
}
