<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['curso'];
    public function student(){
        return $this->hasMany(Students::class);
    }
}
