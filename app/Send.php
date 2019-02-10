<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    protected $guarded=[];
    public function student(){
        return $this->belongsTo(Student::class);
    }

}
