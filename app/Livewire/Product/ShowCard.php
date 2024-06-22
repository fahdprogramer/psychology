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

class ShowCard extends Component
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

        $this->name = Auth::user()->name;
        $req = Request::where('user_id', Auth::user()->id)->get()->last();
        if ($req) {
            $this->address = $req->address;
            $this->phone = $req->phone;
            $this->additional_info = $req->add_inf;
        }
    }

    public function increaseNbr(Card $card)
    {
        if ($card->quantity < $card->style->{'nbr_' . $card->size}) {
            $card->quantity = $card->quantity + 1;
            $card->save();
            $this->Totale = $this->Totale + $card->style->product->price;
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


    public function decreaseNbr(Card $card)
    {

        if ($card->quantity > 1) {
            $card->quantity = $card->quantity - 1;
            $card->save();
            $this->Totale = $this->Totale - $card->style->product->price;
        }
    }

    public function RemoveFromCard(Card $card)
    {
        $card->delete();
        $this->dispatch('RemoveFromCard');
        $this->alert('success', 'تمت الإزالة من السلة  بنجاح');
    }

    public function completeProcess()
    {
        $cards = Card::where('user_id', Auth::user()->id)->get();

        foreach ($cards as $card) {
            if ($card->style->{'nbr_' . $card->size} == 0) {
                $card->delete();
                $cards = Card::where('user_id', Auth::user()->id)->get();
                $this->alert('info', 'إنتهاء كمية', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'لقد تم انتهاء كمية بعض المنتجات اللتي قمت بإختيارها',
                ]);
                return back();
            } elseif ($card->quantity > $card->style->{'nbr_' . $card->size}) {
                $card->quantity = $card->style->{'nbr_' . $card->size};
                $card->save();
                $this->alert('info', 'إنتهاء كمية', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'لقد تم تعديل كمية بعض المنتجات اللتي قمت باختيارها بسبب كمية المخزون',
                ]);
                return back();
            }
        }

        $Totale = collect($cards)->sum(function ($item) {
            return $item->style->product->price * $item->quantity;
        });

        $N_req = Request::max('req_num') + 1;

        $this->validate();
        foreach ($cards as $card) {
            $req = new Request();
            $req->user_id = Auth::user()->id;
            $req->style_id = $card->style->id;
            $req->req_num = $N_req;
            $req->totale = $Totale;
            $req->situation = 'inprogress';
            $req->size = $card->size;
            $req->quantity = $card->quantity;
            $req->user_name = $this->name;
            $req->address = $this->address;
            $req->phone = $this->phone;
            $req->add_inf = $this->additional_info;
            $req->save();

            if ($card->size == 's') {
                $card->style->nbr_s = $card->style->nbr_s - $card['quantity'];
                if ($card->style->nbr_s <= 0) {
                    $card->style->s = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('s', true)->count()) {
                        $card->style->product->s = true;
                    } else {
                        $card->style->product->s = false;
                    }
                }
            }
            if ($card->size == 'm') {
                $card->style->nbr_m = $card->style->nbr_m - $card['quantity'];
                if ($card->style->nbr_m <= 0) {
                    $card->style->m = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('m', true)->count()) {
                        $card->style->product->m = true;
                    } else {
                        $card->style->product->m = false;
                    }
                }
            }
            if ($card->size == 'l') {
                $card->style->nbr_l = $card->style->nbr_l - $card['quantity'];
                if ($card->style->nbr_l <= 0) {
                    $card->style->l = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('l', true)->count()) {
                        $card->style->product->l = true;
                    } else {
                        $card->style->product->l = false;
                    }
                }
            }
            if ($card->size == 'xl') {
                $card->style->nbr_xl = $card->style->nbr_xl - $card['quantity'];
                if ($card->style->nbr_xl <= 0) {
                    $card->style->xl = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('xl', true)->count()) {
                        $card->style->product->xl = true;
                    } else {
                        $card->style->product->xl = false;
                    }
                }
            }
            if ($card->size == 'xxl') {
                $card->style->nbr_xxl = $card->style->nbr_xxl - $card['quantity'];
                if ($card->style->nbr_xxl <= 0) {
                    $card->style->xxl = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('xxl', true)->count()) {
                        $card->style->product->xxl = true;
                    } else {
                        $card->style->product->xxl = false;
                    }
                }
            }
            if ($card->size == 'xxxl') {
                $card->style->nbr_xxxl = $card->style->nbr_xxxl - $card['quantity'];
                if ($card->style->nbr_xxxl <= 0) {
                    $card->style->xxxl = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('xxxl', true)->count()) {
                        $card->style->product->xxxl = true;
                    } else {
                        $card->style->product->xxxl = false;
                    }
                }
            }
            if ($card->size == 'zero') {
                $card->style->nbr_zero = $card->style->nbr_zero - $card['quantity'];
                if ($card->style->nbr_zero <= 0) {
                    $card->style->zero = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('zero', true)->count()) {
                        $card->style->product->zero = true;
                    } else {
                        $card->style->product->zero = false;
                    }
                }
            }
            if ($card->size == 'one') {
                $card->style->nbr_one = $card->style->nbr_one - $card['quantity'];
                if ($card->style->nbr_one <= 0) {
                    $card->style->one = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('one', true)->count()) {
                        $card->style->product->one = true;
                    } else {
                        $card->style->product->one = false;
                    }
                }
            }
            if ($card->size == 'two') {
                $card->style->nbr_two = $card->style->nbr_two - $card['quantity'];
                if ($card->style->nbr_two <= 0) {
                    $card->style->two = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('two', true)->count()) {
                        $card->style->product->two = true;
                    } else {
                        $card->style->product->two = false;
                    }
                }
            }
            if ($card->size == 'three') {
                $card->style->nbr_three = $card->style->nbr_three - $card['quantity'];
                if ($card->style->nbr_three <= 0) {
                    $card->style->three = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('three', true)->count()) {
                        $card->style->product->three = true;
                    } else {
                        $card->style->product->three = false;
                    }
                }
            }
            if ($card->size == 'four') {
                $card->style->nbr_four = $card->style->nbr_four - $card['quantity'];
                if ($card->style->nbr_four <= 0) {
                    $card->style->four = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('four', true)->count()) {
                        $card->style->product->four = true;
                    } else {
                        $card->style->product->four = false;
                    }
                }
            }
            if ($card->size == 'five') {
                $card->style->nbr_five = $card->style->nbr_five - $card['quantity'];
                if ($card->style->nbr_five <= 0) {
                    $card->style->five = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('five', true)->count()) {
                        $card->style->product->five = true;
                    } else {
                        $card->style->product->five = false;
                    }
                }
            }
            if ($card->size == 'six') {
                $card->style->nbr_six = $card->style->nbr_six - $card['quantity'];
                if ($card->style->nbr_six <= 0) {
                    $card->style->six = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('six', true)->count()) {
                        $card->style->product->six = true;
                    } else {
                        $card->style->product->six = false;
                    }
                }
            }
            if ($card->size == 'seven') {
                $card->style->nbr_seven = $card->style->nbr_seven - $card['quantity'];
                if ($card->style->nbr_seven <= 0) {
                    $card->style->seven = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('seven', true)->count()) {
                        $card->style->product->seven = true;
                    } else {
                        $card->style->product->seven = false;
                    }
                }
            }
            if ($card->size == 'eight') {
                $card->style->nbr_eight = $card->style->nbr_eight - $card['quantity'];
                if ($card->style->nbr_eight <= 0) {
                    $card->style->eight = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('eight', true)->count()) {
                        $card->style->product->eight = true;
                    } else {
                        $card->style->product->eight = false;
                    }
                }
            }
            if ($card->size == 'nine') {
                $card->style->nbr_nine = $card->style->nbr_nine - $card['quantity'];
                if ($card->style->nbr_nine <= 0) {
                    $card->style->nine = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('nine', true)->count()) {
                        $card->style->product->nine = true;
                    } else {
                        $card->style->product->nine = false;
                    }
                }
            }
            if ($card->size == 'ten') {
                $card->style->nbr_ten = $card->style->nbr_ten - $card['quantity'];
                if ($card->style->nbr_ten <= 0) {
                    $card->style->ten = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('ten', true)->count()) {
                        $card->style->product->ten = true;
                    } else {
                        $card->style->product->ten = false;
                    }
                }
            }
            if ($card->size == 'eleven') {
                $card->style->nbr_eleven = $card->style->nbr_eleven - $card['quantity'];
                if ($card->style->nbr_eleven <= 0) {
                    $card->style->eleven = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('eleven', true)->count()) {
                        $card->style->product->eleven = true;
                    } else {
                        $card->style->product->eleven = false;
                    }
                }
            }
            if ($card->size == 'twelve') {
                $card->style->nbr_twelve = $card->style->nbr_twelve - $card['quantity'];
                if ($card->style->nbr_twelve <= 0) {
                    $card->style->twelve = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('twelve', true)->count()) {
                        $card->style->product->twelve = true;
                    } else {
                        $card->style->product->twelve = false;
                    }
                }
            }
            if ($card->size == 'thirteen') {
                $card->style->nbr_thirteen = $card->style->nbr_thirteen - $card['quantity'];
                if ($card->style->nbr_thirteen <= 0) {
                    $card->style->thirteen = 0;
                    $card->style->save();
                    if ($card->style->product->styles->where('thirteen', true)->count()) {
                        $card->style->product->thirteen = true;
                    } else {
                        $card->style->product->thirteen = false;
                    }
                }
            }

            $card->style->save();
            $v = 0;
            foreach ($card->style->product->styles as  $style_o) {
                if ($card->style->id == $style_o->id) {
                    $v = $v + $card->style->nbr_s + $card->style->nbr_m + $card->style->nbr_l + $card->style->nbr_xl + $card->style->nbr_xxl + $card->style->nbr_xxxl + $card->style->nbr_zero + $card->style->nbr_one + $card->style->nbr_two + $card->style->nbr_three + $card->style->nbr_four + $card->style->nbr_five + $card->style->nbr_six + $card->style->nbr_seven + $card->style->nbr_eight + $card->style->nbr_nine + $card->style->nbr_ten + $card->style->nbr_eleven + $card->style->nbr_twelve + $card->style->nbr_thirteen;
                } else {
                    $v = $v + $style_o->nbr_s + $style_o->nbr_m + $style_o->nbr_l + $style_o->nbr_xl + $style_o->nbr_xxl + $style_o->nbr_xxxl + $style_o->nbr_zero + $style_o->nbr_one + $style_o->nbr_two + $style_o->nbr_three + $style_o->nbr_four + $style_o->nbr_five + $style_o->nbr_six + $style_o->nbr_seven + $style_o->nbr_eight + $style_o->nbr_nine + $style_o->nbr_ten + $style_o->nbr_eleven + $style_o->nbr_twelve + $style_o->nbr_thirteen;
                }
            }


            $card->style->product->quantity = $v;
            $card->style->product->save();
        }

        $this->alert('success', 'شكرا على ثقتكم بنا، سنتواصل معك حالما نقوم بتجهيز الطلبية!');
        Card::where('user_id', Auth::user()->id)->delete();
        $this->dispatch('EmptyCard');
        return redirect()->route('show.all.products');
    }


    public function render()
    {

        $cards = Card::where('user_id', Auth::user()->id)->get();
        foreach ($cards as $card) {
            if ($card->style->{'nbr_' . $card->size} == 0) {
                $card->delete();
                $cards = Card::where('user_id', Auth::user()->id)->get();
                $this->alert('info', 'إنتهاء كمية', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'لقد تم انتهاء كمية احد المنتجات اللتي قمت بإختيارها',
                ]);
            } elseif ($card->quantity > $card->style->{'nbr_' . $card->size}) {
                $card->quantity = $card->style->{'nbr_' . $card->size};
                $card->save();
            }
        }
        $this->Totale = collect($cards)->sum(function ($item) {
            return $item->style->product->price * $item->quantity;
        });
        return view('livewire.product.show-card', [
            'cards' => $cards,
        ]);
    }
}
