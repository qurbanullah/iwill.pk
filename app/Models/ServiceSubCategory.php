<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
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
    protected $table = 'service_sub_categories';

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
    ];

    /**
    * service sub categoryt belongs to service category
    *
    * @return void
    */
    public function serviceCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    /**
    * service category has many sub categories
    *
    * @return void
    */
    public function serviceSubSubCategory()
    {
        return $this->hasMany(ServiceSubSubCategory::class, 'id');
    }
}
