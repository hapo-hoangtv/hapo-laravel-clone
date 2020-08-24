<?php

namespace App;

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
}
