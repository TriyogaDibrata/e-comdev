<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderDetail extends Component
{
    public $detail;

    public function render()
    {
        return view('livewire.orders.order-detail');
    }

    public function mount($ticket)
    {
        $this->detail = Order::with('orderItems')->where('ticket', $ticket)->first();
    }
}
