<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'username','slug','email','content','rate', 'user_id', 'course_id', 'created_at', 'updated_at'
    ];

    // protected $guarded = [];

    // public function commentable()
    // {
    //     return $this->morphTo();
    // }
}
