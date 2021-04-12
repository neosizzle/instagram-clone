<?php
//profile model, no schema attached because it is automatically done by migrations
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //this func gets called everytime when model gets booted up.
    protected static function boot(){
        parent::boot();

        //this gets called when a created event gets fired
        static::created(function($user){
            //create profile for user via relationship
            $user->profile()->create(
                [
                    "title" => $user->username
                ]
            );
        });
    }

    //relationships

    function profile(){
        return $this->hasOne(Profile::class);
    }

    function following(){
        return $this->belongsToMany(Profile::class);
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at' , 'DESC');
    }
}
