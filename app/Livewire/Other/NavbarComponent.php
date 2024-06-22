<?php

namespace App\Livewire\Other;

use App\Livewire\Actions\Logout;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class NavbarComponent extends Component
{
    public $numCard ;

    public function mount() {
        if (auth()->check()) {
           $this->numCard = Card::where('user_id',Auth::user()->id)->count();
        }else{
            $cart = Session::get('cart');
            if (empty($cart)) {
                $this->numCard = 0;
            }else{
                $this->numCard = count($cart);
            }
            
        }

        
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    #[On('AddToCard')] 
    public function updateCardAdd()
    {
        $this->numCard = $this->numCard+1;
    }

    #[On('RemoveFromCard')] 
    public function updateCardRemove()
    {
        $this->numCard = $this->numCard-1;
    }

    #[On('EmptyCard')] 
    public function EmptyCard()
    {
        $this->numCard = 0;
    }

    public function render()
    {
        return view('livewire.other.navbar-component');
    }
}
