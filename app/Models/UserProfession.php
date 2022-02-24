<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\ProfessionSubCategory;

class UserProfession extends Model
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
    protected $table = 'user_professions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'profession_sub_categories_id',
    ];

    // restrics column from modifying
    protected $gaurded = [];


    /**
    * skill belongs to user
    *
    * @return void
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * profession category ID belongs to profession sub category
    *
    * @return void
    */
    public function subCategory()
    {
        return $this->belongsTo(ProfessionSubCategory::class, 'profession_sub_categories_id');
    }
}
