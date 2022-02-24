<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShipping extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_products";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'product_shippings';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
            'order_id',
            'vendor_id',
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
    public function order()
    {
        return $this->belongsTo(ProductOrder::class);
    }
}
