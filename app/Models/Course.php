<?php

namespace App\Models;

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

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'course_tag');
    }

    public function getUserCourseAttribute()
    {
        return $this->user()->count();
    }

    public function getLessonCourseAttribute()
    {
        return $this->lesson()->count();
    }

    public function getTimeCourseAttribute()
    {
        return $this->lesson->sum('time');
    }

    public function getTagsAttribute()
    {
        return $this->tag;
    }

    public function getTagCourseAttribute()
    {
        $tag = $this->tag;
        if (count($tag)) {
            $tagName = $tag->first()->name;
            for ($i = 1; $i < count($tag); $i++) {
                $tagName .= ", " . $tag[$i]->name;
            }
        } else {
            $tagName = "";
        }

        return $tagName;
    }
}
