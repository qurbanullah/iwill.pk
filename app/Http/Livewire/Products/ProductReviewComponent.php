<?php

namespace App\Http\Livewire\Products;

use App\Models\ProductReview;
use App\Models\ServiceReview;
use Livewire\Component;

class ProductReviewComponent extends Component
{
    public $productId;
    public $content;

    public function mount($id)
    {
        $this->productId = $id;
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readReviews()
    {
        $data = ProductReview::where('product_id', $this->productId)->get();
        if (empty($data)) {
            abort(404, 'Requested service does not exists.');
        } else {
            return $data;
        }
    }

    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }

    /**
    * The store function.
    *
    * @return void
    */
    public function store()
    {
        $this->validate();
        ProductReview::create($this->modelData());
        $this->reset('content');
        session()->flash('message', 'Review added successfully.');

    }

    /**
    * The data for the model mapped
    * in this component.
    *
    * @return void
    */
    public function modelData()
    {
        return [
            'user_id' => auth()->user()->id,
            'product_id' => $this->productId,
            'content' => $this->content,
        ];
    }

    public function render()
    {
        return view('livewire.products.product-review-component', [
            'reviews' => $this->readReviews(),
        ]);
    }
}
