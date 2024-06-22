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

    

    public function mount(Style $style)
    {
        $this->style = $style;
        $this->color = $style->color;
        $this->radio = $style->ageORsize;
        $this->selected_image_url = $style->images->first()->name;
        $this->style_images = $style->images;
        $this->befor_initial_radio = $style->ageORsize;
        $this->old_style = $style;
    }

    public function initialize()
    {

        $this->style->nbr_s=0; $this->style->nbr_m=0; $this->style->nbr_l=0; $this->style->nbr_xl=0; $this->style->nbr_xxl=0; $this->style->nbr_xxxl=0;
        $this->style->nbr_zero=0; $this->style->nbr_one=0; $this->style->nbr_two=0; $this->style->nbr_three=0; $this->style->nbr_four=0; $this->style->nbr_five=0; $this->style->nbr_six=0; $this->style->nbr_seven=0; $this->style->nbr_eight=0; $this->style->nbr_nine=0; $this->style->nbr_ten=0; $this->style->nbr_eleven=0; $this->style->nbr_twelve=0; $this->style->nbr_thirteen=0;
        if ($this->radio=='age') {
            $this->style->s=false; $this->style->m=false; $this->style->l=false; $this->style->xl=false; $this->style->xxl=false; $this->style->xxxl=false;
        } else {
            $this->style->zero=false; $this->style->one=false; $this->style->two=false; $this->style->three=false; $this->style->four=false; $this->style->five=false; $this->style->six=false; $this->style->seven=false; $this->style->eight=false; $this->style->nine=false; $this->style->ten=false; $this->style->eleven=false; $this->style->twelve=false; $this->style->thirteen=false;
        }

        if ($this->befor_initial_radio == $this->style->ageORsize) {
          $this->style->s = $this->old_style->s;
          $this->style->m = $this->old_style->m;
          $this->style->l = $this->old_style->l;
          $this->style->xl = $this->old_style->xl;
          $this->style->xxl = $this->old_style->xxl;
          $this->style->xxxl = $this->old_style->xxxl;

          $this->style->zero= $this->old_style->zero;
          $this->style->one= $this->old_style->one;
          $this->style->two= $this->old_style->two;
          $this->style->three= $this->old_style->three;
          $this->style->four= $this->old_style->four;
          $this->style->five= $this->old_style->five;
          $this->style->six= $this->old_style->six;
          $this->style->seven= $this->old_style->seven;
          $this->style->eight= $this->old_style->eight;
          $this->style->nine= $this->old_style->nine;
          $this->style->ten= $this->old_style->ten;
          $this->style->eleven= $this->old_style->eleven;
          $this->style->twelve= $this->old_style->twelve;
          $this->style->thirteen= $this->old_style->thirteen;

          $this->style->nbr_s=$this->old_style->nbr_s;
          $this->style->nbr_m=$this->old_style->nbr_m;
          $this->style->nbr_l=$this->old_style->nbr_l;
          $this->style->nbr_xl=$this->old_style->nbr_xl;
          $this->style->nbr_xxl=$this->old_style->nbr_xxl;
          $this->style->nbr_xxxl=$this->old_style->nbr_xxxl;
          $this->style->nbr_zero=$this->old_style->nbr_zero;
          $this->style->nbr_one=$this->old_style->nbr_one;
          $this->style->nbr_two=$this->old_style->nbr_two;
          $this->style->nbr_three=$this->old_style->nbr_three;
          $this->style->nbr_four=$this->old_style->nbr_four;
          $this->style->nbr_five=$this->old_style->nbr_five;
          $this->style->nbr_six=$this->old_style->nbr_six;
          $this->style->nbr_seven=$this->old_style->nbr_seven;
          $this->style->nbr_eight=$this->old_style->nbr_eight;
          $this->style->nbr_nine=$this->old_style->nbr_nine;
          $this->style->nbr_ten=$this->old_style->nbr_ten;
          $this->style->nbr_eleven=$this->old_style->nbr_eleven;
          $this->style->nbr_twelve=$this->old_style->nbr_twelve;
          $this->style->nbr_thirteen=$this->old_style->nbr_thirteen;
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
        if ($value=='s') {if ($this->style->s) {$this->style->s=false;$this->style->nbr_s=0;}else{$this->style->s=true;$this->style->nbr_s=1;}}
        if ($value=='m') {if ($this->style->m) {$this->style->m=false;$this->style->nbr_m=0;}else{$this->style->m=true;$this->style->nbr_m=1;}}
        if ($value=='l') {if ($this->style->l) {$this->style->l=false;$this->style->nbr_l=0;}else{$this->style->l=true;$this->style->nbr_l=1;}}
        if ($value=='xl') {if ($this->style->xl) {$this->style->xl=false;$this->style->nbr_xl=0;}else{$this->style->xl=true;$this->style->nbr_xl=1;}}
        if ($value=='xxl') {if ($this->style->xxl) {$this->style->xxl=false;$this->style->nbr_xxl=0;}else{$this->style->xxl=true;$this->style->nbr_xxl=1;}}
        if ($value=='xxxl') {if ($this->style->xxxl) {$this->style->xxxl=false;$this->style->nbr_xxxl=0;}else{$this->style->xxxl=true;$this->style->nbr_xxxl=1;}}
        
        if ($value=='zero') {if ($this->style->zero) {$this->style->zero=false;$this->style->nbr_zero=0;}else{$this->style->zero=true;$this->style->nbr_zero=1;}}
        if ($value=='one') {if ($this->style->one) {$this->style->one=false;$this->style->nbr_one=0;}else{$this->style->one=true;$this->style->nbr_one=1;}}
        if ($value=='two') {if ($this->style->two) {$this->style->two=false;$this->style->nbr_two=0;}else{$this->style->two=true;$this->style->nbr_two=1;}}
        if ($value=='three') {if ($this->style->three) {$this->style->three=false;$this->style->nbr_three=0;}else{$this->style->three=true;$this->style->nbr_three=1;}}
        if ($value=='four') {if ($this->style->four) {$this->style->four=false;$this->style->nbr_four=0;}else{$this->style->four=true;$this->style->nbr_four=1;}}
        if ($value=='five') {if ($this->style->five) {$this->style->five=false;$this->style->nbr_five=0;}else{$this->style->five=true;$this->style->nbr_five=1;}}
        if ($value=='six') {if ($this->style->six) {$this->style->six=false;$this->style->nbr_six=0;}else{$this->style->six=true;$this->style->nbr_six=1;}}
        if ($value=='seven') {if ($this->style->seven) {$this->style->seven=false;$this->style->nbr_seven=0;}else{$this->style->seven=true;$this->style->nbr_seven=1;}}
        if ($value=='eight') {if ($this->style->eight) {$this->style->eight=false;$this->style->nbr_eight=0;}else{$this->style->eight=true;$this->style->nbr_eight=1;}}
        if ($value=='nine') {if ($this->style->nine) {$this->style->nine=false;$this->style->nbr_nine=0;}else{$this->style->nine=true;$this->style->nbr_nine=1;}}
        if ($value=='ten') {if ($this->style->ten) {$this->style->ten=false;$this->style->nbr_ten=0;}else{$this->style->ten=true;$this->style->nbr_ten=1;}}
        if ($value=='eleven') {if ($this->style->eleven) {$this->style->eleven=false;$this->style->nbr_eleven=0;}else{$this->style->eleven=true;$this->style->nbr_eleven=1;}}
        if ($value=='twelve') {if ($this->style->twelve) {$this->style->twelve=false;$this->style->nbr_twelve=0;}else{$this->style->twelve=true;$this->style->nbr_twelve=1;}}
        if ($value=='thirteen') {if ($this->style->thirteen) {$this->style->thirteen=false;$this->style->nbr_thirteen=0;}else{$this->style->thirteen=true;$this->style->nbr_thirteen=1;}}
        
    }

    public function delete_photo(Styleimage $image)
    {
        $image->delete();
        $this->style_images = $this->style->images;
    }

    public function save()
    {

        $this->validate();
        if (!$this->style->nbr_s) {$this->style->s = false;$this->style->product->s = false;}
        if (!$this->style->nbr_m) {$this->style->m = false;$this->style->product->m = false;}
        if (!$this->style->nbr_l) {$this->style->l = false;$this->style->product->l = false;}
        if (!$this->style->nbr_xl) {$this->style->xl = false;$this->style->product->xl = false;}
        if (!$this->style->nbr_xxl) {$this->style->xxl = false;$this->style->product->xxl = false;}
        if (!$this->style->nbr_xxxl) {$this->style->xxxl = false;$this->style->product->xxxl = false;}
        if (!$this->style->nbr_zero) {$this->style->zero = false;$this->style->product->zero = false;}
        if (!$this->style->nbr_one) {$this->style->one = false;$this->style->product->one = false;}
        if (!$this->style->nbr_two) {$this->style->two = false;$this->style->product->two = false;}
        if (!$this->style->nbr_three) {$this->style->three = false;$this->style->product->three = false;}
        if (!$this->style->nbr_four) {$this->style->four = false;$this->style->product->four = false;}
        if (!$this->style->nbr_five) {$this->style->five = false;$this->style->product->five = false;}
        if (!$this->style->nbr_six) {$this->style->six = false;$this->style->product->six = false;}
        if (!$this->style->nbr_seven) {$this->style->seven = false;$this->style->product->seven = false;}
        if (!$this->style->nbr_eight) {$this->style->eight = false;$this->style->product->eight = false;}
        if (!$this->style->nbr_nine) {$this->style->nine = false;$this->style->product->nine = false;}
        if (!$this->style->nbr_ten) {$this->style->ten = false;$this->style->product->ten = false;}
        if (!$this->style->nbr_eleven) {$this->style->eleven = false;$this->style->product->eleven = false;}
        if (!$this->style->nbr_twelve) {$this->style->twelve = false;$this->style->product->twelve = false;}
        if (!$this->style->nbr_thirteen) {$this->style->thirteen = false;$this->style->product->thirteen = false;}
        
      
       
    
       
     
        $this->style->save();


        if ($this->style->s) {$this->style->product->s = true;}
        if ($this->style->m) {$this->style->product->m = true;}
        if ($this->style->l) {$this->style->product->l = true;}
        if ($this->style->xl) {$this->style->product->xl = true;}
        if ($this->style->xxl) {$this->style->product->xxl = true;}
        if ($this->style->xxxl) {$this->style->product->xxxl = true;}
        if ($this->style->zero) {$this->style->product->zero = true;}
        if ($this->style->one) {$this->style->product->one = true;}
        if ($this->style->two) {$this->style->product->two = true;}
        if ($this->style->three) {$this->style->product->three = true;}
        if ($this->style->four) {$this->style->product->four = true;}
        if ($this->style->five) {$this->style->product->five = true;}
        if ($this->style->six) {$this->style->product->six = true;}
        if ($this->style->seven) {$this->style->product->seven = true;}
        if ($this->style->eight) {$this->style->product->eight = true;}
        if ($this->style->nine) {$this->style->product->nine = true;}
        if ($this->style->ten) {$this->style->product->ten = true;}
        if ($this->style->eleven) {$this->style->product->eleven = true;}
        if ($this->style->twelve) {$this->style->product->twelve = true;}
        if ($this->style->thirteen) {$this->style->product->thirteen = true;}
        foreach ($this->style->product->styles as $key => $style) {
            $this->style->product->quantity = $style->nbr_s+$style->nbr_m+$style->nbr_l+$style->nbr_xl+$style->nbr_xxl+$style->nbr_xxxl+$style->nbr_zero+$style->nbr_one+$style->nbr_two+$style->nbr_three+$style->nbr_four+$style->nbr_five+$style->nbr_six+$style->nbr_seven+$style->nbr_eight+$style->nbr_nine+$style->nbr_ten+$style->nbr_eleven+$style->nbr_twelve+$style->nbr_thirteen;
        }
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
