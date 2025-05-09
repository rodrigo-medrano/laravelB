<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class TableProductsComponent extends Component
{
    public $search;
    public $pagination=10;
    public function render()
    {
        $products=Product::where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);
        return view('livewire.table-products-component', compact('products'));
    }
}
