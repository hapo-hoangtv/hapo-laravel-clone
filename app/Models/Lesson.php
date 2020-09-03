<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\CourseUser;

class Lesson extends Model
{
    public $timestamps = false;
    protected $table = 'lessons';
    protected $fillable = ['name', 'image', 'description', 'requirement', 'time', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getNumberUserLessonAttribute()
    {
        return $this->user()->count();
    }
}
