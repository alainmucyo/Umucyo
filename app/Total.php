<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    protected $guarded=[];
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
