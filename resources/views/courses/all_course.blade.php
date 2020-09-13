@extends('master')
@section('title','List course')
@section('main')
<div class="main-all-course contain-fluid">
    <div class="main-body mt-5 container">
        <div class="filter-find row my-3">
            <div class="d-flex align-items-center mt-3">
                <form action="{{ Route('course.search') }}" method="GET">
                    <button class="btn filter-btn mr-2"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                    <input type="text" placeholder="Search..." class="find-input w-80" name="search" value="{{ request('search') }}">
                    <i class="fas fa-search search-icon"></i>
                    <input type ="submit" value="Tìm kiếm" class="btn-search">
                </form>
            </div>
        </div>
        <div class="all-course row">
            @if (count($courses) > 0)
                @foreach ($courses as $course)
                    <div class="course-program col-xl-6 row mb-4">
                        <div class="card mx-2">
                            <div class="card-body">
                                <div class="course-body">
                                    <img class="float-left mr-4" src="{{ asset('./storage/image/'. $course['image']) }}" width="89px" height="89px" style="border-radius:50%" alt="HTML">
                                    <div class="course-content col-xl-9  offset-3">
                                        <h5 class="card-title">{{ $course['name'] }}</h5>
                                        <p class="card-text mb-0 text-justify">{{ $course['description'] }}</p>
                                        {{-- @if(Auth::check())  --}}
                                        <a href="{{ Route('course.show',$course->id) }}" class="card-link-more col-4 offset-8 d-block text-center text-decoration-none py-xl-2 my-xl-3">More</a>
                                        {{-- @else 
                                        <a data-target="#loginRegister" data-toggle="modal" href="#" class="card-link-more col-4 offset-8 d-block text-center text-decoration-none py-xl-2 my-xl-3">More</a>
                                        @endif --}}
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
                                        <a href="#" class="card-link mb-2 d-block">Times</a>
                                        <p class="card-number mb-0">{{ $course->time_course }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                @endforeach
            @else
                <h1>No course found!</h1>
            @endif
        </div>
        <div class="pagination d-flex justify-content-end">
            {{ $courses->appends($_GET)->links() }}
        </div>
    </div>
</div>    
@endsection
