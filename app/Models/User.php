<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
    * The database used by the model.
    *
    * @var string
    */
    // Note: default connection, it should not be used
    // if used, it will override all the DB::connection instances,
    // Which we donn't want to do.
    // protected $connection = "mysql";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',

    ];
 /**
    * posts
    * use has one gender
    * @return void
    */
    public function gender()
    {
        return $this->hasOne(Gender::class, 'user_id');
    }

    /**
    * posts
    * user has many one gender
    * @return void
    */
    public function rating()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

        /**
     * posts
     * use has many posts
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
    * posts
    * use has many products
    * @return void
    */
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    /**
     * comments
     * user has many comments
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    /**
    * address
    * use has many addresses
    * @return void
    */
    public function address()
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    /**
    * roles
    * use has many skills
    * @return void
    */
    public function roles()
    {
        return $this->hasOne(Role::class, 'user_id');
    }

    /**
    * canPost
    * true if user role is author or admin
    * else
    * false
    * @return void
    */
    public function canUpdateRole()
    {
        $role = $this->role;
        if ($role == 'admin') {
            return true;
        }
        return false;
    }

    /**
     * canPost
     * true if user role is author or admin
     * else
     * false
     * @return void
     */
    public function canUploadImages()
    {
        $role = $this->role;
        if ($role == 'author' || $role == 'admin') {
            return true;
        }
        return false;
    }

        /**
     * canPost
     * true if user role is author or admin
     * else
     * false
     * @return void
     */
    public function canPost()
    {
        $role = $this->role;
        if ($role == 'author' || $role == 'admin') {
            return true;
        }
        return false;
    }
}
