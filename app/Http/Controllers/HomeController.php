<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'asc')->limit(3)->get();
        $otherCourses = Course::orderBy('id', 'desc')->limit(3)->get();
        return view('index', compact('courses', 'otherCourses'));
    }
}
