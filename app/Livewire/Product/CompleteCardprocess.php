<?php

namespace App\Livewire\Product;

use App\Models\Request;
use App\Models\Style;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CompleteCardprocess extends Component
{

    use LivewireAlert;
    public $Totale  = 0;

    #[Validate('required|max:255')]
    public $name = '';

    #[Validate('required|max:255')]
    public $address = '';

    #[Validate('required|min:10|max:13')]
    public $phone = '';

    public $additional_info = '', $style, $size, $quantity;


    public function mount(Style $style, $size, $quantity)
    {
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $req = Request::where('user_id', Auth::user()->id)->get()->last();
            if ($req) {
                $this->address = $req->address;
                $this->phone = $req->phone;
                $this->additional_info = $req->add_inf;
            }
        }
        $this->style = $style;
        $this->size = $size;
        $this->quantity = $quantity;
        $this->Totale = $this->style->product->price * $this->quantity;
    }

    public function increaseNbr()
    {
        if ($this->quantity < $this->style->{'nbr_' . $this->size}) {
            $this->quantity = $this->quantity + 1;
            $this->Totale = $this->Totale + $this->style->product->price;
        }
    }

    public function decreaseNbr()
    {

        if ($this->quantity > 1) {
            $this->quantity = $this->quantity - 1;
            $this->Totale = $this->Totale - $this->style->product->price;
        }
    }

    public function convertSize($size)
    {
        if ($size == 'zero') {
            return '0-1';
        }
        if ($size == 'one') {
            return '1-2';
        }
        if ($size == 'two') {
            return '2-3';
        }
        if ($size == 'three') {
            return '3-4';
        }
        if ($size == 'four') {
            return '4-5';
        }
        if ($size == 'five') {
            return '5-6';
        }
        if ($size == 'six') {
            return '6-7';
        }
        if ($size == 'seven') {
            return '7-8';
        }
        if ($size == 'eight') {
            return '8-9';
        }
        if ($size == 'nine') {
            return '9-10';
        }
        if ($size == 'ten') {
            return '10-11';
        }
        if ($size == 'eleven') {
            return '11-12';
        }
        if ($size == 'twelve') {
            return '12-13';
        }
        if ($size == 'thirteen') {
            return '13-14';
        }
        return $size;
    }

    public function completeProcess()
    {   
        if ($this->style->{'nbr_' . $this->size}-$this->quantity<0) {
          
             
              $this->flash('error', 'إنتهاء كمية', [
                'position' => 'top',
                'timer' => 7000,
                'toast' => true,
                'text' => 'لقد إنتهت كمية المنتج اللذي قمت بإختياره',
               ]); 
               return redirect()->route('show.all.products');
        }

        $Totale = $this->style->product->price * $this->quantity;
        $N_req = Request::max('req_num') + 1;
        $this->validate();

        $req = new Request();
        if (Auth::check()) {
            $req->user_id = Auth::user()->id;
        } else {
            $req->user_id = 9999;
        }


        $req->style_id = $this->style->id;
        $req->req_num = $N_req;
        $req->totale = $Totale;
        $req->situation = 'inprogress';
        $req->size = $this->size;
        $req->quantity = $this->quantity;
        $req->user_name = $this->name;
        $req->address = $this->address;
        $req->phone = $this->phone;
        $req->add_inf = $this->additional_info;
        $req->save();
        if ($this->size == 's') {
            $this->style->nbr_s = $this->style->nbr_s - $this->quantity;
            if ($this->style->nbr_s == 0) {
                $this->style->s = 0;
                $this->style->save();
                if ($this->style->product->styles->where('s', true)->count()) {
                    $this->style->product->s = true;
                }else{
                    $this->style->product->s = false;
                }
            }
        }
        if ($this->size == 'm') {
            $this->style->nbr_m = $this->style->nbr_m - $this->quantity;
            if ($this->style->nbr_m == 0) {
                $this->style->m = 0;
                $this->style->save();
                if ($this->style->product->styles->where('m', true)->count()) {
                    $this->style->product->m = true;
                }else{
                    $this->style->product->m = false;
                }
            }
        }
        if ($this->size == 'l') {
            $this->style->nbr_l = $this->style->nbr_l - $this->quantity;
            if ($this->style->nbr_l == 0) {
                $this->style->l = 0;
                $this->style->save();
                if ($this->style->product->styles->where('l', true)->count()) {
                    $this->style->product->l = true;
                }else{
                    $this->style->product->l = false;
                }
            }
        }
        if ($this->size == 'xl') {
            $this->style->nbr_xl = $this->style->nbr_xl - $this->quantity;
            if ($this->style->nbr_xl == 0) {
                $this->style->xl = 0;
                $this->style->save();
                if ($this->style->product->styles->where('xl', true)->count()) {
                    $this->style->product->xl = true;
                }else{
                    $this->style->product->xl = false;
                }
            }
        }
        if ($this->size == 'xxl') {
            $this->style->nbr_xxl = $this->style->nbr_xxl - $this->quantity;
            if ($this->style->nbr_xxl == 0) {
                $this->style->xxl = 0;
                $this->style->save();
                if ($this->style->product->styles->where('xxl', true)->count()) {
                    $this->style->product->xxl = true;
                }else{
                    $this->style->product->xxl = false;
                }
            }
        }
        if ($this->size == 'xxxl') {
            $this->style->nbr_xxxl = $this->style->nbr_xxxl - $this->quantity;
            if ($this->style->nbr_xxxl == 0) {
                $this->style->xxxl = 0;
                $this->style->save();
                if ($this->style->product->styles->where('xxxl', true)->count()) {
                    $this->style->product->xxxl = true;
                }else{
                    $this->style->product->xxxl = false;
                }
            }
        }
        if ($this->size == 'zero') {
            $this->style->nbr_zero = $this->style->nbr_zero - $this->quantity;
            if ($this->style->nbr_zero == 0) {
                $this->style->zero = 0;
                $this->style->save();
                if ($this->style->product->styles->where('zero', true)->count()) {
                    $this->style->product->zero = true;
                }else{
                    $this->style->product->zero = false;
                }
            }
        }
        if ($this->size == 'one') {
            $this->style->nbr_one = $this->style->nbr_one - $this->quantity;
            if ($this->style->nbr_one == 0) {
                $this->style->one = 0;
                $this->style->save();
                if ($this->style->product->styles->where('one', true)->count()) {
                    $this->style->product->one = true;
                }else{
                    $this->style->product->one = false;
                }
            }
        }
        if ($this->size == 'two') {
            $this->style->nbr_two = $this->style->nbr_two - $this->quantity;
            if ($this->style->nbr_two == 0) {
                $this->style->two = 0;
                $this->style->save();
                if ($this->style->product->styles->where('two', true)->count()) {
                    $this->style->product->two = true;
                }else{
                    $this->style->product->two = false;
                }
            }
        }
        if ($this->size == 'three') {
            $this->style->nbr_three = $this->style->nbr_three - $this->quantity;
            if ($this->style->nbr_three == 0) {
                $this->style->three = 0;
                $this->style->save();
                if ($this->style->product->styles->where('three', true)->count()) {
                    $this->style->product->three = true;
                }else{
                    $this->style->product->three = false;
                }
            }
        }
        if ($this->size == 'four') {
            $this->style->nbr_four = $this->style->nbr_four - $this->quantity;
            if ($this->style->nbr_four == 0) {
                $this->style->four = 0;
                $this->style->save();
                if ($this->style->product->styles->where('four', true)->count()) {
                    $this->style->product->four = true;
                }else{
                    $this->style->product->four = false;
                }
            }
        }
        if ($this->size == 'five') {
            $this->style->nbr_five = $this->style->nbr_five - $this->quantity;
            if ($this->style->nbr_five == 0) {
                $this->style->five = 0;
                $this->style->save();
                if ($this->style->product->styles->where('five', true)->count()) {
                    $this->style->product->five = true;
                }else{
                    $this->style->product->five = false;
                }
            }
        }
        if ($this->size == 'six') {
            $this->style->nbr_six = $this->style->nbr_six - $this->quantity;
            if ($this->style->nbr_six == 0) {
                $this->style->six = 0;
                $this->style->save();
                if ($this->style->product->styles->where('six', true)->count()) {
                    $this->style->product->six = true;
                }else{
                    $this->style->product->six = false;
                }
            }
        }
        if ($this->size == 'seven') {
            $this->style->nbr_seven = $this->style->nbr_seven - $this->quantity;
            if ($this->style->nbr_seven == 0) {
                $this->style->seven = 0;
                $this->style->save();
                if ($this->style->product->styles->where('seven', true)->count()) {
                    $this->style->product->seven = true;
                }else{
                    $this->style->product->seven = false;
                }
            }
        }
        if ($this->size == 'eight') {
            $this->style->nbr_eight = $this->style->nbr_eight - $this->quantity;
            if ($this->style->nbr_eight == 0) {
                $this->style->eight = 0;
                $this->style->save();
                if ($this->style->product->styles->where('eight', true)->count()) {
                    $this->style->product->eight = true;
                }else{
                    $this->style->product->eight = false;
                }
            }
        }
        if ($this->size == 'nine') {
            $this->style->nbr_nine = $this->style->nbr_nine - $this->quantity;
            if ($this->style->nbr_nine == 0) {
                $this->style->nine = 0;
                $this->style->save();
                if ($this->style->product->styles->where('nine', true)->count()) {
                    $this->style->product->nine = true;
                }else{
                    $this->style->product->nine = false;
                }
            }
        }
        if ($this->size == 'ten') {
            $this->style->nbr_ten = $this->style->nbr_ten - $this->quantity;
            if ($this->style->nbr_ten == 0) {
                $this->style->ten = 0;
                $this->style->save();
                if ($this->style->product->styles->where('ten', true)->count()) {
                    $this->style->product->ten = true;
                }else{
                    $this->style->product->ten = false;
                }
            }
        }
        if ($this->size == 'eleven') {
            $this->style->nbr_eleven = $this->style->nbr_eleven - $this->quantity;
            if ($this->style->nbr_eleven == 0) {
                $this->style->eleven = 0;
                $this->style->save();
                if ($this->style->product->styles->where('eleven', true)->count()) {
                    $this->style->product->eleven = true;
                }else{
                    $this->style->product->eleven = false;
                }
            }
        }
        if ($this->size == 'twelve') {
            $this->style->nbr_twelve = $this->style->nbr_twelve - $this->quantity;
            if ($this->style->nbr_twelve == 0) {
                $this->style->twelve = 0;
                $this->style->save();
                if ($this->style->product->styles->where('twelve', true)->count()) {
                    $this->style->product->twelve = true;
                }else{
                    $this->style->product->twelve = false;
                }
            }
        }
        if ($this->size == 'thirteen') {
            $this->style->nbr_thirteen = $this->style->nbr_thirteen - $this->quantity;
            if ($this->style->nbr_thirteen == 0) {
                $this->style->thirteen = 0;
                $this->style->save();
                if ($this->style->product->styles->where('thirteen', true)->count()) {
                    $this->style->product->thirteen = true;
                }else{
                    $this->style->product->thirteen = false;
                }
            }
        }

        $this->style->save();
        $v= 0;
        foreach ($this->style->product->styles as  $style) {
            if ($this->style->id == $style->id) {
               $v = $v + $this->style->nbr_s + $this->style->nbr_m + $this->style->nbr_l + $this->style->nbr_xl + $this->style->nbr_xxl + $this->style->nbr_xxxl + $this->style->nbr_zero + $this->style->nbr_one + $this->style->nbr_two + $this->style->nbr_three + $this->style->nbr_four + $this->style->nbr_five + $this->style->nbr_six + $this->style->nbr_seven + $this->style->nbr_eight + $this->style->nbr_nine + $this->style->nbr_ten + $this->style->nbr_eleven + $this->style->nbr_twelve + $this->style->nbr_thirteen;
            } else {
                $v = $v + $style->nbr_s + $style->nbr_m + $style->nbr_l + $style->nbr_xl + $style->nbr_xxl + $style->nbr_xxxl + $style->nbr_zero + $style->nbr_one + $style->nbr_two + $style->nbr_three + $style->nbr_four + $style->nbr_five + $style->nbr_six + $style->nbr_seven + $style->nbr_eight + $style->nbr_nine + $style->nbr_ten + $style->nbr_eleven + $style->nbr_twelve + $style->nbr_thirteen;
            }
            
            }


            $this->style->product->quantity =$v;
        $this->style->product->save();



        $this->alert('success', 'شكرا على ثقتكم بنا، سنتواصل معك حالما نقوم بتجهيز الطلبية!');
        return redirect()->route('show.all.products');
    }



    public function render()
    {
        return view('livewire.product.complete-cardprocess');
    }
}
