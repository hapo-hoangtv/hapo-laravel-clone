<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'image', 'description', 'price', 'time'];

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function userCourse()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'course_tag');
    }

    public function getNumberUserAttribute()
    {
        return $this->user()->count();
    }

    public function getNumberLessonAttribute()
    {
        return $this->lesson()->count();
    }

    public function getTimeCourseAttribute()
    {
        $time = $this->lesson()->sum('time');
        $timeFormatHours = floor($time / 60);
        $timeFormatMinutes = ceil($time - floor($time / 60) * 60);
        $timeFormat = [
            'hours' => $timeFormatHours,
            'minutes' => $timeFormatMinutes
        ];
        if ($timeFormat['hours'] == 0) {
            $time = $timeFormat['minutes'] ." (min)";
        } else {
            $time  = $timeFormat['hours'] . " (h)";
        }
        return $time;
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

    public function getCourseUserAttribute()
    {
        return $this->userCourse()->distinct('user_id')->count();
    }

    public function getCheckUserAttribute()
    {
        $check = [];
        if (Auth::user()) {
            $check = $this->user()->wherePivot("user_id", Auth::user()->id)->get();
        }
        return count($check);
    }
}
