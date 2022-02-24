<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSubCategory extends Model
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
    protected $table = 'business_sub_categories';

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
    * business sub categoryt belongs to business category
    *
    * @return void
    */
    public function businessCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    /**
    * business category has many sub categories
    *
    * @return void
    */
    public function businessSubSubCategory()
    {
        return $this->hasMany(BusinessSubSubCategory::class, 'id');
    }
}
