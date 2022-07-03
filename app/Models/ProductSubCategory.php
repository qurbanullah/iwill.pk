<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
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
    protected $table = 'product_sub_categories';

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
        'product_category_id',
    ];

    /**
    * Product sub categoryt belongs to product category
    *
    * @return void
    */
    public function productCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    /**
    * Product category has many sub categories
    *
    * @return void
    */
    public function productSubSubCategory()
    {
        return $this->hasMany(ProductSubSubCategory::class, 'id');
    }
}
