<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Coupon;
use Cart;

use function PHPUnit\Framework\returnSelf;

class ProductCartComponent extends Component
{
    public $couponCode;
    public $haveCouponcode;
    public $discount;
    public $subTotalAferDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function increaseCartQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
    }

    public function decreaseCartQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
    }

    public function deleteCartItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
        session()->flash('message', 'Item has been removed.');
    }

    public function destroyAllCartItem()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
        session()->flash('message', 'All cart items has been removed.');
    }

    public function SwitchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
        session()->flash('message', 'Item has been saved for later');
    }

    public function SwitchFromSaveForLaterToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
        session()->flash('message', 'Item has been moved to cart');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
        session()->flash('message', 'Item has been removed.');
    }

    public function applyCouponCode()
    {
        // dd($this->couponCode);
        $coupon = Coupon::where('code', $this->couponCode)
                        ->where('expiry_date', '>=', Carbon::today())
                        ->where('cart_value', '<=', Cart::instance('cart')->subtotal())
                        ->first();
        // dd($coupon);
        if(!$coupon) {
            session()->flash('coupon_message', 'Coupon code is invalid');
            return;
        }
        else {
            session()->put('coupon', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value'=> $coupon->value,
                'cart_value' => $coupon->cart_value,
            ]);
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function calculateDiscounts()
    {
        if(session()->has('coupon')) {
            if(session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            }
            else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subTotalAferDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subTotalAferDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subTotalAferDiscount + $this->taxAfterDiscount;
        }
    }

    public function productCheckout()
    {
        if(auth()->check()) {
            return redirect()->route('products.product-checkout');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        // clear the session checkout key before proceeding to checkout
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('product-checkout');
            return;
        }

        if(session()->has('coupon')) {
            session()->put('product-checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subTotalAferDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);
        }
        else{
            session()->put('product-checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function render()
    {
        if (session()->has('coupon')) {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            }
            else {
                $this->calculateDiscounts();
            }
        }
        $this->setAmountForCheckout();
        return view('livewire.products.product-cart-component');
    }
}
