@extends('master')
@section('title','Detail course')
@section('main')
<div class="container">
    <div class="row mt-5">
        <div class="course-detail-image d-flex justify-content-center col-7">
            <img src="{{ asset('storage/image/Rectangle 7.png') }}" class="img-fluid">
        </div>
        <div class="ml-1 course-desc p-3 col-4 ml-5">
            <div class="course-desc-title">Descriptions course</div>
            <div class="course-desc-body">{{ $courses->description }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <div class="course-detail d-flex flex-column justify-content-center">
                <div class="course-detail-lesson p-3">
                    <div class="course-lesson-top d-flex mb-4">
                        <div class="pb-3"><a href="#" class="course-detail-title text-decoration-none">Lesson</a></div>
                        <div class="pb-3"><a href="#" class="course-detail-title text-decoration-none">Teacher</a></div>
                        <div class="pb-3"><a href="#" class="course-detail-title text-decoration-none">Reviews</a></div>
                    </div>
                    <div class="filter-find mb-3">
                        <div class="d-flex align-items-center">
                            <button class="btn filter-btn mr-2"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                            <input type="text" placeholder="Search..." class="find-input">
                            <i class="fas fa-search search-icon"></i>
                        </div>
                    </div>
                    <div class="course-detail-lesson-detail">
                        @if (count($lessons) > 0)
                            @foreach ($lessons as $key => $lesson)
                                <div class="d-flex justify-content-between align-items-center p-3 but-learn">
                                    <p class="my-auto">{{ ++$key }} . {{ $lesson->name }}</p>
                                    <button class="btn btn-learn" onclick="location.href='{{ Route('lesson.show', $lesson->id) }}'">Learn</button>
                                </div>
                            @endforeach
                            <div class="mt-4 ">
                                <div class="pagination">
                                    {{ $lessons->links() }}
                                </div>
                            </div>
                        @else
                            <h1 class="text-center mt-3">No lessons have been uploaded yet</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 course-info h-50 ml-5 px-0">
            <div class="course-info-text">
                <i class="fas fa-users"></i> Learners: {{ $courses->number_user }}
            </div>
            <div class="course-info-text">
                <i class="far fa-list-alt"></i> Lessons: {{ $courses->number_lesson }} lessons
            </div>
            <div class="course-info-text">
                <i class="far fa-clock"></i> Times: {{ $courses->number_time }} minutes
            </div>
            <div class="course-info-text">
                <i class="fas fa-hashtag"></i> Tags: #learn #code
            </div>
            <div class="course-info-text">
                <i class="far fa-money-bill-alt"></i> Price: {{ $courses->price }}
            </div>
            <div class="mt-3">
                <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                <div class="other-list">
                    @foreach ($courses as $key => $course)
                        <div class="other-list-item py-3 row mx-0 ">
                            <div class="col-2 ml-3"><strong>{{ ++$key }}</strong></div>
                            <a href="#" class="col-10 text-decoration-none">Lorem ipsum dolor sit amet, consectetur the adipiscing elit.</a>
                        </div>
                    @endforeach
                    <div class="text-center p-4">
                        <button class="btn btn-view p-2 px-4" onclick="location.href='#'">View all ours courses</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
