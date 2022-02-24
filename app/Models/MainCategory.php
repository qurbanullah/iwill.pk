<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_main";


    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'main_categories';

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
    * Main category has many sub categories
    *
    * @return void
    */
    public function serviceSubCategory()
    {
        return $this->hasMany(ServiceSubCategory::class, 'id');
    }

    /**
    * Main category has many sub categories
    *
    * @return void
    */
    public function productSubCategory()
    {
        return $this->hasMany(ProductSubCategory::class, 'id');
    }

    /**
    * Main category has many sub categories
    *
    * @return void
    */
    public function businessSubCategory()
    {
        return $this->hasMany(BusinessSubCategory::class, 'id');
    }

    /**
    * Product category has many sub categories
    *
    * @return void
    */
    public function professionSubCategory()
    {
        return $this->hasMany(professionSubCategory::class, 'id');
    }
}
