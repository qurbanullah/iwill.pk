<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_product";


    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'product_orders';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'subtotal',
        'discount',
        'tax',
        'total',
        'firstname',
        'lastname',
        'mobile',
        'email',
        'firstname',
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
        'status',
        'is_shipping_different',
    ];

    /**
    * product order belongs to user
    *
    * @return void
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * product order belongs to vendor
    *
    * @return void
    */
    public function vendor()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * product order has many producr ordeer items
    *
    * @return void
    */
    public function productOrderItems()
    {
        return $this->hasMany(ProductOrderItem::class);
    }

    /**
    * product order has only one shipping
    *
    * @return void
    */
    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    /**
    * product order has only one transaction
    *
    * @return void
    */
    public function transaction()
    {
        return $this->hasOne(ProductTransaction::class);
    }

    /**
    * product order belongs to vendor
    *
    * @return void
    */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
    * product order belongs to vendor
    *
    * @return void
    */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
    * product order belongs to vendor
    *
    * @return void
    */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

        /**
    * product order belongs to vendor
    *
    * @return void
    */
    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }
}
