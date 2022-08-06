<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
         'title','countent','user_id', 
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    /*public function educator()
    {
        return $this->belongsTo(Educator::class);
    }*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
