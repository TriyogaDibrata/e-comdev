<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

use function Laravel\Prompts\error;

class CartItems extends Component
{
    public $carts;
    public $totalItems = 0;
    public $totalPrice = 0;
    public $totalTax = 0;
    public $grandTotal = 0;
    public $paymentMethods = 0;
    public $address;
    public $paymentMethod;
    public $orderTicket = '';

    public function render()
    {
        return view('livewire.cart.cart-items');
    }

    public function mount()
    {
        $user = Auth::user();

        $this->carts = Cart::with('product', 'product.unit', 'product.media')->where('status', 1)->where('user_id', $user->id)->get();

        for ($i = 0; $i < count($this->carts); $i++) {
            $this->totalItems += $this->carts[$i]->qty;
            $this->totalPrice += $this->carts[$i]->qty * $this->carts[$i]->product->price_per_unit;
            $this->totalTax += ($this->carts[$i]->qty * $this->carts[$i]->product->price_per_unit) * (11 / 100);
        }

        $this->grandTotal = $this->totalPrice + $this->totalTax;

        $this->paymentMethods = PaymentMethod::get()->pluck('name', 'id');

        // Define the characters to use in the random string  
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Shuffle the characters and get a substring of the desired length  
        $this->orderTicket = substr(str_shuffle($characters), 0, 10);
    }

    public function placeOrder()
    {

        $this->validate([
            'paymentMethod' => 'required',
            'address' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'ticket' => $this->orderTicket,
                'status' => 0,
                'total' => $this->totalPrice,
                'tax' => $this->totalTax,
                'grand_total' => $this->grandTotal,
                'shipping_address' => $this->address,
                'payment_method' => $this->paymentMethod,
                'payment_status' => 0
            ]);

            if ($order) {
                foreach ($this->carts as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'qty' => $item->qty,
                        'total' => $item->qty * $item->product->price_per_unit,
                        'price' => $item->product->price_per_unit,
                    ]);

                    $item->status = 0;
                    $item->save();
                }
            }

            DB::commit();

            // $this->dispatch('show-swal', [
            //     'title' => 'Success!',
            //     'text' => "Order successfully placed",
            //     'icon' => 'success',
            //     'redirectUrl' => route('order')
            // ]);

            redirect()->route('order');

            $this->dispatch('show-toast', [
                'title' => 'Order placed successfully',
                'icon' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            $this->dispatch('show-swal', [
                'title' => 'Failed!',
                'text' => $e->getMessage(),
                'icon' => 'error',
            ]);
        }

        // foreach($this->carts as $item) {

        // }

        // $this->dispatch('show-swal', [
        //     'title' => 'Success!',
        //     'text' => 'Order placed successfully',
        //     'icon' => 'success',
        // ]);
    }
}
