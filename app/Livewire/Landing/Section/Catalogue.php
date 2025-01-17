<?php

namespace App\Livewire\Landing\Section;

use App\Models\Product;
use Livewire\Component;

class Catalogue extends Component
{
    public function render()
    {
        return view('livewire.landing.section.catalogue');
    }

    public function getProducts()
    {
        $product = Product::with('media')->where('stock_status', 1)->get()->take(3);

        return $product;
    }
}
