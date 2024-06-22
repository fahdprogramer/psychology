<?php

namespace App\Livewire\Product;

use App\Models\Card;
use App\Models\Request;
use App\Models\Style;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ShowsGuestcard extends Component
{




    use LivewireAlert;
    public $Totale  = 0;

    #[Validate('required|max:255')]
    public $name = '';

    #[Validate('required|max:255')]
    public $address = '';

    #[Validate('required|min:10|max:13')]
    public $phone = '';

    public $additional_info = '';

    public function mount()
    {
        
        $carts = Session::get('cart');
        if (!empty($carts)) {
            foreach ($carts as $key => $cart) {
                $this->Totale = $this->Totale + $cart['price'] * $cart['quantity'];
            }
        }
    }
    public function getstyle($styleId)
    {
        return Style::where('id', $styleId)->first();
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

    public function increaseNbr($id)
    {
        $cart = Session::get('cart');
        $style = Style::where('id', $cart[$id]['style_id'])->first();
        if ($cart[$id]['quantity'] < $style->{'nbr_' . $cart[$id]['size']}) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            Session::put('cart', $cart); // Update session with modified cart
            $this->Totale = $this->Totale + $style->product->price;
        }
    }

    public function decreaseNbr($id)
    {
        $cart = Session::get('cart');
        $style = Style::where('id', $cart[$id]['style_id'])->first();
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] - 1;
            Session::put('cart', $cart); // Update session with modified cart
            $this->Totale = $this->Totale - $style->product->price;
        }
    }

    public function RemoveFromCard($id)
    {
        // dd($id);
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart); // Update session with modified cart
        $this->dispatch('RemoveFromCard');
        $this->alert('success', 'تمت الإزالة من السلة  بنجاح');
    }

    public function completeProcess()
    {
        $Totale = 0;
        $carts = Session::get('cart');
        foreach ($carts as $card) {
            $style_test = Style::where('id', $card['style_id'])->first();
            if ($style_test->{'nbr_' . $card['size']} == 0) {
                unset($carts[$card['id']]);
                Session::put('cart', $carts); // Update session with modified cart
                $this->alert('info', 'إنتهاء كمية', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'لقد تم انتهاء كمية بعض المنتجات اللتي قمت بإختيارها',
                ]);
                return back();
            } elseif ($card['quantity'] > $style_test->{'nbr_' . $card['size']}) {
                $carts[$card['id']]['quantity']  = $style_test->{'nbr_' . $card['size']};
                Session::put('cart', $carts); // Update session with modified cart
                $this->alert('info', 'إنتهاء كمية', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'لقد تم تعديل كمية بعض المنتجات اللتي قمت باختيارها بسبب كمية المخزون',
                ]);
                return back();
            }
        }

        $N_req = Request::max('req_num') + 1;
        foreach ($carts as $key => $cart) {
            $Totale = $this->Totale + $cart['price'] * $cart['quantity'];
        }
        $this->validate();

        foreach ($carts as $card) {
            $style = Style::where('id', $card['style_id'])->first();
            $req = new Request();
            $req->user_id = 9999;
            $req->style_id = $card['style_id'];
            $req->req_num = $N_req;
            $req->totale = $Totale;
            $req->situation = 'inprogress';
            $req->size = $card['size'];
            $req->quantity = $card['quantity'];
            $req->user_name = $this->name;
            $req->address = $this->address;
            $req->phone = $this->phone;
            $req->add_inf = $this->additional_info;
            $req->save();
            if ($card['size'] == 's') {
                $style->nbr_s = $style->nbr_s - $card['quantity'];
                if ($style->nbr_s <= 0) {
                    $style->s = 0;
                    $style->save();
                    if ($style->product->styles->where('s', true)->count()) {
                        $style->product->s = true;
                    } else {
                        $style->product->s = false;
                    }
                }
            }
            if ($card['size'] == 'm') {
                $style->nbr_m = $style->nbr_m - $card['quantity'];
                if ($style->nbr_m <= 0) {
                    $style->m = 0;
                    $style->save();
                    if ($style->product->styles->where('m', true)->count()) {
                        $style->product->m = true;
                    } else {
                        $style->product->m = false;
                    }
                }
            }
            if ($card['size'] == 'l') {
                $style->nbr_l = $style->nbr_l - $card['quantity'];
                if ($style->nbr_l <= 0) {
                    $style->l = 0;
                    $style->save();
                    if ($style->product->styles->where('l', true)->count()) {
                        $style->product->l = true;
                    } else {
                        $style->product->l = false;
                    }
                }
            }
            if ($card['size'] == 'xl') {
                $style->nbr_xl = $style->nbr_xl - $card['quantity'];
                if ($style->nbr_xl <= 0) {
                    $style->xl = 0;
                    $style->save();
                    if ($style->product->styles->where('xl', true)->count()) {
                        $style->product->xl = true;
                    } else {
                        $style->product->xl = false;
                    }
                }
            }
            if ($card['size'] == 'xxl') {
                $style->nbr_xxl = $style->nbr_xxl - $card['quantity'];
                if ($style->nbr_xxl <= 0) {
                    $style->xxl = 0;
                    $style->save();
                    if ($style->product->styles->where('xxl', true)->count()) {
                        $style->product->xxl = true;
                    } else {
                        $style->product->xxl = false;
                    }
                }
            }
            if ($card['size'] == 'xxxl') {
                $style->nbr_xxxl = $style->nbr_xxxl - $card['quantity'];
                if ($style->nbr_xxxl <= 0) {
                    $style->xxxl = 0;
                    $style->save();
                    if ($style->product->styles->where('xxxl', true)->count()) {
                        $style->product->xxxl = true;
                    } else {
                        $style->product->xxxl = false;
                    }
                }
            }
            if ($card['size'] == 'zero') {
                $style->nbr_zero = $style->nbr_zero - $card['quantity'];
                if ($style->nbr_zero <= 0) {
                    $style->zero = 0;
                    $style->save();
                    if ($style->product->styles->where('zero', true)->count()) {
                        $style->product->zero = true;
                    } else {
                        $style->product->zero = false;
                    }
                }
            }
            if ($card['size'] == 'one') {
                $style->nbr_one = $style->nbr_one - $card['quantity'];
                if ($style->nbr_one <= 0) {
                    $style->one = 0;
                    $style->save();
                    if ($style->product->styles->where('one', true)->count()) {
                        $style->product->one = true;
                    } else {
                        $style->product->one = false;
                    }
                }
            }
            if ($card['size'] == 'two') {
                $style->nbr_two = $style->nbr_two - $card['quantity'];
                if ($style->nbr_two <= 0) {
                    $style->two = 0;
                    $style->save();
                    if ($style->product->styles->where('two', true)->count()) {
                        $style->product->two = true;
                    } else {
                        $style->product->two = false;
                    }
                }
            }
            if ($card['size'] == 'three') {
                $style->nbr_three = $style->nbr_three - $card['quantity'];
                if ($style->nbr_three <= 0) {
                    $style->three = 0;
                    $style->save();
                    if ($style->product->styles->where('three', true)->count()) {
                        $style->product->three = true;
                    } else {
                        $style->product->three = false;
                    }
                }
            }
            if ($card['size'] == 'four') {
                $style->nbr_four = $style->nbr_four - $card['quantity'];
                if ($style->nbr_four <= 0) {
                    $style->four = 0;
                    $style->save();
                    if ($style->product->styles->where('four', true)->count()) {
                        $style->product->four = true;
                    } else {
                        $style->product->four = false;
                    }
                }
            }
            if ($card['size'] == 'five') {
                $style->nbr_five = $style->nbr_five - $card['quantity'];
                if ($style->nbr_five <= 0) {
                    $style->five = 0;
                    $style->save();
                    if ($style->product->styles->where('five', true)->count()) {
                        $style->product->five = true;
                    } else {
                        $style->product->five = false;
                    }
                }
            }
            if ($card['size'] == 'six') {
                $style->nbr_six = $style->nbr_six - $card['quantity'];
                if ($style->nbr_six <= 0) {
                    $style->six = 0;
                    $style->save();
                    if ($style->product->styles->where('six', true)->count()) {
                        $style->product->six = true;
                    } else {
                        $style->product->six = false;
                    }
                }
            }
            if ($card['size'] == 'seven') {
                $style->nbr_seven = $style->nbr_seven - $card['quantity'];
                if ($style->nbr_seven <= 0) {
                    $style->seven = 0;
                    $style->save();
                    if ($style->product->styles->where('seven', true)->count()) {
                        $style->product->seven = true;
                    } else {
                        $style->product->seven = false;
                    }
                }
            }
            if ($card['size'] == 'eight') {
                $style->nbr_eight = $style->nbr_eight - $card['quantity'];
                if ($style->nbr_eight <= 0) {
                    $style->eight = 0;
                    $style->save();
                    if ($style->product->styles->where('eight', true)->count()) {
                        $style->product->eight = true;
                    } else {
                        $style->product->eight = false;
                    }
                }
            }
            if ($card['size'] == 'nine') {
                $style->nbr_nine = $style->nbr_nine - $card['quantity'];
                if ($style->nbr_nine <= 0) {
                    $style->nine = 0;
                    $style->save();
                    if ($style->product->styles->where('nine', true)->count()) {
                        $style->product->nine = true;
                    } else {
                        $style->product->nine = false;
                    }
                }
            }
            if ($card['size'] == 'ten') {
                $style->nbr_ten = $style->nbr_ten - $card['quantity'];
                if ($style->nbr_ten <= 0) {
                    $style->ten = 0;
                    $style->save();
                    if ($style->product->styles->where('ten', true)->count()) {
                        $style->product->ten = true;
                    } else {
                        $style->product->ten = false;
                    }
                }
            }
            if ($card['size'] == 'eleven') {
                $style->nbr_eleven = $style->nbr_eleven - $card['quantity'];
                if ($style->nbr_eleven <= 0) {
                    $style->eleven = 0;
                    $style->save();
                    if ($style->product->styles->where('eleven', true)->count()) {
                        $style->product->eleven = true;
                    } else {
                        $style->product->eleven = false;
                    }
                }
            }
            if ($card['size'] == 'twelve') {
                $style->nbr_twelve = $style->nbr_twelve - $card['quantity'];
                if ($style->nbr_twelve <= 0) {
                    $style->twelve = 0;
                    $style->save();
                    if ($style->product->styles->where('twelve', true)->count()) {
                        $style->product->twelve = true;
                    } else {
                        $style->product->twelve = false;
                    }
                }
            }
            if ($card['size'] == 'thirteen') {
                $style->nbr_thirteen = $style->nbr_thirteen - $card['quantity'];
                if ($style->nbr_thirteen <= 0) {
                    $style->thirteen = 0;
                    $style->save();
                    if ($style->product->styles->where('thirteen', true)->count()) {
                        $style->product->thirteen = true;
                    } else {
                        $style->product->thirteen = false;
                    }
                }
            }
            $style->save();
            $v = 0;
            foreach ($style->product->styles as  $style_o) {
                if ($style->id == $style_o->id) {
                    $v = $v + $style->nbr_s + $style->nbr_m + $style->nbr_l + $style->nbr_xl + $style->nbr_xxl + $style->nbr_xxxl + $style->nbr_zero + $style->nbr_one + $style->nbr_two + $style->nbr_three + $style->nbr_four + $style->nbr_five + $style->nbr_six + $style->nbr_seven + $style->nbr_eight + $style->nbr_nine + $style->nbr_ten + $style->nbr_eleven + $style->nbr_twelve + $style->nbr_thirteen;
                } else {
                    $v = $v + $style_o->nbr_s + $style_o->nbr_m + $style_o->nbr_l + $style_o->nbr_xl + $style_o->nbr_xxl + $style_o->nbr_xxxl + $style_o->nbr_zero + $style_o->nbr_one + $style_o->nbr_two + $style_o->nbr_three + $style_o->nbr_four + $style_o->nbr_five + $style_o->nbr_six + $style_o->nbr_seven + $style_o->nbr_eight + $style_o->nbr_nine + $style_o->nbr_ten + $style_o->nbr_eleven + $style_o->nbr_twelve + $style_o->nbr_thirteen;
                }
            }


            $style->product->quantity = $v;
            $style->product->save();
        }

        $this->alert('success', 'شكرا على ثقتكم بنا، سنتواصل معك حالما نقوم بتجهيز الطلبية!');
        Session::forget('cart');
        $this->dispatch('EmptyCard');
        return redirect()->route('show.all.products');
    }





    public function render()
    {
        
        $carts = Session::get('cart');
        if (!empty($carts)) {
        foreach ($carts as $card) {
            $style_test = Style::where('id', $card['style_id'])->first();
            if ($style_test->{'nbr_' . $card['size']} == 0) {
                unset($carts[$card['id']]);
                Session::put('cart', $carts); // Update session with modified cart
                $this->alert('info', 'إنتهاء كمية', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'لقد تم انتهاء كمية بعض المنتجات اللتي قمت بإختيارها',
                ]);
            } elseif ($card['quantity'] > $style_test->{'nbr_' . $card['size']}) {
                $carts[$card['id']]['quantity'] = $style_test->{'nbr_' . $card['size']};
                Session::put('cart', $carts); // Update session with modified cart
                $this->alert('info', 'إنتهاء كمية', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'لقد تم تعديل كمية بعض المنتجات اللتي قمت باختيارها بسبب كمية المخزون',
                ]);
            }
        }
    }

        $cart = Session::get('cart');
        return view('livewire.product.shows-guestcard', [
            'cards' => Session::get('cart'),
        ]);
    }
}
