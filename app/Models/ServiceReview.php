<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServiceReview extends Model
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_relyface_services";


    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'service_reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'user_id',
        'content',
    ];

    protected $gaurded = [];

    /**
    * user who has rated
    *
    * @var string
    */
    public function reviewedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * Product which has been rated
    *
    * @var string
    */
    public function reviewedService()
    {
        $data = $this->belongsTo(Service::class, 'service_id');
        dd($data);
    }
}
