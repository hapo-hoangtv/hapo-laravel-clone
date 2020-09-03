@extends('master')
@section('title','Detail lesson')
@section('main')
<div class="detail-lesson-index container">
    <div class="row">
        <div class="col-8">
            <div class="course-detail-image d-flex justify-content-center mr-0 mt-4">
                <img src="{{ asset('storage/image/Rectangle 7.png') }}" class="img-fluid">
            </div>
            <div class="course-detail">
                <div class="course-detail-lesson p-3 mb-5">
                    <div class="course-lesson-top d-flex mb-4">
                        <nav>
                            <div class="nav" id="nav-tab" role="tablist">
                                <a class="course-detail-title text-decoration-none pb-3 active" id="nav-descriptions-tab" data-toggle="tab" href="#nav-descriptions" role="tab" aria-controls="nav-descriptions" aria-selected="true">Descriptions</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-program-tab" data-toggle="tab" href="#nav-program" role="tab" aria-controls="nav-program" aria-selected="false">Program</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-program" aria-selected="false">Reviews</a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-descriptions" role="tabpanel" aria-labelledby="nav-descriptions-tab">
                            <div class="lesson-detail">
                                <div class="lesson-detail-title">Descriptions lesson</div>
                                <div class="lesson-detail-text">
                                    {{ $lesson->description }}
                                </div>
                                <div class="lesson-detail-title">Requirements</div>
                                <div class="lesson-detail-text">
                                    {{ $lesson->requirement }}
                                </div>
                                <div class="lesson-detail-text d-flex align-items-center">
                                    <div class="lesson-detail-title pr-4">Tag:</div> {{ $lesson->course->course_tag }}
                                </div>
                            </div>
                        </div>        
                        <div class="tab-pane fade" id="nav-teacher" role="tabpanel" aria-labelledby="nav-teacher-tab">
                            <div class="lesson-detail-title">Main Teacher</div>
                            <div class="mt-4">
                                <div class="teacher-info d-flex align-items-center my-4">
                                    <img src="{{ asset('storage/image/Ellipse 32.png') }}" class="teacher-info-img rounded-circle">
                                    <div class="d-flex flex-column ml-4">
                                        <div class="teacher-info-name">Luu Trung Nghia</div>
                                        <div class="teacher-info-exp">Second Year Teacher</div>
                                        <div class="d-flex mt-2">
                                            <div class="teacher-info-plus"><i class="fab fa-google-plus-g"></i></div>
                                            <div class="teacher-info-fb"><i class="fab fa-facebook-f"></i></i></div>
                                            <div class="teacher-info-slack"><i class="fab fa-slack"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-text">
                                    Vivamus volutpat eros pulvinar velit laoreet,
                                    sit amet egestas erat dignissim. Sed quis rutrum tellus,
                                    sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                                    Nam nulla ipsum, venenatis malesuada felis quis,
                                    ultricies convallis neque. Pellentesque tristique
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-program" role="tabpanel" aria-labelledby="nav-program-tab">
                            <div class="lesson-detail-title py-3">Program</div>
                            <div class="lesson-program d-flex flex-column">
                                <div class="porgram-list py-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <i class="far fa-file-word col-1"></i>
                                            <div class="program-type col-2 p-0 ml-2">Lesson</div>
                                            <div class="col-9">Program learn HTML/CSS</div>
                                        </div>
                                        <button class="btn btn-learn">Preview</button>
                                    </div>
                                </div>
                                <div class="program-list py-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <i class="far fa-file-pdf col-1"></i>
                                            <div class="program-type col-2 p-0 ml-2">PDF</div>
                                            <div class="col-9 ml-1">Download course slides</div>
                                        </div>
                                        <button class="btn btn-learn">Preview</button>
                                    </div>
                                </div>
                                <div class="porgram-list py-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <i class="far fa-file-video col-1"></i>
                                            <div class="program-type col-2 p-0 ml-2">Video</div>
                                            <div class="col-9 ml-1">Download course videos</div>
                                        </div>
                                        <button class="btn btn-learn">Preview</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="course-info">
                <div class="course-info-text">
                    <i class="fas fa-desktop"></i> Course: {{ $lesson->course->name }}
                </div>
                <div class="course-info-text">
                    <i class="fas fa-users"></i> Learners: {{ $lesson->course->number_user }}
                </div>
                <div class="course-info-text">
                    <i class="far fa-clock"></i> Times:  {{ $lesson->time }} minutes
                </div>
                <div class="course-info-text">
                    <i class="fas fa-hashtag"></i> Tags: #tag1 #tag2
                </div>
                <div class="course-info-text">
                    <i class="far fa-money-bill-alt"></i> Price: 300.000 VNĐ
                </div>
            </div>
            <div class="course-info mt-3 mb-5">
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
