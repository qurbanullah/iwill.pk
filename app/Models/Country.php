<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
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
    protected $table = 'countries';


    protected $fillable = [
        'id', 'name', 'status'
    ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public function cities(): HasManyThrough
    {
        return $this->hasManyThrough(City::class, State::class);
    }
}