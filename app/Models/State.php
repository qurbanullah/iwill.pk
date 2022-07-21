<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_address";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'states';


    protected $fillable = [
        'id', 'country_id', 'name', 'status'
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
