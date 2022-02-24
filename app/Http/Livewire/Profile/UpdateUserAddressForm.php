<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\City;

class UpdateUserAddressForm extends Component
{
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
    }

    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'countryId' => 'required',
            'stateId' => 'required',
            'districtId' => 'required',
            'tehsilId' => 'required',
        ];
    }


        /**
    * The update function.
    *
    * @return void
    */
    public function update()
    {
        $this->validate();
        Address::find($this->addressId)->update($this->modelData());
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
        Address::create($this->modelData());
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
        $userAddress = Address::where('user_id', auth()->user()->id)->first();
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
        return State::where('country_id', $this->countryId)->get();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readCity()
    {
        return City::where('state_id', $this->stateId)->get();
    }

        /**
    * The read function.
    *
    * @return void
    */
    public function readDistrict()
    {
        return District::where('state_id', $this->stateId)->get();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readTehsil()
    {
        return Tehsil::where('district_id', $this->districtId)->get();
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
        //dd ($this->readAddress());
        return view('livewire.profile.update-user-address-form', [
            // 'countries' => $this->readCountry(),
            // 'states' => $this->readState(),
            // 'cities' => $this->readCity(),
            'districts' => $this->readDistrict(),
            'tehsils' => $this->readTehsil(),
        ]);
    }
}
