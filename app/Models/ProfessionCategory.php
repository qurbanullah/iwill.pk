<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionCategory extends Model
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
    protected $table = 'profession_categories';

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
    public function professionSubCategory()
    {
        return $this->hasMany(ProfessionSubCategory::class, 'id');
    }

}
