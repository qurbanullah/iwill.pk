<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;


class Product extends Model
{
    use HasFactory;
    use HasTrixRichText;

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
    protected $table = 'products';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'product_banner_image',
        'product_images',
        'is_active',
        'user_id',
        'business_id',
        'product_category_id',
        'product_sub_category_id',
        'product_sub_sub_category_id',
    ];

    // restrics column from modifying
    protected $gaurded = [];

    /**
    * post belongs to user
    *
    * @return void
    */
    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * products has many reviews
    * returns all reviews on that post
    * @return void
    */
    public function reviewes()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    /**
    * products has many ratings
    * returns all ratings on that post
    * @return void
    */
    public function ratings()
    {
        return $this->hasMany(ProductRating::class, 'product_id');
    }

    /**
    * post belongs to user
    *
    * @return void
    */
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
    * post belongs to user
    *
    * @return void
    */
    public function productSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'product_sub_category_id');
    }

    /**
    * post belongs to user
    *
    * @return void
    */
    public function productSubSubCategory()
    {
        return $this->belongsTo(ProductSubSubCategory::class, 'product_sub_sub_category_id');
    }
}
