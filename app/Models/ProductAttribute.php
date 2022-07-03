<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_product";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'product_attributes';

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
    * Get the product that owns the ProductAttribute
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function productAttributes(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'attiribute_id');
    }
}
