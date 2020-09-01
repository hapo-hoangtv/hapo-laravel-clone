<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $otherCourses = Course::latest()->limit(config('variable.otherCourse'))->get();
        $lessonReviews = $lesson->lessonReviews;
        $ratingStar = [
            'full_star' => config('variable.full_star'),
            'good_rating' => config('variable.good_rating'),
            'normal_rating' => config('variable.normal_rating'),
            'bad_rating' => config('variable.bad_rating'),
            'very_bad_rating' => config('variable.very_bad_rating')
        ];
        return view('courses.detail_lesson', compact(['lesson', 'otherCourses', 'lessonReviews', 'ratingStar']));
    }

    public function getSearchLesson(Request $request, $id)
    {
        $courses = Course::findOrFail($id);
        $otherCourses = Course::inRandomOrder()->limit(config('variable.otherCourse'))->get();
        $lessons = Lesson::query()->where([
            ['course_id', '=', $id],
            ['name', 'LIKE', "%" . $request->get('search') . "%"],
        ])->paginate(2);
        return view('courses.detail_course', compact(['courses', 'lessons', 'otherCourses']));
    }
}
