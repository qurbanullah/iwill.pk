<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_products";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'product_ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
    ];

    protected $gaurded = [];

    /**
    * user who has rated
    *
    * @var string
    */
    public function ratedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * Product which has been rated
    *
    * @var string
    */
    public function ratedProduct()
    {
        return $this->belongsTo(Post::class, 'product_id');
    }
}
