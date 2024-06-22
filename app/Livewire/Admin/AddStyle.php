<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Style;
use App\Models\Styleimage;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddStyle extends Component
{

    use WithFileUploads;
    use LivewireAlert;
 
    #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    
    public $product ,$radio='age', $color='#ffffff' ;

    public $s=false, $m=false, $l=false, $xl=false, $xxl=false, $xxxl=false;
    public $zero=false, $one=false, $two=false, $three=false, $four=false, $five=false, $six=false, $seven=false, $eight=false, $nine=false, $ten=false, $eleven=false, $twelve=false, $thirteen=false;
    public $nbr_s=0, $nbr_m=0, $nbr_l=0, $nbr_xl=0, $nbr_xxl=0, $nbr_xxxl=0;
    public $nbr_zero=0, $nbr_one=0, $nbr_two=0, $nbr_three=0, $nbr_four=0, $nbr_five=0, $nbr_six=0, $nbr_seven=0, $nbr_eight=0, $nbr_nine=0, $nbr_ten=0, $nbr_eleven=0, $nbr_twelve=0, $nbr_thirteen=0;
    

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function initialize() {
        $this->nbr_s=0; $this->nbr_m=0; $this->nbr_l=0; $this->nbr_xl=0; $this->nbr_xxl=0; $this->nbr_xxxl=0;
        $this->nbr_zero=0; $this->nbr_one=0; $this->nbr_two=0; $this->nbr_three=0; $this->nbr_four=0; $this->nbr_five=0; $this->nbr_six=0; $this->nbr_seven=0; $this->nbr_eight=0; $this->nbr_nine=0; $this->nbr_ten=0; $this->nbr_eleven=0; $this->nbr_twelve=0; $this->nbr_thirteen=0;
    
if ($this->radio=='age') {
            $this->s=false; $this->m=false; $this->l=false; $this->xl=false; $this->xxl=false; $this->xxxl=false;
        } else {
            $this->zero=false; $this->one=false; $this->two=false; $this->three=false; $this->four=false; $this->five=false; $this->six=false; $this->seven=false; $this->eight=false; $this->nine=false; $this->ten=false; $this->eleven=false; $this->twelve=false; $this->thirteen=false;
        }
        
    }

    public function setValue($value) {
        if ($value=='s') {if ($this->s) {$this->s=false;$this->nbr_s=0;}else{$this->s=true;$this->nbr_s=1;}}
        if ($value=='m') {if ($this->m) {$this->m=false;$this->nbr_m=0;}else{$this->m=true;$this->nbr_m=1;}}
        if ($value=='l') {if ($this->l) {$this->l=false;$this->nbr_l=0;}else{$this->l=true;$this->nbr_l=1;}}
        if ($value=='xl') {if ($this->xl) {$this->xl=false;$this->nbr_xl=0;}else{$this->xl=true;$this->nbr_xl=1;}}
        if ($value=='xxl') {if ($this->xxl) {$this->xxl=false;$this->nbr_xxl=0;}else{$this->xxl=true;$this->nbr_xxl=1;}}
        if ($value=='xxxl') {if ($this->xxxl) {$this->xxxl=false;$this->nbr_xxxl=0;}else{$this->xxxl=true;$this->nbr_xxxl=1;}}
        
        if ($value=='zero') {if ($this->zero) {$this->zero=false;$this->nbr_zero=0;}else{$this->zero=true;$this->nbr_zero=1;}}
        if ($value=='one') {if ($this->one) {$this->one=false;$this->nbr_one=0;}else{$this->one=true;$this->nbr_one=1;}}
        if ($value=='two') {if ($this->two) {$this->two=false;$this->nbr_two=0;}else{$this->two=true;$this->nbr_two=1;}}
        if ($value=='three') {if ($this->three) {$this->three=false;$this->nbr_three=0;}else{$this->three=true;$this->nbr_three=1;}}
        if ($value=='four') {if ($this->four) {$this->four=false;$this->nbr_four=0;}else{$this->four=true;$this->nbr_four=1;}}
        if ($value=='five') {if ($this->five) {$this->five=false;$this->nbr_five=0;}else{$this->five=true;$this->nbr_five=1;}}
        if ($value=='six') {if ($this->six) {$this->six=false;$this->nbr_six=0;}else{$this->six=true;$this->nbr_six=1;}}
        if ($value=='seven') {if ($this->seven) {$this->seven=false;$this->nbr_seven=0;}else{$this->seven=true;$this->nbr_seven=1;}}
        if ($value=='eight') {if ($this->eight) {$this->eight=false;$this->nbr_eight=0;}else{$this->eight=true;$this->nbr_eight=1;}}
        if ($value=='nine') {if ($this->nine) {$this->nine=false;$this->nbr_nine=0;}else{$this->nine=true;$this->nbr_nine=1;}}
        if ($value=='ten') {if ($this->ten) {$this->ten=false;$this->nbr_ten=0;}else{$this->ten=true;$this->nbr_ten=1;}}
        if ($value=='eleven') {if ($this->eleven) {$this->eleven=false;$this->nbr_eleven=0;}else{$this->eleven=true;$this->nbr_eleven=1;}}
        if ($value=='twelve') {if ($this->twelve) {$this->twelve=false;$this->nbr_twelve=0;}else{$this->twelve=true;$this->nbr_twelve=1;}}
        if ($value=='thirteen') {if ($this->thirteen) {$this->thirteen=false;$this->nbr_thirteen=0;}else{$this->thirteen=true;$this->nbr_thirteen=1;}}
        
    }

    

    public function save()
    {
        
        $this->validate();
        $style = new Style();
        $style->created_id = Auth::user()->id;
        $style->product_id = $this->product->id;
        $style->ageORsize = $this->radio;
        $style->color = $this->color;
        $style->s = $this->s;
        $style->m = $this->m;
        $style->l = $this->l;
        $style->xl = $this->xl;
        $style->xxl = $this->xxl;
        $style->xxxl = $this->xxxl;
        $style->zero = $this->zero;
        $style->one = $this->one;
        $style->two = $this->two;
        $style->three = $this->three;
        $style->four = $this->four;
        $style->five = $this->five;
        $style->six = $this->six;
        $style->seven = $this->seven;
        $style->eight = $this->eight;
        $style->nine = $this->nine;
        $style->ten = $this->ten;
        $style->eleven = $this->eleven;
        $style->twelve = $this->twelve;
        $style->thirteen = $this->thirteen;
        $style->nbr_s = $this->nbr_s;
        $style->nbr_m = $this->nbr_m;
        $style->nbr_l = $this->nbr_l;
        $style->nbr_xl = $this->nbr_xl;
        $style->nbr_xxl = $this->nbr_xxl;
        $style->nbr_xxxl = $this->nbr_xxxl;
        $style->nbr_zero = $this->nbr_zero;
        $style->nbr_one = $this->nbr_one;
        $style->nbr_two = $this->nbr_two;
        $style->nbr_three = $this->nbr_three;
        $style->nbr_four = $this->nbr_four;
        $style->nbr_five = $this->nbr_five;
        $style->nbr_six = $this->nbr_six;
        $style->nbr_seven = $this->nbr_seven;
        $style->nbr_eight = $this->nbr_eight;
        $style->nbr_nine = $this->nbr_nine;
        $style->nbr_ten = $this->nbr_ten;
        $style->nbr_eleven = $this->nbr_eleven;
        $style->nbr_twelve = $this->nbr_twelve;
        $style->nbr_thirteen = $this->nbr_thirteen;
        if (!$this->nbr_s) {$style->s = false;}
        if (!$this->nbr_m) {$style->m = false;}
        if (!$this->nbr_l) {$style->l = false;}
        if (!$this->nbr_xl) {$style->xl = false;}
        if (!$this->nbr_xxl) {$style->xxl = false;}
        if (!$this->nbr_xxxl) {$style->xxxl = false;}
        if (!$this->nbr_zero) {$style->zero = false;}
        if (!$this->nbr_one) {$style->one = false;}
        if (!$this->nbr_two) {$style->two = false;}
        if (!$this->nbr_three) {$style->three = false;}
        if (!$this->nbr_four) {$style->four = false;}
        if (!$this->nbr_five) {$style->five = false;}
        if (!$this->nbr_six) {$style->six = false;}
        if (!$this->nbr_seven) {$style->seven = false;}
        if (!$this->nbr_eight) {$style->eight = false;}
        if (!$this->nbr_nine) {$style->nine = false;}
        if (!$this->nbr_ten) {$style->ten = false;}
        if (!$this->nbr_eleven) {$style->eleven = false;}
        if (!$this->nbr_twelve) {$style->twelve = false;}
        if (!$this->nbr_thirteen) {$style->thirteen = false;}
        $style->save();


        if ($this->s) {$this->product->s = true;}
        if ($this->m) {$this->product->m = true;}
        if ($this->l) {$this->product->l = true;}
        if ($this->xl) {$this->product->xl = true;}
        if ($this->xxl) {$this->product->xxl = true;}
        if ($this->xxxl) {$this->product->xxxl = true;}
        if ($this->zero) {$this->product->zero = true;}
        if ($this->one) {$this->product->one = true;}
        if ($this->two) {$this->product->two = true;}
        if ($this->three) {$this->product->three = true;}
        if ($this->four) {$this->product->four = true;}
        if ($this->five) {$this->product->five = true;}
        if ($this->six) {$this->product->six = true;}
        if ($this->seven) {$this->product->seven = true;}
        if ($this->eight) {$this->product->eight = true;}
        if ($this->nine) {$this->product->nine = true;}
        if ($this->ten) {$this->product->ten = true;}
        if ($this->eleven) {$this->product->eleven = true;}
        if ($this->twelve) {$this->product->twelve = true;}
        if ($this->thirteen) {$this->product->thirteen = true;}
        
        $this->product->quantity = $this->product->quantity+$this->nbr_s+$this->nbr_m+$this->nbr_l+$this->nbr_xl+$this->nbr_xxl+$this->nbr_xxxl+$this->nbr_zero+$this->nbr_one+$this->nbr_two+$this->nbr_three+$this->nbr_four+$this->nbr_five+$this->nbr_six+$this->nbr_seven+$this->nbr_eight+$this->nbr_nine+$this->nbr_ten+$this->nbr_eleven+$this->nbr_twelve+$this->nbr_thirteen;
        $this->product->save();


        foreach ($this->photos as $photo) {
            $ima = $photo->store('public/PostsImages');
            Styleimage::create([
                'style_id' => $style->id,
                'name' => $ima,
            ]);
        }
        
        $this->alert('success', 'تمت إضافة النموذج بنجاح');
        return redirect()->route('show.product', ['product' => $this->product->id]);
    }

    public function render()
    {
        return view('livewire.admin.add-style');
    }
}
