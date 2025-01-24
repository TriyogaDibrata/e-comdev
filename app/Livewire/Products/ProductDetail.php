<?php

namespace App\Livewire\Products;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function Laravel\Prompts\alert;

class ProductDetail extends Component
{
    public $product;
    public $count = 1;
    public $btnText = "Add to cart";

    public function render()
    {
        return view('livewire.products.product-detail');
    }

    public function mount($slug)
    {
        $this->product = Product::with('media', 'unit', 'category')->where('slug', $slug)->firstOrFail();
        if ($this->product && Auth::user()) {
            $user = Auth::user();
            $cartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $this->product->id)
                ->where('status', 1)
                ->first();

            if ($cartItem) {
                $this->btnText = "Update cart";
                $this->count = $cartItem->qty;
            }
        }
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

        if (Auth::user()) {
            if (!$this->product) {
                $this->dispatch('show-swal', [
                    'title' => 'Not Found!',
                    'text' => 'Product not found!',
                    'icon' => 'error',
                ]);
            }

            // Get the current user ID (assuming the user is authenticated)  
            $user = Auth::user();

            // Check if the product is already in the cart  
            $cartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $this->product->id)
                ->where('status', 1)
                ->first();

            if ($cartItem) {
                // Update the quantity  
                $cartItem->qty = $this->count;
                $cartItem->save();
                $this->dispatch('show-swal', [
                    'title' => 'Success!',
                    'text' => 'Product added to cart successfully!',
                    'icon' => 'success',
                ]);
            } else {
                // Add the product to the cart  
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $this->product->id,
                    'qty' => $this->count,
                ]);

                $this->dispatch('show-toast', [
                    'title' => 'Product added to cart',
                    'icon' => 'success',
                ]);
            }
            // $cart = Cart::create([])

        } else {
            redirect()->route('login');
        }
    }
}
