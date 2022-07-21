<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tehsil extends Model
{
    use HasFactory;
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
    protected $table = 'tehsils';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id',
        'district_id',
        'tehsil',
        'status'
    ];

    /**
    * tehsil belongs to state
    *
    * @return void
    */
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
