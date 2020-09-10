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
        $lessonReviews = $lesson->review()->get();
        $rating = [
            'five_star' => config('variable.fiveStar'),
            'four_star' => config('variable.fourStar'),
            'three_star' => config('variable.threeStar'),
            'two_star' => config('variable.twoStar'),
            'one_star' => config('variable.oneStar')
        ];
        $otherCourses = Course::latest()->limit(config('variable.otherCourse'))->get();
        return view('courses.detail_lesson', compact(['lesson', 'otherCourses', 'lessonReviews', 'rating']));
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
