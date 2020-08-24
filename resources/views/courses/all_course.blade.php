@extends('master')
@section('title','List course')
@section('main')
    <div class="main-body my-5">
        <div class="filter-find row">
            <div class="d-flex align-items-center">
                <button class="btn filter-btn mr-2"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                <input type="text" placeholder="Search..." class="find-input">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
        <div class="all-course row">
            @if ($courses)
                @foreach ($courses as $course)
                    <div class="course-program col-xl-5 row mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="course-body">
                                    <img class="float-left mr-4" src="{{ asset($course['image']) }}" alt="HTML">
                                    <div class="course-content col-xl-9  offset-3">
                                        <h5 class="card-title">{{ $course['name'] }}</h5>
                                        <p class="card-text mb-0 text-justify">{{ $course['description'] }}</p>
                                        <a href="#" class="card-link-more col-4 offset-8 d-block text-center py-xl-2 my-xl-3">More</a>
                                    </div>
                                </div>
                                <div class="course-link row">
                                    <div class="course-learners col-xl-4 text-center">
                                        <a href="#" class="card-link mb-2 d-block">Learners</a>
                                        <p class="card-number mb-0">16,882</p>
                                    </div>
                                    <div class="course-lessons col-xl-4 text-center">
                                        <a href="#" class="card-link mb-2 d-block">Lessons</a>
                                        <p class="card-number mb-0">2,689</p>
                                    </div>
                                    <div class="course-quizes col-xl-4 text-center">
                                        <a href="#" class="card-link mb-2 d-block">Quizzes</a>
                                        <p class="card-number mb-0">16,882</p>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                @endforeach
            @else
                <h1>No course exists</h1>
            @endif
        </div>
    {{ $courses->links() }}
    </div>   
@endsection
