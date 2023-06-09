<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    #To get info of the owner of the comment
    public function User()
    {
        return $this->belongsTo(USer::class)->withTrashed();
    }
}
