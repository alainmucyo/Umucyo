<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function totals()
    {
        return $this->hasMany(Total::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function markArchive()
    {
        return $this->hasMany(Mark_Archive::class);
    }
}
