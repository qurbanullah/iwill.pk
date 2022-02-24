<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Service extends Model
{
    use HasFactory;
    use HasTrixRichText;

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
    protected $table = 'services';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'short_description',
        'description',
        'inclusion',
        'exclusion',
        'regular_price',
        'sale_price',
        'discount',
        'discount_type',
        'SIU',
        'service_status',
        'featured',
        'service_banner_image',
        'service_images',
        'thumbnails',
        'is_active',
        'user_id',
        'business_id',
        'service_category_id',
        'service_sub_category_id',
        'service_sub_sub_category_id',
    ];

    // restrics column from modifying
    protected $gaurded = [];

    /**
    * service belongs to service provider
    *
    * @return void
    */
    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * service belongs to user
    *
    * @return void
    */
    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    /**
    * service belongs to user
    *
    * @return void
    */
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    /**
    * service belongs to user
    *
    * @return void
    */
    public function serviceSubCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class, 'service_sub_category_id');
    }

    /**
    * service belongs to user
    *
    * @return void
    */
    public function serviceSubSubCategory()
    {
        return $this->belongsTo(ServiceSubSubCategory::class, 'service_sub_sub_category_id');
    }

        /**
    * service has many reviews
    * returns all reviews on that post
    * @return void
    */
    // public function reviewes()
    // {
    //     return $this->hasMany(ServiceReview::class, 'id');
    // }

    /**
    * service has many ratings
    * returns all ratings on that post
    * @return void
    */
    // public function ratings()
    // {
    //     return $this->hasMany(ServiceRating::class, 'id');
    // }
}
