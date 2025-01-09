<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToCartModal extends Component
{
    public $productId;
    public $productName;
    public $productPrice;

    public function mount($productId, $productName, $productPrice)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
    }

    public function addToCart($productId)
    {
        // Logic to add the product to the cart  
        session()->push('cart', $productId);
        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.add-to-cart-modal');
    }
}
