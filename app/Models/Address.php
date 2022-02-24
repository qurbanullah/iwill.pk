<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\District;
use App\Models\Tehsil;

class Address extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'country_id',
        'state_id',
        'city_id',
        'district_id',
        'tehsil_id',
        'zip_code',
        'postal_code',
        'post_office',
        'street',
        'house_no',
        'address1',
        'address2',
    ];

    // restrics column from modifying
    protected $gaurded = [];

    /**
    * user has many addresses
    *
    * @return void
    */
    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    /**
    * address belongs to country
    *
    * @return void
    */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
    * address belongs to state
    *
    * @return void
    */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
    * address belongs to city
    *
    * @return void
    */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
    * address belongs to district
    *
    * @return void
    */
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    /**
    * address belongs to tehsil
    *
    * @return void
    */
    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class, 'tehsil_id');
    }

}
