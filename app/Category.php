<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','category_id', 'photo'
    ];

    public function children()
    {
        return $this->hasMany('App\Category');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
