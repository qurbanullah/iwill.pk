<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVendor extends Model
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
    protected $table = 'product_vendors';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'content',
        'image',
        'is_active',
    ];

    /**
    * Product vendors has many products
    *
    * @return void
    */
    public function product()
    {
        return $this->hasMany(Product::class, 'id');
    }

}
