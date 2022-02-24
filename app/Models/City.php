<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
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
    protected $table = 'cities';


    protected $fillable = [
        'id', 'state_id', 'name', 'status'
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
