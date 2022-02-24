<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSubSubCategory extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_relyface_businesses";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'business_sub_sub_categories';

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
        'business_sub_category_id',
    ];

    /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function businessCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function businessSubCategory()
    {
        return $this->belongsTo(BusinessSubCategory::class, 'business_sub_category_id');
    }
}
