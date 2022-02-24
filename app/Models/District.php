<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_addresses";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'districts';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id',
        'state_id',
        'district',
        'status'
    ];

        /**
    * states has many cities
    *
    * @return void
    */
    public function tehsils()
    {
        return $this->hasMany(Tehsil::class);
    }

    /**
    * districts belongs to state
    *
    * @return void
    */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}

