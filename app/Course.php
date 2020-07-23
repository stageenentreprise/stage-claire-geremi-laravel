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
        return $this->hasMany('App\Part');
    }

    public function chapters()
    {
        return $this->hasMany('app\Chapter');
    }
}
