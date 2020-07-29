<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'id', 'course_id', 'title', 'numero', 'description'
    ];
    public $timestamps = false;

    public function chapters()
    {
        return $this->hasMany('App\Chapter')->orderBy('numero');
    }

    public function firstChapter()
    {
        return $this->hasMany('App\Chapter')->orderBy('numero')->first();
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
