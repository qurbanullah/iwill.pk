<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionSubCategory extends Model
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
    protected $table = 'profession_sub_categories';

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
    * profession sub categoryt belongs to profession category
    *
    * @return void
    */
    public function professionCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    /**
    * profession category has many sub categories
    *
    * @return void
    */
    public function professionSubSubCategory()
    {
        return $this->hasMany(ProfessionSubSubCategory::class, 'id');
    }
}
