<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Comment extends Model
{
    use HasFactory;
    use HasTrixRichText;
    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_relyface_posts";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];

    // comments table in database
    protected $gaurded = [];

    /**
    * user who has commented
    *
    * @var string
    */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * The database table used by the model.
    *
    * @var string
    */
    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
