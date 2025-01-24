<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderList extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.orders.order-list');
    }

    public function mount()
    {
        $this->getOrders();
    }

    public function getOrders()
    {
        $data = Order::with('orderItems')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $this->orders = $data;
    }
}
