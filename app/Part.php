<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'id', 'course_id', 'title', 'numero', 'description'
    ];
    public $timestamps = false;
}
