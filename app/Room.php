<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded=[];
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
}