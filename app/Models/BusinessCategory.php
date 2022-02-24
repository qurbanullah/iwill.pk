<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
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
    protected $table = 'business_categories';

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
    public function businessSubCategory()
    {
        return $this->hasMany(businessSubCategory::class, 'id');
    }

}
