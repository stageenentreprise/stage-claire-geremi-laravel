<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'id', 'part_id', 'title', 'numero', 'video', 'part_id'
    ];
    public $timestamps = false;
}
