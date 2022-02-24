<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\Gender;

class UpdateUserGenderForm extends Component
{
    public $gender;
    public $genderId;

    /**
    * The livewire mount function
    *
    * @return void
    */
    public function mount()
    {
        $getGender = Gender::where('user_id', auth()->user()->id)->first();
        if(!empty($getGender)) {
            $this->genderId= $getGender->id;
            $this->gender= $getGender->gender;
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
            'gender' => 'required',
        ];
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readGender()
    {
        return Gender::where('user_id', auth()->user()->id)->first();
    }

        /**
    * The update function.
    *
    * @return void
    */
    public function update()
    {
        $this->validate();
        Gender::find($this->genderId)->update($this->modelData());
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
        Gender::create($this->modelData());
        session()->flash('message', 'Saved.');
    }

    /**
    * The create function.
    *
    * @return void
    */
    public function store()
    {
        $getGender = Gender::where('user_id', auth()->user()->id)->first();
        if(!empty($getGender)) {
            $this->genderId = $getGender->id;
        }
        if (empty($this->genderId)) {
            $this->create();
        }
        else {
            $this->update();
        }
    }

    public function genderUpdated()
    {
        $getGender = Gender::where('user_id', auth()->user()->id)->first();
        if(!empty($getGender)) {
            $this->genderId = $getGender->id;
        }
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
            'gender' => $this->gender,
        ];
    }

    public function render()
    {
        return view('livewire.profile.update-user-gender-form', [
            'data' => $this->readGender(),
        ]);
    }
}
