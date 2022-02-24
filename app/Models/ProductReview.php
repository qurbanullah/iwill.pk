<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
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
    protected $table = 'product_reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'content',
    ];

    protected $gaurded = [];

    /**
    * user who has rated
    *
    * @var string
    */
    public function reviewedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * Product which has been rated
    *
    * @var string
    */
    public function reviewedProduct()
    {
        return $this->belongsTo(Post::class, 'product_id');
    }
}
