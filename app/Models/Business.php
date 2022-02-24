<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
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
    protected $table = 'businesses';

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
        'affiliations',
        'BIU',
        'business_status',
        'featured',
        'business_banner_image',
        'business_images',
        'thumbnail',
        'is_default_home_page',
        'is_default_not_found_page',
        'is_active',
        'user_id',
        'business_category_id',
        'business_sub_category_id',
        'business_sub_sub_category_id',
    ];

    // restrics column from modifying
    protected $gaurded = [];

    /**
    * business belongs to business provider
    *
    * @return void
    */
    public function businessProvider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * business has many reviews
    * returns all reviews on that post
    * @return void
    */
    // public function reviewes()
    // {
    //     return $this->hasMany(businessReview::class, 'id');
    // }

    /**
    * business has many ratings
    * returns all ratings on that post
    * @return void
    */
    // public function ratings()
    // {
    //     return $this->hasMany(businessRating::class, 'id');
    // }

    /**
    * business belongs to user
    *
    * @return void
    */
    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class, 'business_category_id');
    }

    /**
    * business belongs to user
    *
    * @return void
    */
    public function businessSubCategory()
    {
        return $this->belongsTo(BusinessSubCategory::class, 'business_sub_category_id');
    }

    /**
    * business belongs to user
    *
    * @return void
    */
    public function businessSubSubCategory()
    {
        return $this->belongsTo(BusinessSubSubCategory::class, 'business_sub_sub_category_id');
    }
}
