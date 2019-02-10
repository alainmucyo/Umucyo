<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded=[];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function sends(){
        return $this->hasMany(Send::class);
    }
    public function marks(){
        return $this->hasMany(Mark::class);
    }
    public function totals(){
        return $this->hasMany(Total::class);
    }

    public function markArchive()
    {
        return $this->hasMany(Mark_Archive::class);
    }

}
