@extends('master')
@section('title','Detail lesson')
@section('main')
<div class="detail-lesson-index container">
    <div class="row mt-5">
        <div class="col-8">
            <div class="course-lesson-image d-flex justify-content-center">
                <img src="{{ asset('storage/image/Rectangle 7.png') }}" class="img-fluid">
            </div>
            <div class="course-detail">
                <div class="course-detail-lesson p-3">
                    <div class="course-lesson-top d-flex mb-4">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-descriptions-tab" data-toggle="tab" href="#nav-descriptions" role="tab" aria-controls="nav-descriptions" aria-selected="true">Descriptions</a>
                                <a class="nav-link" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                                <a class="nav-link" id="nav-program-tab" data-toggle="tab" href="#nav-program" role="tab" aria-controls="nav-program" aria-selected="false">Program</a>
                                <a class="nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</a>
                                {{-- <a class="pb-3 nav-link"><a href="#nav-teacher" class="course-detail-title text-decoration-none">Teachers</a>
                                <a class="pb-3 nav-link"><a href="#nav-program" class="course-detail-title text-decoration-none">Program</a>
                                <a class="pb-3 nav-link"><a href="#nav-review" class="course-detail-title text-decoration-none">Reviews</a> --}}
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content lesson-detail" id="nav-tabContent">
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
                                <div class="lesson-detail-title">Tag:</div>{{ $lesson->course->course_tag }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-teacher" role="tabpanel" aria-labelledby="nav-teacher-tab">
                        <div class="lesson-detail-title">Main Teacher</div>
                        <div class="mt-4">
                            <div class="teacher-info d-flex align-items-center mt-4">
                                <img src="{{ asset('storage/images/user-img.jpg') }}" class="teacher-info-img rounded-circle">
                                <div class="d-flex flex-column ml-4">
                                    <div class="teacher-info-name">Luu Trung Nghia</div>
                                    <div class="teacher-info-exp">Second Year Teacher</div>
                                    <div class="d-flex mt-2">
                                        <div class="teacher-info-gplus"><i class="fab fa-google-plus-g"></i></div>
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
                        <div class="lesson-detail-title py-5">Program</div>
                        <div class="lesson-program d-flex flex-column">
                            <div class="porgram-list py-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex">
                                        <i class="far fa-file-word col-1"></i>
                                        <div class="program-type col-2 p-0 ml-2">Lesson</div>
                                        <div class="m-0 col-9">Program learn HTML/CSS</div>
                                    </div>
                                    <button class="btn btn-learn">Preview</button>
                                </div>
                            </div>
                            <div class="porgram-list py-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex">
                                        <i class="far fa-file-pdf col-1"></i>
                                        <div class="program-type col-2 p-0 ml-2">PDF</div>
                                        <div class="m-0 col-9">Download course slides</div>
                                    </div>
                                    <button class="btn btn-learn">Preview</button>
                                </div>
                            </div>
                            <div class="porgram-list py-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex">
                                        <i class="far fa-file-video col-1"></i>
                                        <div class="program-type col-2 p-0 ml-2">Video</div>
                                        <div class="m-0 col-9">Download course videos</div>
                                    </div>
                                    <button class="btn btn-learn">Preview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['full_star']) }}" hidden id="fullStarVal">
                    <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['good_rating']) }}" hidden id="goodRatingVal">
                    <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['normal_rating']) }}" hidden id="normalRatingVal">
                    <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['bad_rating']) }}" hidden id="badRatingVal">
                    <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['very_bad_rating']) }}" hidden id="veryBadRatingVal">
                    <div aria-labelledby="nav-reviews-tab" class="tab-pane fade" id="nav-reviews" role="tabpanel">
                        <div class="lesson-detail-title pb-4">
                            {{ $lesson->lesson_review_times }} Reviews
                        </div>
                        <div class="rating d-flex py-4">
                            <div class="d-flex flex-column justify-content-center align-items-center rating-star p-5">
                                <div class="rating-star-number">
                                    {{ $lesson->lesson_avg_star }}/5
                                </div>
                                <div>
                                    @for ($i = 0; $i < $ratingStar['full_star']; $i++) 
                                        @if ($i < $lesson->lesson_avg_star) 
                                            <i class="fas fa-star"></i> 
                                        @else 
                                            <i class="far fa-star"></i> 
                                        @endif 
                                    @endfor
                                </div>
                                <div class="rating-times">
                                    {{ $lesson->lesson_review_times }} Ratings
                                </div>
                            </div>
                            <div class="total-star ml-4 px-3">
                                <div class="d-flex align-items-center my-3 justify-content-between">
                                    <div class="total-star-title">
                                        5 star
                                    </div>
                                    <div class="progress mx-2">
                                        <div class="progress-bar bg-success" id="fullStar"></div>
                                    </div>
                                    <div class="total-star-title">
                                        {{ $lesson->LessonRatingTimes($ratingStar['full_star']) }}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3 justify-content-between">
                                    <div class="total-star-title">
                                        4 star
                                    </div>
                                    <div class="progress mx-2">
                                        <div class="progress-bar bg-info" id="goodRating"></div>
                                    </div>
                                    <div class="total-star-title">
                                        {{ $lesson->LessonRatingTimes($ratingStar['good_rating']) }}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3 justify-content-between">
                                    <div class="total-star-title">
                                        3 star
                                    </div>
                                    <div class="progress mx-2">
                                        <div class="progress-bar bg-warning" id="normalRating"></div>
                                    </div>
                                    <div class="total-star-title">
                                        {{ $lesson->LessonRatingTimes($ratingStar['normal_rating']) }}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3 justify-content-between">
                                    <div class="total-star-title">
                                        2 star
                                    </div>
                                    <div class="progress mx-2">
                                        <div class="progress-bar bg-danger" id="badRating"></div>
                                    </div>
                                    <div class="total-star-title">
                                        {{ $lesson->LessonRatingTimes($ratingStar['bad_rating']) }}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-3 justify-content-between">
                                    <div class="total-star-title">
                                        1 star
                                    </div>
                                    <div class="progress mx-2">
                                        <div class="progress-bar bg-dark" id="veryBadRating"></div>
                                    </div>
                                    <div class="total-star-title">
                                        {{ $lesson->LessonRatingTimes($ratingStar['very_bad_rating']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-reviews">
                        <div class="user-reviews-title my-4">
                            <strong>Show all reviews</strong>
                        </div>@foreach ($lessonReviews as $lessonReview)
                        <div class="user-review-item">
                            <div class="user-review-item-info d-flex align-items-center">
                                <img class="rounded-circle mx-3" src="{{ asset('storage/image/#') }}">
                                <div class="user-reviews-title mr-2">
                                    {{ $lessonReview->user->name }}
                                </div>
                                <div class="mr-2">
                                    @for ($i = 0; $i < $ratingStar['full_star']; $i++) 
                                        @if ($i < $lessonReview->rating) 
                                            <i class="fas fa-star"></i> 
                                        @else <i class="far fa-star"></i> 
                                        @endif 
                                    @endfor
                                </div>
                                <div class="review-time ml-5">
                                    {{ $lessonReview->created_at }}
                                </div>
                            </div>
                            <div class="user-review-text mx-3 mt-3 pb-3">
                                {{ $lessonReview->content }}
                            </div>
                        </div>@endforeach
                    </div>
                    <div>
                        <div class="lesson-detail-title">
                            Leave a Comment
                        </div>
                        <textarea class="form-control mb-3" cols="30" id="" name="comment" placeholder="Message" rows="5"></textarea> 
                        <button class="btn btn-learn px-3 ml-3">Send</button>
                    </div>    
                </div>
            </div>
        </div>
        <div class="col-4 course-lesson-detail">
            <div class="course-info">
                <div class="course-info-text">
                    <i class="fas fa-desktop"></i> Course: {{ $lesson->course->name }}
                </div>
                <div class="course-info-text">
                    <i class="fas fa-users"></i> Learners: {{ $lesson->lesson_user }}
                </div>
                <div class="course-info-text">
                    <i class="far fa-clock"></i> Times:  {{ $lesson->time }} minutes
                </div>
                <div class="course-info-text">
                    <i class="fas fa-hashtag"></i> Tags: #tag1 #tag2
                </div>
                <div class="course-info-text">
                    <i class="far fa-money-bill-alt"></i> {{ $lesson->course->price }}.000 VNĐ
                </div>
            </div>
            {{-- <div class="course-info mt-3 mb-3">
                <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                <div class="other-list">
                    @for($i = 0; $i <= 4; $i++)
                    <div class="other-list-item py-3 mx-0">
                        <a href="#" class="text-decoration-none ml-2">{{ $i + 1 }}.  Lorem ipsum dolor sit amet, consectetur the adipiscing elit.</a>
                    </div>
                    @endfor
                    <div class="text-center p-4">
                        <button class="btn btn-view p-2 px-4" onclick="location.href='{{ Route('course.index') }}'">View all ours courses</button>
                    </div>
                </div>
            </div> --}}
            <div class="course-info mt-3 mb-3">
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
