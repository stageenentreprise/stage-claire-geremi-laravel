<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'id', 'part_id', 'title', 'numero', 'video', 'content'
    ];
    public $timestamps = false;

    public function part()
    {
        return $this->belongsTo('App\Part');
    }
}
