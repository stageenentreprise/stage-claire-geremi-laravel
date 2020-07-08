<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','category_id'
    ];

    public function children()
    {
        return $this->hasMany('App\Category');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
