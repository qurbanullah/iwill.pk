<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Wage extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_relyface_professionals";

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'wage_per_hour',
        'wage_per_day',
        'wage_per_visit',
    ];

    /**
    * wage belongs to user
    *
    * @return void
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
