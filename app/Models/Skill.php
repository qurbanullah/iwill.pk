<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
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
    protected $table = 'skills';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'content',
    ];

    /**
    * user has many skills
    *
    * @return void
    */
    public function userSkills()
    {
        return $this->hasMany(UserSkill::class, 'id');
    }

}
