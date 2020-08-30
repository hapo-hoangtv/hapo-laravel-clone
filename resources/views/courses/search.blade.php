@extends('master')
@section('title','search')
@section('main')
<div class="all-course row">
    <p class="ml-5">Tìm thấy {{ count($courses) }}</p>
        @foreach ($courses as $course)
            <div class="course-program col-xl-6 row mb-4">
                <div class="card mx-2">
                    <div class="card-body">
                        <div class="course-body">
                            <img class="float-left mr-4" src="{{ asset($course['image']) }}" alt="HTML">
                            <div class="course-content col-xl-9  offset-3">
                                <h5 class="card-title">{{ $course['name'] }}</h5>
                                <p class="card-text mb-0 text-justify">{{ $course['description'] }}</p>
                                <a href="{{ Route('course.show',$course->id) }}" class="card-link-more col-4 offset-8 d-block text-center text-decoration-none py-xl-2 my-xl-3">More</a>
                            </div>
                        </div>
                        <div class="course-link row">
                            <div class="course-learners col-xl-4 text-center">
                                <a href="#" class="card-link mb-2 d-block">Learners</a>
                                <p class="card-number mb-0">{{ $course->number_user }}</p>
                            </div>
                            <div class="course-lessons col-xl-4 text-center">
                                <a href="#" class="card-link mb-2 d-block">Lessons</a>
                                <p class="card-number mb-0">{{ $course->number_lesson }}</p>
                            </div>
                            <div class="course-quizes col-xl-4 text-center">
                                <a href="#" class="card-link mb-2 d-block">Quizzes</a>
                                <p class="card-number mb-0">{{ $course->number_quizze }}</p>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        @endforeach
</div>
@endsection
