<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\user;

class Gender extends Model
{
    use HasFactory;

        /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql";

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'gender',
    ];

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
