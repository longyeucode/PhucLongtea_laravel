<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RemoveFavoriteProduct extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function removeFavorite()
    {
        $user = Auth::user();
        $user->favorites()->detach($this->productId);
        $this->emit('favoriteRemoved',$this->productId);
    }

    public function render()
    {
        return view('livewire.remove-favorite-product');
    }
}





