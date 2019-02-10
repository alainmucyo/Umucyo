<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
