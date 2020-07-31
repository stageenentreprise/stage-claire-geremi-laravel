<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'created', 'updated', 'title', 'user_id','description', 'category_id', 'slug'
    ]; 
    public $timestamps = false;

    public function parts()
    {
        return $this->hasMany('App\Part')->orderBy('numero');
    }

    public function firstPart()
    {
        return $this->hasMany('App\Part')->orderBy('numero')->first();
    }

    public function chapters()
    {
        return $this->hasMany('app\Chapter');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }
}
