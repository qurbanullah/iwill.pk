<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class UserSkill extends Model
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
    protected $table = 'user_skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'skill_id',
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

}
