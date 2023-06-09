<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    # A POST belongs to a user
    #To get the owner of the post

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    #To get the categories under a post
    public function categoryPost()
    {
        return $this->hasMany(CategoryPost::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    #To get the likes of a post
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    #Returns True if the auth users already liked the post
    public function isliked()
    {
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

}
