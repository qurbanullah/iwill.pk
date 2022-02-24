<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubSubCategory extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_relyface_services";


    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'service_sub_sub_categories';

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
        'service_sub_category_id',
    ];

    /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function serviceCategory()
    {
        return $this->belongsTo(MainCategory::class, 'maincategory_id');
    }

    /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function serviceSubCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class, 'service_sub_category_id');
    }
}
