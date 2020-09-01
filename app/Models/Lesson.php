<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function lessonReviews()
    {
        return $this->hasMany(Review::class)->whereNull('course_id');
    }

    public function getLessonReviewTimesAttribute()
    {
        return $this->lessonReviews->count();
    }

    public function getLessonAvgStarAttribute()
    {
        $avgStar = $this->lessonReviews->avg('rating');
        return floor($avgStar);
    }

    public function scopeLessonRatingTimes($query, $star)
    {
        $query = $this->lessonReviews->where('rating', $star)->count();
        return $query;
    }

    public function scopeLessonPrecentRating($query, $star)
    {
        $query = $this->LessonRatingTimes($star);
        $allRatingTimes = ($this->lesson_review_times) ?: 1;
        $percent = $query / $allRatingTimes * 100;
        return $percent;
    }
}
