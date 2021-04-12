<?php
//posts model, no schema attached because it is automatically done by migrations

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //declares fillable stuff
    protected $fillable = [
        'caption',
        'image'
    ];


    //declares relationship refrences here
    public function user(){
        return $this->belongsTo(User::class);
    }
}
