<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        return view('livewire.products.product-list');
    }

    public function getProducts()
    {
        $data = Product::where('stock_status', 1)->with('media', 'unit')->get();
        return $data;
    }
}
