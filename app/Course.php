<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'created', 'updated', 'title', 'user_id','description', 'category_id'
    ];
    public $timestamps = false;
}
