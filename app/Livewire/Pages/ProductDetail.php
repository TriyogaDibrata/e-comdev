<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function Laravel\Prompts\alert;

class ProductDetail extends Component
{
    public $product;
    public $count = 1;

    public function render()
    {
        return view('livewire.pages.product-detail');
    }

    public function mount($slug)
    {
        $this->product = Product::with('media', 'unit', 'category')->where('slug', $slug)->firstOrFail();
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        if ($this->count > 1) {
            $this->count--;
        }
    }

    public function addToCart()
    {
        // Add product to cart logic here  
        // For example, you might want to use a service or repository to handle this  

        // Example: Adding to session-based cart  
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = [];
        }

        $cart[$this->product->id] = [
            'name' => $this->product->name,
            'quantity' => $this->count,
            'price' => $this->product->price,
        ];

        session()->put('cart', $cart);

        // Notify the user  
        Session::flash('success', 'Product added to cart successfully!');

        // Optionally, reset count  
        $this->count = 1;
    }
}
