<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
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
    protected $table = 'product_transactions';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'order_id',
        'user_id',
        'vendor_id',
        'mode',
        'status',
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
