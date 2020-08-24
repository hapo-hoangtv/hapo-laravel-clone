<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'image', 'description', 'price'];

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }
}
