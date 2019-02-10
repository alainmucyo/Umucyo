<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded=[];
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
    public function rooms(){
        return $this->belongsToMany(Room::class);
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    public function exames(){
        return $this->hasMany(Exam::class);
    }
}
