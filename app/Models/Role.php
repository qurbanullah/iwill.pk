<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql";


    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'roles';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'role',
    ];

    // restrics column from modifying
    protected $gaurded = [];


    /**
    * comments belongs to user
    *
    * @return void
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
