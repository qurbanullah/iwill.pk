<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubSubCategory extends Model
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
    protected $table = 'product_sub_sub_categories';

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
        'main_category_id',
        'product_sub_category_id',
    ];

    /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function productCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

        /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function productSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'product_sub_category_id');
    }
}
