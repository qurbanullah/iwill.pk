<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\ProductOrder;
use Livewire\Component;

class AdminProductOrderDetail extends Component
{
    public $orderId;

    public function mount($order_id)
    {
        $this->orderId = $order_id;
    }

    public function getProductOrder()
    {
        return ProductOrder::find($this->orderId);
    }

    public function render()
    {
        return view('livewire.admin.admin-product-order-detail', [
            'productOrder'=>$this->getProductOrder(),
        ]);
    }
}
