<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

use App\Models\User;
use App\Models\Comment;
use App\Models\ProfessionCategory;
use App\Models\ProfessionSubCategory;

class Post extends Model
{
    use HasFactory;
    use HasTrixRichText;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_iwill_posts";



    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'posts';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'profession_category_id',
        'profession_sub_category_id',
        'title',
        'slug',
        'content',
        'introduction',
        'is_active',
        'post_banner_photo_path'
    ];


    // restrics column from modifying
    protected $gaurded = [];

    // posts has many comments
    // returns all coments on that post
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }

    /**
    * post belongs to profession category
    *
    * @return void
    */
    public function professionCategory()
    {
        return $this->belongsTo(ProfessionCategory::class, 'profession_category_id');
    }

    /**
    * post belongs to profession sub category
    *
    * @return void
    */
    public function professionSubCategory()
    {
        return $this->belongsTo(ProfessionSubCategory::class, 'profession_sub_category_id');
    }

    /**
    * post belongs to user
    *
    * @return void
    */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
