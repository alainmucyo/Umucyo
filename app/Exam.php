<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded=[];
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
