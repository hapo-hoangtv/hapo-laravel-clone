@extends('master')
@section('title','Detail course')
@section('main')
<div class="detail-course-index container">
    <div class="row mt-5">
        <div class="course-detail-image d-flex justify-content-center col-7">
            <img src="{{ asset('storage/image/Rectangle 7.png') }}" class="img-fluid">
        </div>
        <div class="ml-1 course-desc p-3 col-4 ml-5">
            <div class="course-desc-title">Descriptions course</div>
            <div class="course-desc-body">{{ $courses->description }}</div>
        </div>
    </div>
    <div class="course-lesson-name row">
        <div class="col-7">
            <div class="course-detail d-flex flex-column justify-content-center">
                <div class="course-detail-lesson p-3">
                    <div class="course-lesson-top d-flex mb-4">
                        <nav>
                            <div class="nav" id="" role="tablist">
                                <a class="course-detail-title text-decoration-none pb-3 active" id="nav-lessons-tab" data-toggle="tab" href="#nav-lessons" role="tab" aria-controls="nav-lessons" aria-selected="true">Lessons</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</a>
                            </div>
                        </nav>
                    </div>
                    <div class="filter-find mb-3">
                        <div class="d-flex align-items-center">
                            <form action="{{ Route('lesson.search', $courses->id) }}" method="GET">
                                <button class="btn filter-btn mr-2"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                                <input type="text" placeholder="Search..." class="find-input" name="search" value="{{ request('search') }}">
                                <i class="fas fa-search search-icon"></i>
                            </form>    
                        </div>
                    </div>
                    <div class="course-detail-lesson-detail">
                        @if (count($lessons) > 0)
                            @foreach ($lessons as $key => $lesson)
                                <a class="d-flex justify-content-between align-items-center p-3 but-learn">
                                    <p class="my-auto">{{ ++$key }} . {{ $lesson->name }}</p>
                                    <button class="btn btn-learn" onclick="location.href='{{ Route('lesson.show', $lesson->id) }}'">Learn</button>
                                </a>
                            @endforeach
                            <div class="mt-4">
                                <div class="pagination">
                                    {{ $lessons->appends($_GET)->links() }}
                                </div>
                            </div>
                        @else
                            <h1 class="text-center mt-3">No lessons have been uploaded yet</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="course-info col-4 h-50 ml-5 px-0">
            <div class="course-info-text">
                <i class="fas fa-users"></i> Learners: {{ $courses->number_user }}
            </div>
            <div class="course-info-text">
                <i class="far fa-list-alt"></i> Lessons: {{ $courses->number_lesson }} lessons
            </div>
            <div class="course-info-text">
                <i class="far fa-clock"></i> Times: {{ $courses->time_course }} minutes
            </div>
            <div class="course-info-text">
                <i class="fas fa-hashtag"></i> Tags: #learn #code
            </div>
            <div class="course-info-text">
                <i class="far fa-money-bill-alt"></i> Price: {{ $courses->price }}.000VNĐ
            </div>
            <div class="mt-3">
                <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                <div class="other-list">
                    @foreach ($otherCourses as $key => $otherCourse)
                    <div class="other-list-item py-3 row mx-0 ">
                        <a href="{{ route('course.show', $otherCourse->id) }}" class="text-decoration-none ml-3">{{ ++$key }}. {{ $otherCourse->name }}</a>
                    </div>
                    @endforeach
                    <div class="text-center p-4">
                        <button class="btn btn-view p-2 px-4" onclick="location.href='{{ Route('course.index') }}'">View all ours courses</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
