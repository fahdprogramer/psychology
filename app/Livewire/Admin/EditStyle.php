<?php

namespace App\Livewire\Admin;

use App\Models\Style;
use App\Models\Styleimage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditStyle extends Component
{


    use WithFileUploads;
    use LivewireAlert;

    #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];


    public $style, $radio, $color, $selected_image_url, $style_images, $order = 0, $befor_initial_radio, $old_style;

   

    public $s=false, $m=false, $l=false, $xl=false, $xxl=false, $xxxl=false;
    public $zero=false, $one=false, $two=false, $three=false, $four=false, $five=false, $six=false, $seven=false, $eight=false, $nine=false, $ten=false, $eleven=false, $twelve=false, $thirteen=false;
    public $nbr_s=0, $nbr_m=0, $nbr_l=0, $nbr_xl=0, $nbr_xxl=0, $nbr_xxxl=0;
    public $nbr_zero=0, $nbr_one=0, $nbr_two=0, $nbr_three=0, $nbr_four=0, $nbr_five=0, $nbr_six=0, $nbr_seven=0, $nbr_eight=0, $nbr_nine=0, $nbr_ten=0, $nbr_eleven=0, $nbr_twelve=0, $nbr_thirteen=0;

    public function mount(Style $style)
    {
        $this->style = $style;
        $this->color = $style->color;
        $this->radio = $style->ageORsize;
        $this->s = $style->s;
        $this->m = $style->m;
        $this->l = $style->l;
        $this->xl = $style->xl;
        $this->xxl = $style->xxl;
        $this->xxxl = $style->xxxl;
        $this->zero = $style->zero;
        $this->one = $style->one;
        $this->two = $style->two;
        $this->three = $style->three;
        $this->four = $style->four;
        $this->five = $style->five;
        $this->six = $style->six;
        $this->seven = $style->seven;
        $this->eight = $style->eight;
        $this->nine = $style->nine;
        $this->ten = $style->ten;
        $this->eleven = $style->eleven;
        $this->twelve = $style->twelve;
        $this->thirteen = $style->thirteen;
        $this->nbr_s = $style->nbr_s;
        $this->nbr_m = $style->nbr_m;
        $this->nbr_l = $style->nbr_l;
        $this->nbr_xl = $style->nbr_xl;
        $this->nbr_xxl = $style->nbr_xxl;
        $this->nbr_xxxl = $style->nbr_xxxl;
        $this->nbr_zero = $style->nbr_zero;
        $this->nbr_one = $style->nbr_one;
        $this->nbr_two = $style->nbr_two;
        $this->nbr_three = $style->nbr_three;
        $this->nbr_four = $style->nbr_four;
        $this->nbr_five = $style->nbr_five;
        $this->nbr_six = $style->nbr_six;
        $this->nbr_seven = $style->nbr_seven;
        $this->nbr_eight = $style->nbr_eight;
        $this->nbr_nine = $style->nbr_nine;
        $this->nbr_ten = $style->nbr_ten;
        $this->nbr_eleven = $style->nbr_eleven;
        $this->nbr_twelve = $style->nbr_twelve;
        $this->nbr_thirteen = $style->nbr_thirteen;
        $this->selected_image_url = $style->images->first()->name;
        $this->style_images = $style->images;
        $this->befor_initial_radio = $style->ageORsize;
        $this->old_style = $style;
    }

    public function initialize()
    {
        $this->nbr_s=0; $this->nbr_m=0; $this->nbr_l=0; $this->nbr_xl=0; $this->nbr_xxl=0; $this->nbr_xxxl=0;
        $this->nbr_zero=0; $this->nbr_one=0; $this->nbr_two=0; $this->nbr_three=0; $this->nbr_four=0; $this->nbr_five=0; $this->nbr_six=0; $this->nbr_seven=0; $this->nbr_eight=0; $this->nbr_nine=0; $this->nbr_ten=0; $this->nbr_eleven=0; $this->nbr_twelve=0; $this->nbr_thirteen=0;
        if ($this->radio=='age') {
            $this->s=false; $this->m=false; $this->l=false; $this->xl=false; $this->xxl=false; $this->xxxl=false;
        } else {
            $this->zero=false; $this->one=false; $this->two=false; $this->three=false; $this->four=false; $this->five=false; $this->six=false; $this->seven=false; $this->eight=false; $this->nine=false; $this->ten=false; $this->eleven=false; $this->twelve=false; $this->thirteen=false;
        }

    

        if ($this->befor_initial_radio == $this->style->ageORsize) {
            $this->s = $this->old_style->s;
          $this->m = $this->old_style->m;
          $this->l = $this->old_style->l;
          $this->xl = $this->old_style->xl;
          $this->xxl = $this->old_style->xxl;
          $this->xxxl = $this->old_style->xxxl;

          $this->zero= $this->old_style->zero;
          $this->one= $this->old_style->one;
          $this->two= $this->old_style->two;
          $this->three= $this->old_style->three;
          $this->four= $this->old_style->four;
          $this->five= $this->old_style->five;
          $this->six= $this->old_style->six;
          $this->seven= $this->old_style->seven;
          $this->eight= $this->old_style->eight;
          $this->nine= $this->old_style->nine;
          $this->ten= $this->old_style->ten;
          $this->eleven= $this->old_style->eleven;
          $this->twelve= $this->old_style->twelve;
          $this->thirteen= $this->old_style->thirteen;

          $this->nbr_s=$this->old_style->nbr_s;
          $this->nbr_m=$this->old_style->nbr_m;
          $this->nbr_l=$this->old_style->nbr_l;
          $this->nbr_xl=$this->old_style->nbr_xl;
          $this->nbr_xxl=$this->old_style->nbr_xxl;
          $this->nbr_xxxl=$this->old_style->nbr_xxxl;
          $this->nbr_zero=$this->old_style->nbr_zero;
          $this->nbr_one=$this->old_style->nbr_one;
          $this->nbr_two=$this->old_style->nbr_two;
          $this->nbr_three=$this->old_style->nbr_three;
          $this->nbr_four=$this->old_style->nbr_four;
          $this->nbr_five=$this->old_style->nbr_five;
          $this->nbr_six=$this->old_style->nbr_six;
          $this->nbr_seven=$this->old_style->nbr_seven;
          $this->nbr_eight=$this->old_style->nbr_eight;
          $this->nbr_nine=$this->old_style->nbr_nine;
          $this->nbr_ten=$this->old_style->nbr_ten;
          $this->nbr_eleven=$this->old_style->nbr_eleven;
          $this->nbr_twelve=$this->old_style->nbr_twelve;
          $this->nbr_thirteen=$this->old_style->nbr_thirteen;
        }
    }

    public function GoAhead()
    {
        if ($this->order != $this->style_images->count() - 1) {
            $this->order = $this->order + 1;
            $this->selected_image_url = $this->style->images[$this->order]->name;
        } else {
            $this->selected_image_url = $this->style->images->first()->name;
            $this->order = 0;
        }
    }
    public function GoBack()
    {
        if ($this->order != 0) {
            $this->order = $this->order - 1;
            $this->selected_image_url = $this->style->images[$this->order]->name;
        } else {
            $this->selected_image_url = $this->style->images->last()->name;
            $this->order = $this->style_images->count() - 1;
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

    public function delete_photo(Styleimage $image)
    {
        $image->delete();
        $this->style_images = $this->style->images;
    }

    public function save()
    {

        $this->validate();
        $this->style->ageORsize = $this->radio;
        $this->style->color = $this->color;
        $this->style->s = $this->s;
        $this->style->m = $this->m;
        $this->style->l = $this->l;
        $this->style->xl = $this->xl;
        $this->style->xxl = $this->xxl;
        $this->style->xxxl = $this->xxxl;
        $this->style->zero = $this->zero;
        $this->style->one = $this->one;
        $this->style->two = $this->two;
        $this->style->three = $this->three;
        $this->style->four = $this->four;
        $this->style->five = $this->five;
        $this->style->six = $this->six;
        $this->style->seven = $this->seven;
        $this->style->eight = $this->eight;
        $this->style->nine = $this->nine;
        $this->style->ten = $this->ten;
        $this->style->eleven = $this->eleven;
        $this->style->twelve = $this->twelve;
        $this->style->thirteen = $this->thirteen;
        $this->style->nbr_s = $this->nbr_s;
        $this->style->nbr_m = $this->nbr_m;
        $this->style->nbr_l = $this->nbr_l;
        $this->style->nbr_xl = $this->nbr_xl;
        $this->style->nbr_xxl = $this->nbr_xxl;
        $this->style->nbr_xxxl = $this->nbr_xxxl;
        $this->style->nbr_zero = $this->nbr_zero;
        $this->style->nbr_one = $this->nbr_one;
        $this->style->nbr_two = $this->nbr_two;
        $this->style->nbr_three = $this->nbr_three;
        $this->style->nbr_four = $this->nbr_four;
        $this->style->nbr_five = $this->nbr_five;
        $this->style->nbr_six = $this->nbr_six;
        $this->style->nbr_seven = $this->nbr_seven;
        $this->style->nbr_eight = $this->nbr_eight;
        $this->style->nbr_nine = $this->nbr_nine;
        $this->style->nbr_ten = $this->nbr_ten;
        $this->style->nbr_eleven = $this->nbr_eleven;
        $this->style->nbr_twelve = $this->nbr_twelve;
        $this->style->nbr_thirteen = $this->nbr_thirteen;
        if (!$this->nbr_s) {$this->style->s = false;if (!$this->style->product->styles->where('s',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->s = false;}else{$this->style->product->s = true;}}else{$this->style->product->s = true;}                                                                                   
        if (!$this->nbr_m) {$this->style->m = false;if (!$this->style->product->styles->where('m',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->m = false;}else{$this->style->product->m = true;}}else{$this->style->product->m = true;}                                                                                   
        if (!$this->nbr_l) {$this->style->l = false;if (!$this->style->product->styles->where('l',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->l = false;}else{$this->style->product->l = true;}}else{$this->style->product->l = true;}                                                                                   
        if (!$this->nbr_xl) {$this->style->xl = false;if (!$this->style->product->styles->where('xl',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->xl = false;}else{$this->style->product->xl = true;}}else{$this->style->product->xl = true;}                                                                                 
        if (!$this->nbr_xxl) {$this->style->xxl = false;if (!$this->style->product->styles->where('xxl',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->xxl = false;}else{$this->style->product->xxl = true;}}else{$this->style->product->xxl = true;}                                                                               
        if (!$this->nbr_xxxl) {$this->style->xxxl = false;if (!$this->style->product->styles->where('xxxl',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->xxxl = false;}else{$this->style->product->xxxl = true;}}else{$this->style->product->xxxl = true;}                                                                             
        if (!$this->nbr_zero) {$this->style->zero = false;if (!$this->style->product->styles->where('zero',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->zero = false;}else{$this->style->product->zero = true;}}else{$this->style->product->zero = true;}                                                                             
        if (!$this->nbr_one) {$this->style->one = false;if (!$this->style->product->styles->where('one',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->one = false;}else{$this->style->product->one = true;}}else{$this->style->product->one = true;}                                                                               
        if (!$this->nbr_two) {$this->style->two = false;if (!$this->style->product->styles->where('two',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->two = false;}else{$this->style->product->two = true;}}else{$this->style->product->two = true;}                                                                               
        if (!$this->nbr_three) {$this->style->three = false;if (!$this->style->product->styles->where('three',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->three = false;}else{$this->style->product->three = true;}}else{$this->style->product->three = true;}                                                                           
        if (!$this->nbr_four) {$this->style->four = false;if (!$this->style->product->styles->where('four',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->four = false;}else{$this->style->product->four = true;}}else{$this->style->product->four = true;}                                                                             
        if (!$this->nbr_five) {$this->style->five = false;if (!$this->style->product->styles->where('five',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->five = false;}else{$this->style->product->five = true;}}else{$this->style->product->five = true;}                                                                             
        if (!$this->nbr_six) {$this->style->six = false;if (!$this->style->product->styles->where('six',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->six = false;}else{$this->style->product->six = true;}}else{$this->style->product->six = true;}                                                                               
        if (!$this->nbr_seven) {$this->style->seven = false;if (!$this->style->product->styles->where('seven',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->seven = false;}else{$this->style->product->seven = true;}}else{$this->style->product->seven = true;}                                                                           
        if (!$this->nbr_eight) {$this->style->eight = false;if (!$this->style->product->styles->where('eight',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->eight = false;}else{$this->style->product->eight = true;}}else{$this->style->product->eight = true;}                                                                           
        if (!$this->nbr_nine) {$this->style->nine = false;if (!$this->style->product->styles->where('nine',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->nine = false;}else{$this->style->product->nine = true;}}else{$this->style->product->nine = true;}                                                                             
        if (!$this->nbr_ten) {$this->style->ten = false;if (!$this->style->product->styles->where('ten',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->ten = false;}else{$this->style->product->ten = true;}}else{$this->style->product->ten = true;}                                                                               
        if (!$this->nbr_eleven) {$this->style->eleven = false;if (!$this->style->product->styles->where('eleven',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->eleven = false;}else{$this->style->product->eleven = true;}}else{$this->style->product->eleven = true;}                                                                         
        if (!$this->nbr_twelve) {$this->style->twelve = false;if (!$this->style->product->styles->where('twelve',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->twelve = false;}else{$this->style->product->twelve = true;}}else{$this->style->product->twelve = true;}                                                                         
        if (!$this->nbr_thirteen) {$this->style->thirteen = false;if (!$this->style->product->styles->where('thirteen',true)->where('id','!=',$this->style->id)->count()) {$this->style->product->thirteen = false;}else{$this->style->product->thirteen = true;}}else{$this->style->product->thirteen = true;}                                                                     
        
        $this->style->save();
        $this->style->product->save();


        $v= 0;
        foreach ($this->style->product->styles as  $thisStyle) {
            if ($thisStyle->id == $this->style->id) {
                $v = $v+ $this->style->nbr_s+$this->style->nbr_m+$this->style->nbr_l+$this->style->nbr_xl+$this->style->nbr_xxl+$this->style->nbr_xxxl+$this->style->nbr_zero+$this->style->nbr_one+$this->style->nbr_two+$this->style->nbr_three+$this->style->nbr_four+$this->style->nbr_five+$this->style->nbr_six+$this->style->nbr_seven+$this->style->nbr_eight+$this->style->nbr_nine+$this->style->nbr_ten+$this->style->nbr_eleven+$this->style->nbr_twelve+$this->style->nbr_thirteen;
            
            } else {
                $v = $v+ $thisStyle->nbr_s+$thisStyle->nbr_m+$thisStyle->nbr_l+$thisStyle->nbr_xl+$thisStyle->nbr_xxl+$thisStyle->nbr_xxxl+$thisStyle->nbr_zero+$thisStyle->nbr_one+$thisStyle->nbr_two+$thisStyle->nbr_three+$thisStyle->nbr_four+$thisStyle->nbr_five+$thisStyle->nbr_six+$thisStyle->nbr_seven+$thisStyle->nbr_eight+$thisStyle->nbr_nine+$thisStyle->nbr_ten+$thisStyle->nbr_eleven+$thisStyle->nbr_twelve+$thisStyle->nbr_thirteen;
            
            }
            
       
           
        }

        $this->style->product->quantity =$v;
        $this->style->product->save();


        foreach ($this->photos as $photo) {
            $ima = $photo->store('public/PostsImages');
            Styleimage::create([
                'style_id' => $this->style->id,
                'name' => $ima,
            ]);
        }

        $this->alert('success', 'تم تعديل النموذج بنجاح');
        return redirect()->route('show.product', ['product' => $this->style->product->id]);
    }


    public function render()
    {
        return view('livewire.admin.edit-style');
    }
}
