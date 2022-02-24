<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionSubSubCategory extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_relyface_professionals";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'profession_sub_sub_categories';

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
        'profession_sub_category_id',
    ];

    /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function professionCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    /**
    * Product sub category belongs to product category
    *
    * @return void
    */
    public function professionSubCategory()
    {
        return $this->belongsTo(ProfessionSubCategory::class, 'profession_sub_category_id');
    }
}
