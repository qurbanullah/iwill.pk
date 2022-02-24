<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
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
    protected $table = 'service_categories';

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
    * Product category has many sub categories
    *
    * @return void
    */
    public function serviceSubCategory()
    {
        return $this->hasMany(ServiceSubCategory::class, 'id');
    }

}
