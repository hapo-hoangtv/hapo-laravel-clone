<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $timestamps = false;
    protected $table = 'lessons';
    protected $fillable = ['id', 'name', 'image', 'description', 'requirement', 'time', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getCourseLessonAttribute()
    {
        return $this->course;
    }

    public function getUserLessonAttribute()
    {
        return $this->user()->count();
    }
}
