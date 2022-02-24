<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductOrder;
use App\Models\ProductOrderItem;
use App\Models\ProductShipping;
use App\Models\ProductTransaction;
use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\City;
use Cart;

class ProductCheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $addressId;
    public $countryId;
    public $stateId;
    public $cityId;
    public $districtId;
    public $tehsilId;
    public $zipCode;
    public $postalCode;
    public $postOffice;
    public $street;
    public $houseNo;
    public $address1;
    public $address2;
    public $mobileNo;
    public $shipToDiffrentAddress;

    public $_firstname;
    public $_lastname;
    public $_email;
    public $_addressId;
    public $_countryId;
    public $_stateId;
    public $_cityId;
    public $_districtId;
    public $_tehsilId;
    public $_zipCode;
    public $_postalCode;
    public $_postOffice;
    public $_street;
    public $_houseNo;
    public $_address1;
    public $_address2;
    public $_mobileNo;

    public $paymentMode;
    public $thankyou;

    /**
    * The livewire mount function
    *
    * @return void
    */
    public function mount()
    {
        $userAddress = Address::where('user_id', auth()->user()->id)->first();
        if (!empty($userAddress)) {
            $this->addressId = $userAddress->id;
            $this->countryId = $userAddress->country_id;
            $this->stateId = $userAddress->state_id;
            $this->cityId = $userAddress->city_id;
            $this->districtId = $userAddress->district_id;
            $this->tehsilId = $userAddress->tehsil_id;
            $this->zipCode = $userAddress->zip_code;
            $this->postalCode = $userAddress->postal_code;
            $this->postOffice = $userAddress->post_office;
            $this->street= $userAddress->street;
            $this->houseNo= $userAddress->house_no;
            $this->address1 = $userAddress->address1;
            $this->address2 = $userAddress->address2;
        }
        $this->firstname = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    /**
    * The validation rules
    *
    * @return void
    */
    // public function rules()
    // {
    //     return [
    //         'firstname' => 'required',
    //         'countryId' => 'required',
    //         'stateId' => 'required',
    //         'districtId' => 'required',
    //         'tehsilId' => 'required',
    //         'street' => 'required',
    //         'address1' => 'required',
    //     ];
    // }


    /**
    * The update function.
    *
    * @return void
    */
    public function update()
    {
        $this->validate();
        ProductOrder::find($this->orderId)->update($this->modelData());
        session()->flash('message', 'Saved.');

    }

    /**
    * The create function.
    *
    * @return void
    */
    public function create()
    {
        $this->validate();
        ProductOrder::create($this->modelData());
        session()->flash('message', 'Saved.');
    }

    /**
    * The create function.
    *
    * @return void
    */
    public function store()
    {
        $userAddress = Address::where('user_id', auth()->user()->id)->first();
        if (!empty($userAddress)) {
            $this->addressId = $userAddress->id;
        }
        if (empty($this->addressId)) {
            $this->create();
        }
        else {
            $this->update();
        }
    }

    public function addressUpdated()
    {
        $userAddress = ProductOrder::where('user_id', auth()->user()->id)->first();
        if (!empty($userAddress)) {
            $this->addressId = $userAddress->id;
        }
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readCountry()
    {
        return Country::get();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readState()
    {
        if($this->shipToDiffrentAddress) {
            return State::where('country_id', $this->_countryId)->get();
        }
        else{
            return State::where('country_id', $this->countryId)->get();
        }
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readCity()
    {
        if($this->shipToDiffrentAddress) {
            return City::where('state_id', $this->_stateId)->get();
        }
        else{
            return City::where('state_id', $this->stateId)->get();
        }
    }

        /**
    * The read function.
    *
    * @return void
    */
    public function readDistrict()
    {
        if($this->shipToDiffrentAddress) {
            return District::where('state_id', $this->_stateId)->get();
        }
        else{
            return District::where('state_id', $this->stateId)->get();
        }
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readTehsil()
    {
        if($this->shipToDiffrentAddress) {
            return Tehsil::where('district_id', $this->_districtId)->get();
        }
        else{
            return Tehsil::where('district_id', $this->districtId)->get();
        }
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readAddress()
    {
        return Address::where('user_id', auth()->user()->id)->first();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getCountryName()
    {
        $countryName = Country::where('id', $this->countryId)->first();
        return $countryName->country;
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getStateName()
    {
        $stateName = State::where('id', $this->stateId)->first();
        return $stateName->state;
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getCityName()
    {
        $cityName = City::where('id', $this->cityId)->first();
        return $cityName->city;
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getDistrictName()
    {
        $districtName = District::where('id', $this->districtId)->first();
        return $districtName->district;
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getTehsilName()
    {
        $tehsilName = Tehsil::where('id', $this->tehsilId)->first();
        return $tehsilName->tehsil;
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'countryId' => 'required',
            'stateId' => 'required',
            'districtId' => 'required',
            'tehsilId' => 'required',
            'street' => 'required',
            'address1' => 'required',
            'mobileNo' => 'required',
            'paymentMode' => 'required'
        ]);

        $order = new ProductOrder();
        $order->user_id = auth()->user()->id;
        $order->subtotal = session()->get('product-checkout')['subtotal'];
        $order->discount = session()->get('product-checkout')['discount'];
        $order->tax = session()->get('product-checkout')['tax'];
        $order->total = session()->get('product-checkout')['total'];
        $order->firstname= $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobileNo;
        $order->email = $this->email;
        $order->country_id = $this->countryId;
        $order->state_id = $this->stateId;
        $order->city_id = $this->cityId;
        $order->district_id = $this->districtId;
        $order->tehsil_id = $this->districtId;
        $order->zip_code = $this->zipCode;
        $order->postal_code = $this->postalCode;
        $order->post_office = $this->postOffice;
        $order->street = $this->street;
        $order->house_no = $this->houseNo;
        $order->address1 = $this->address1;
        $order->address2 = $this->address2;
        $order->is_shipping_different = $this->shipToDiffrentAddress ? 1:0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item) {
            $orderItem = new ProductOrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->product_order_id = $order->id;
            $orderItem->user_id = auth()->user()->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->shipToDiffrentAddress) {
            $this->validate([
                '_firstname' => 'required',
                '_countryId' => 'required',
                '_stateId' => 'required',
                '_districtId' => 'required',
                '_tehsilId' => 'required',
                '_street' => 'required',
                '_address1' => 'required',
                '_mobileNo' => 'required',
                'paymentMode' => 'required',
            ]);

            $shipping = new ProductShipping();
            $shipping->product_order_id = $order->id;
            $shipping->user_id = auth()->user()->id;
            $shipping->firstname= $this->_firstname;
            $shipping->lastname = $this->_lastname;
            $shipping->mobile = $this->_mobileNo;
            $shipping->email = $this->_email;
            $shipping->country_id = $this->_countryId;
            $shipping->state_id = $this->_stateId;
            $shipping->city_id = $this->_cityId;
            $shipping->district_id = $this->_districtId;
            $shipping->tehsil_id = $this->_districtId;
            $shipping->zip_code = $this->_zipCode;
            $shipping->postal_code = $this->_postalCode;
            $shipping->post_office = $this->_postOffice;
            $shipping->street = $this->_street;
            $shipping->house_no = $this->_houseNo;
            $shipping->address1 = $this->_address1;
            $shipping->address2 = $this->_address2;
            $shipping->save();
        }

        if($this->paymentMode == 'cod'){
            $this->makeTransaction($order->id, 'pending');
        }
        $this->resetCart();
    }

    /**
    * Verify for checkout
    *
    * @return void
    */
    public function verifyForCheckout() {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        else if($this->thankyou){
            return redirect()->route('thankyou');
        }
        else if(!session()->get('product-checkout')){
            return redirect()->route('products.product-cart');
        }
    }

    /**
    * make transaction
    *
    * @return void
    */
    public function makeTransaction($orderId, $status)
    {
        $transaction = new ProductTransaction();
        $transaction->product_order_id = $orderId;
        $transaction->user_id = auth()->user()->id;
        $transaction->mode = $this->paymentMode;
        $transaction->status = $status;
        $transaction->save();
    }

    /**
    * reset cart
    *
    * @return void
    */
    public function resetCart()
    {
        $this->thankuou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('product-checkout');
        return redirect()->route('thankyou');
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
            'country_id' => $this->countryId,
            'state_id' => $this->stateId,
            'city_id' => $this->cityId,
            'district_id' => $this->districtId,
            'tehsil_id' => $this->tehsilId,
            'zip_code' => $this->zipCode,
            'postal_code' => $this->postalCode,
            'post_office' => $this->postOffice,
            'street' => $this->street,
            'house_no' => $this->houseNo,
            'address1' => $this->address1,
            'address2' => $this->address2,
        ];
    }

    public function render()
    {
        // $this->verifyForCheckout();
        //dd ($this->readAddress());
        return view('livewire.products.product-checkout-component', [
            // 'countries' => $this->readCountry(),
            // 'states' => $this->readState(),
            // 'cities' => $this->readCity(),
            'districts' => $this->readDistrict(),
            'tehsils' => $this->readTehsil(),
            'countryName' => $this->getCountryName(),
            'stateName' => $this->getStateName(),
            'districtName' => $this->getDistrictName(),
            'tehsilName' => $this->getTehsilName(),
        ]);
    }
}
