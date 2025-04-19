@include('frontend.mycourse.body.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<body>

<!-- start cssload-loader -->
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
<section class="header-menu-area">
    <div class="header-menu-content bg-dark">
        <div class="container-fluid">
            <div class="main-menu-content d-flex align-items-center">
                <div class="course-dashboard-header-title pl-4 py-2">
                    <a href="#" class="text-white fs-15">{{ $course->course->course_name }}</a>
                </div><!-- end course-dashboard-header-title -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->
</section><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->

<!--======================================
        START COURSE-DASHBOARD
======================================-->
<section class="course-dashboard">
    <div class="course-dashboard-wrap">
        <div class="course-dashboard-container d-flex">
            <div class="course-dashboard-column">


                <div class="lecture-viewer-container">
                    <div class="lecture-video-item">
                        <iframe width="100%" height="500" id="videoContainer" src=""
                                        title="" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                        <div id="textLesson" class="fs-24 font-weight-semi-bold pb-2 text-center mt-4">
                            <h3></h3>
                        </div>
                    </div>
                </div><!-- end lecture-viewer-container -->


                <div class="lecture-video-detail">
                    <div class="lecture-tab-body bg-gray p-4">
                        <ul class="nav nav-tabs generic-tab" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">
                                    Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="question-and-ans-tab" data-toggle="tab" href="#question-and-ans" role="tab" aria-controls="question-and-ans" aria-selected="false">
                                    Question & Ans
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="lecture-video-detail-body">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="lecture-overview-wrap">
                                    <div class="lecture-overview-item">
                                        <h3 class="fs-24 font-weight-semi-bold pb-2">About this course</h3>
                                        <p>{{ $course->course->course_title }}</p>
                                    </div><!-- end lecture-overview-item -->
                                    <div class="section-block"></div>
                                    <div class="lecture-overview-item">
                                        <div class="lecture-overview-stats-wrap d-flex">
                                            <div class="lecture-overview-stats-item">
                                                <h3 class="fs-16 font-weight-semi-bold pb-2">By the numbers</h3>
                                            </div><!-- end lecture-overview-stats-item -->
                                            <div class="lecture-overview-stats-item">
                                                <ul class="generic-list-item">
                                                    <li><span>Skill level:</span>{{ $course->course->label }}</li>
                                                    <li><span>Students:</span>83950</li>
                                                    <li><span>Languages:</span>English</li>
                                                    <li><span>Captions:</span>Yes</li>
                                                </ul>
                                            </div><!-- end lecture-overview-stats-item -->
                                            <div class="lecture-overview-stats-item">
                                                <ul class="generic-list-item">
                                                    <li><span>Recources:</span>{{ $course->course->resources }}</li>
                                                    <li><span>Video length:</span>{{ $course->course->duration }} total hours</li>
                                                    <li><span>Certificate:</span>{{ $course->course->certificate }}</li>
                                                </ul>
                                            </div><!-- end lecture-overview-stats-item -->
                                        </div><!-- end lecture-overview-stats-wrap -->
                                    </div><!-- end lecture-overview-item -->

                                    {{-- <div class="section-block"></div>
                                    <div class="lecture-overview-item">
                                        <div class="lecture-overview-stats-wrap d-flex">
                                            <div class="lecture-overview-stats-item">
                                                <h3 class="fs-16 font-weight-semi-bold pb-2">Certificates</h3>
                                            </div><!-- end lecture-overview-stats-item -->
                                            <div class="lecture-overview-stats-item lecture-overview-stats-wide-item">
                                                <p class="pb-3">Get Aduca certificate by completing entire course</p>
                                                <a href="#" class="btn theme-btn theme-btn-transparent">Certificate</a>
                                            </div><!-- end lecture-overview-stats-item -->
                                        </div><!-- end lecture-overview-stats-wrap -->
                                    </div><!-- end lecture-overview-item --> --}}
                                    <div class="section-block"></div>
                                    <div class="lecture-overview-item">
                                        <div class="lecture-overview-stats-wrap d-flex">
                                            <div class="lecture-overview-stats-item">
                                                <h3 class="fs-16 font-weight-semi-bold pb-2">Description</h3>
                                            </div><!-- end lecture-overview-stats-item -->
                                            <div class="lecture-overview-stats-item lecture-overview-stats-wide-item lecture-description">
                                                <h3 class="fs-16 font-weight-semi-bold pb-2">{{ $course->course->course_title }}</h3>
                                                <p>{!! $course->course->description !!}</p>

                                            </div><!-- end lecture-overview-stats-item -->
                                        </div><!-- end lecture-overview-stats-wrap -->
                                    </div><!-- end lecture-overview-item -->
                                    <div class="section-block"></div>

                                </div><!-- end lecture-overview-wrap -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade" id="question-and-ans" role="tabpanel" aria-labelledby="question-and-ans-tab">
                                <div class="lecture-overview-wrap lecture-quest-wrap">
                                    <div class="new-question-wrap">
                                        <button class="btn theme-btn theme-btn-transparent back-to-question-btn"><i class="la la-reply mr-1"></i>Back to all questions</button>
                                        <div class="new-question-body pt-40px">
                                            <h3 class="fs-20 font-weight-semi-bold">My question relates to</h3>

                                            <form action="{{ route('user.question') }}" method="POST" class="pt-4">
                                                @csrf

                                                <input type="hidden" name="course_id" value="{{ $course->course_id }}" />
                                                <input type="hidden" name="instructor_id" value="{{ $course->instructor_id }}" />

                                                <div class="custom-control-wrap">
                                                    <div class="custom-control custom-radio mb-3 pl-0">
                                                        <input type="text" name="subject" class="form-control form--control pl-3" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="custom-control-wrap">
                                                    <div class="custom-control custom-radio mb-3 pl-0">
                                                        <textarea class="form-control form--control pl-3" name="question" rows="4" placeholder="Write your response..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="btn-box text-center">
                                                    <button type="submit" class="btn theme-btn w-100">Submit <i class="la la-arrow-right icon ml-1"></i></button>
                                                </div>
                                            </form>

                                        </div>
                                    </div><!-- end new-question-wrap -->


                                    <div class="question-overview-result-wrap">

                                        <div class="lecture-overview-item">
                                            <div class="question-overview-result-header d-flex align-items-center justify-content-between">
                                                <h3 class="fs-17 font-weight-semi-bold">{{ count($allquestion) }} questions in this course</h3>
                                                <button class="btn theme-btn theme-btn-sm theme-btn-transparent ask-new-question-btn">Ask a new question</button>
                                            </div>
                                        </div><!-- end lecture-overview-item -->
                                        <div class="section-block"></div>
                                        <div class="lecture-overview-item mt-0">
                                            <div class="question-list-item">


                                        @php
                                            $id = Auth::user()->id;
                                            $question = App\Models\Question::where('user_id',$id)
                                                        ->where('course_id',$course->course->id)
                                                        ->where('parent_id',null)->orderBy('id','asc')->get();
                                        @endphp

                                            @foreach ($question as $que )

                                                <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                                                    <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                        <img class="rounded-full" src="{{ (!empty($que->user->photo)) ? url('public/upload/user_images/'.$que->user->photo) : url('public/upload/no_image.jpg') }}" alt="User image">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="question-meta-content">
                                                                <a href="javascript:void(0)" class="ask-new-question-btn">
                                                                    <h5 class="fs-16 pb-1">User: {{ $que->user->name }}</h5>
                                                                    <h5 class="fs-16 pb-1">{{ $que->subject }}</h5>
                                                                    <p class="text-truncate fs-15 text-gray">
                                                                        {{ $que->question }}
                                                                    </p>
                                                                </a>
                                                            </div><!-- end question-meta-content -->
                                                        </div>
                                                        <p class="meta-tags pt-1 fs-13">
                                                            <span>{{ Carbon\Carbon::parse($que->created_at)->diffForHumans() }}</span>
                                                        </p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->


                                                @php
                                                    $reply = App\Models\Question::where('parent_id', $que->id)->get();
                                                @endphp

                                                @foreach ($reply as $rep )

                                                    <div class="media media-card border-bottom border-bottom-gray py-4 px-3" style="background: #e6e6e6;">
                                                        <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                            <img class="rounded-full" src="{{ (!empty($rep->instructor->photo)) ?
                                                                url('public/upload/instructor_images/'.$rep->instructor->photo) :
                                                                url('public/upload/no_image.jpg') }}" alt="Instructor image">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="question-meta-content">
                                                                        <h5 class="fs-16 pb-1">Instructor: {{ $rep->instructor->name }}</h5>
                                                                        <p class="text-truncate fs-15 text-gray">
                                                                            {{ $rep->question }}
                                                                        </p>
                                                                </div><!-- end question-meta-content -->
                                                            </div>
                                                            <p class="meta-tags pt-1 fs-13">
                                                                <span>{{ Carbon\Carbon::parse($rep->created_at)->diffForHumans() }}</span>
                                                            </p>
                                                        </div><!-- end media-body -->
                                                    </div><!-- end media -->

                                                @endforeach

                                            @endforeach


                                            </div>
                                            <div class="question-btn-box pt-35px text-center">
                                                <button class="btn theme-btn theme-btn-transparent w-100" type="button">See More</button>
                                            </div>
                                        </div><!-- end lecture-overview-item -->
                                    </div>
                                </div>
                            </div><!-- end tab-pane -->

                        </div><!-- end tab-content -->
                    </div><!-- end lecture-video-detail-body -->
                </div><!-- end lecture-video-detail -->
                <div class="cta-area py-4 bg-gray">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="cta-content-wrap">
                                    <h3 class="fs-18 font-weight-semi-bold">Build in-demand career skills.</h3>
                                </div>
                            </div><!-- end col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="client-logo-wrap text-right">
                                    @php
                                        $setting= App\Models\SiteSettings::find(1);
                                    @endphp
                                    <a href="#" class="client-logo-item client--logo-item-2 pr-3"><img src="{{ asset('public/'.$setting->logo) }}" alt="brand image"></a>
                                </div><!-- end client-logo-wrap -->
                            </div><!-- end col-lg-6 -->
                        </div><!-- end row -->
                    </div><!-- end container-fluid -->
                </div><!-- end cta-area -->

            </div><!-- end course-dashboard-column -->
            <div class="course-dashboard-sidebar-column">
                <button class="sidebar-open" type="button"><i class="la la-angle-left"></i> Course content</button>
                <div class="course-dashboard-sidebar-wrap custom-scrollbar-styled">
                    <div class="course-dashboard-side-heading d-flex align-items-center justify-content-between">
                        <h3 class="fs-18 font-weight-semi-bold">Course content</h3>
                        <button class="sidebar-close" type="button"><i class="la la-times"></i></button>
                    </div><!-- end course-dashboard-side-heading -->
                    <div class="course-dashboard-side-content">
                        <div class="accordion generic-accordion generic--accordion" id="accordionCourseExample">

                        @foreach ($section as $sec)
                        @php
                            $lectures = App\Models\CourseLecture::where('section_id',$sec->id)->get();
                        @endphp
                            <div class="card">
                                <div class="card-header" id="headingOne{{ $sec->id }}">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne{{ $sec->id }}" aria-expanded="true" aria-controls="collapseOne{{ $sec->id }}">
                                        <i class="la la-angle-down"></i>
                                        <i class="la la-angle-up"></i>
                                        <span class="fs-15">{{ $sec->section_title }}</span>
                                        <span class="course-duration">
                                            <span>({{ count($lectures) }})</span>
                                        </span>
                                    </button>
                                </div><!-- end card-header -->
                                <div id="collapseOne{{ $sec->id }}" class="collapse" aria-labelledby="headingOne{{ $sec->id }}" data-parent="#accordionCourseExample">
                                    <div class="card-body p-0">
                                        <ul class="curriculum-sidebar-list">

                                            @foreach ($lectures as $keylect=>$lect)


                                                @if($keylect == 0 )

                                                    <li class="course-item-link active">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox" required>
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox"></label>
                                                            </div><!-- end custom-control -->
                                                            <div class="course-item-content">

                                                                <h6 class="mb-3"> {{ $lect->lecture_title }} </h6>

                                                                <h4 class="fs-15 lecture-title btn btn-success" data-video-url='{{ url('/') }}/{{ 'public/'.$lect->url }}' data-content='{!! $lect->content !!}'>Play <i class="la la-play-circle"></i> </h4>

                                                                @php
                                                                    $result = App\Models\QuizResult::select('result')
                                                                                ->where('user_id', Auth::id())
                                                                                ->where('instructor_id', $course->course->instructor_id)
                                                                                ->where('course_id', $course->course->id)
                                                                                ->where('section_id', $sec->id)
                                                                                ->where('lecture_id', $lect->id)
                                                                                ->value('result');


                                                                @endphp

                                                                @if($result == "pass")
                                                                    <span class="badge badge-info">Congrats! You have completed the quiz.</span>
                                                                @else
                                                                    <div class="courser-item-meta-wrap mt-3">
                                                                        <a href="{{
                                                                                url('/quizdesk/view',
                                                                                    [
                                                                                        'instructorId' => $course->course->instructor_id,
                                                                                        'courseId' => $course->course->id,
                                                                                        'sectionId' => $sec->id,
                                                                                        'lectureId' => $lect->id,
                                                                                    ])
                                                                                }}"
                                                                            class="btn btn-warning btn-sm pull-right"
                                                                            target="_blank">
                                                                        Start the Quiz. You need to pass the quiz to view the next video</a>
                                                                        </a>
                                                                    </div>
                                                                @endif

                                                            </div><!-- end course-item-content -->
                                                        </div><!-- end course-item-content-wrap -->
                                                    </li>

                                                @elseif($keylect > 0)

                                                     <li class="course-item-link active">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox" required>
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox"></label>
                                                            </div><!-- end custom-control -->
                                                            <div class="course-item-content">

                                                                <h6 class="mb-3"> {{ $lect->lecture_title }}  </h6>

                                                                @php
                                                                    //previous record check
                                                                    $previousResultValue = App\Models\QuizResult::where('user_id', Auth::id())
                                                                                        ->where('instructor_id', $course->course->instructor_id)
                                                                                        ->where('course_id', $course->course->id)
                                                                                        ->where('section_id', $sec->id)
                                                                                        ->where('created_at', '<', function($query) use ($course, $sec, $lect) {
                                                                                            $query->select('created_at')
                                                                                                ->from('quiz_results')
                                                                                                ->where('user_id', Auth::id())
                                                                                                ->where('instructor_id', $course->course->instructor_id)
                                                                                                ->where('course_id', $course->course->id)
                                                                                                ->where('section_id', $sec->id)
                                                                                                ->where('lecture_id', $lect->id);
                                                                                        })
                                                                                        ->orderBy('created_at', 'desc')
                                                                                        ->value('result');
                                                                @endphp

                                                                @if($result == "pass")

                                                                    <h4 class="fs-15 lecture-title btn btn-success" data-video-url='{{ url('/') }}/{{ 'public/'.$lect->video }}' data-content='{!! $lect->content !!}'>Play <i class="la la-play-circle"></i> </h4>


                                                                    @php
                                                                    $result = App\Models\QuizResult::select('result')
                                                                                ->where('user_id', Auth::id())
                                                                                ->where('instructor_id', $course->course->instructor_id)
                                                                                ->where('course_id', $course->course->id)
                                                                                ->where('section_id', $sec->id)
                                                                                ->where('lecture_id', $lect->id)
                                                                                ->value('result');


                                                                    @endphp

                                                                    @if($result == "pass")
                                                                        <span class="badge badge-info">Congrats! You have completed the quiz.</span>
                                                                    @else
                                                                        <div class="courser-item-meta-wrap mt-3">
                                                                            <a href="{{
                                                                                    url('/quizdesk/view',
                                                                                        [
                                                                                            'instructorId' => $course->course->instructor_id,
                                                                                            'courseId' => $course->course->id,
                                                                                            'sectionId' => $sec->id,
                                                                                            'lectureId' => $lect->id,
                                                                                        ])
                                                                                    }}"
                                                                                class="btn btn-warning btn-sm pull-right"
                                                                                target="_blank">
                                                                            Start the Quiz. You need to pass the quiz to view the next video</a>
                                                                            </a>
                                                                        </div>
                                                                    @endif




                                                            </div><!-- end course-item-content -->
                                                        </div><!-- end course-item-content-wrap -->
                                                    </li>

                                                    @else
                                                        <span class="badge badge-danger">
                                                                {{ "You need to pass previous lecture quiz to play the video" }}
                                                        </span>

                                                    @endif


                                                @endif


                                            @endforeach

                                        </ul>
                                    </div><!-- end card-body -->
                                </div><!-- end collapse -->
                            </div><!-- end card -->
                        @endforeach



                        </div><!-- end accordion-->
                    </div><!-- end course-dashboard-side-content -->
                </div><!-- end course-dashboard-sidebar-wrap -->
            </div><!-- end course-dashboard-sidebar-column -->
        </div><!-- end course-dashboard-container -->
    </div><!-- end course-dashboard-wrap -->
</section><!-- end course-dashboard -->
<!--======================================
        END COURSE-DASHBOARD
======================================-->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="la la-arrow-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<!-- Modal -->
<div class="modal fade modal-container" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-gray">
                <div class="pr-2">
                    <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="ratingModalTitle">
                        How would you rate this course?
                    </h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div><!-- end modal-header -->
            <div class="modal-body text-center py-5">
                <div class="leave-rating mt-5">
                    <input type="radio" name='rate' id="star5"/>
                    <label for="star5" class="fs-45"></label>
                    <input type="radio" name='rate' id="star4"/>
                    <label for="star4" class="fs-45"></label>
                    <input type="radio" name='rate' id="star3"/>
                    <label for="star3" class="fs-45"></label>
                    <input type="radio" name='rate' id="star2"/>
                    <label for="star2" class="fs-45"></label>
                    <input type="radio" name='rate' id="star1"/>
                    <label for="star1" class="fs-45"></label>
                    <div class="rating-result-text fs-20 pb-4"></div>
                </div><!-- end leave-rating -->
            </div><!-- end modal-body -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->

<!-- Modal -->
<div class="modal fade modal-container" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-gray">
                <h5 class="modal-title fs-19 font-weight-semi-bold" id="shareModalTitle">Share this course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div><!-- end modal-header -->
            <div class="modal-body">
                <div class="copy-to-clipboard">
                    <span class="success-message">Copied!</span>
                    <div class="input-group">
                        <input type="text" class="form-control form--control copy-input pl-3" value="https://www.aduca.com/share/101WxMB0oac1hVQQ==/">
                        <div class="input-group-append">
                            <button class="btn theme-btn theme-btn-sm copy-btn shadow-none"><i class="la la-copy mr-1"></i> Copy</button>
                        </div>
                    </div>
                </div><!-- end copy-to-clipboard -->
            </div><!-- end modal-body -->
            <div class="modal-footer justify-content-center border-top-gray">
                <ul class="social-icons social-icons-styled">
                    <li><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                    <li><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                    <li><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                </ul>
            </div><!-- end modal-footer -->
        </div><!-- end modal-content-->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->

<!-- Modal -->
<div class="modal fade modal-container" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-gray">
                <div class="pr-2">
                    <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="reportModalTitle">Report Abuse</h5>
                    <p class="pt-1 fs-14 lh-24">Flagged content is reviewed by Aduca staff to determine whether it violates Terms of Service or Community Guidelines. If you have a question or technical issue, please contact our
                        <a href="contact.html" class="text-color hover-underline">Support team here</a>.</p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div><!-- end modal-header -->
            <div class="modal-body">
                <form method="post">
                    <div class="input-box">
                        <label class="label-text">Select Report Type</label>
                        <div class="form-group">
                            <div class="select-container w-auto">
                                <select class="select-container-select">
                                    <option value>-- Select One --</option>
                                    <option value="1">Inappropriate Course Content</option>
                                    <option value="2">Inappropriate Behavior</option>
                                    <option value="3">Aduca Policy Violation</option>
                                    <option value="4">Spammy Content</option>
                                    <option value="5">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Write Message</label>
                        <div class="form-group">
                            <textarea class="form-control form--control pl-3" name="message" placeholder="Provide additional details here..." rows="5"></textarea>
                        </div>
                    </div>
                    <div class="btn-box text-right pt-2">
                        <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn theme-btn theme-btn-sm lh-30">Submit <i class="la la-arrow-right icon ml-1"></i></button>
                    </div>
                </form>
            </div><!-- end modal-body -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->

<!-- Modal -->
<div class="modal fade modal-container" id="insertLinkModal" tabindex="-1" role="dialog" aria-labelledby="insertLinkModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-gray">
                <div class="pr-2">
                    <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="insertLinkModalTitle">Insert Link</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div><!-- end modal-header -->
            <div class="modal-body">
                <form action="#">
                    <div class="input-box">
                        <label class="label-text">URL</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text" placeholder="Url">
                            <i class="la la-link input-icon"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Text</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text" placeholder="Text">
                            <i class="la la-pencil input-icon"></i>
                        </div>
                    </div>
                    <div class="btn-box text-right pt-2">
                        <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn theme-btn theme-btn-sm lh-30">Insert <i class="la la-arrow-right icon ml-1"></i></button>
                    </div>
                </form>
            </div><!-- end modal-body -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->

<!-- Modal -->
<div class="modal fade modal-container" id="uploadPhotoModal" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-gray">
                <div class="pr-2">
                    <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="uploadPhotoModalTitle">Upload an Image</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div><!-- end modal-header -->
            <div class="modal-body">
                <div class="file-upload-wrap">
                    <input type="file" name="files[]" class="multi file-upload-input" multiple>
                    <span class="file-upload-text"><i class="la la-upload mr-2"></i>Drop files here or click to upload</span>
                </div><!-- file-upload-wrap -->
                <div class="btn-box text-right pt-2">
                    <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn theme-btn theme-btn-sm lh-30">Submit <i class="la la-arrow-right icon ml-1"></i></button>
                </div>
            </div><!-- end modal-body -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->


<script type="text/javascript">
    // Function to open the first lecture when the page loads
    function openFirstLecture() {
        const firstLecture = document.querySelector('.lecture-title'); // Get the first lecture element
        if (firstLecture) {
            firstLecture.click(); // Trigger the click event on the first lecture
        }
    }

    // Function to handle lecture clicks and load content
    function viewLesson(videoUrl, vimeoUrl, textContent) {
        const video = document.getElementById("videoContainer");
        const text = document.getElementById("textLesson");
        const textContainer = document.createElement("div");

        if (videoUrl && videoUrl.trim() !== "") {
            video.classList.remove("d-none");
            text.classList.add("d-none");
            text.innerHTML = "";
            video.setAttribute("src", videoUrl);
        } else if (vimeoUrl && vimeoUrl.trim() !== "") {
            video.classList.remove("d-none");
            text.classList.add("d-none");
            text.innerHTML = "";
            video.setAttribute("src", vimeoUrl);
        } else if (textContent && textContent.trim() !== "") {
            video.classList.add("d-none");
            text.classList.remove("d-none");
            text.innerHTML = "";
            textContainer.innerText = textContent;
            textContainer.style.fontSize = "14px";
            textContainer.style.textAlign = "left";
            textContainer.style.paddingLeft = "40px";
            textContainer.style.paddingRight = "40px";
            text.appendChild(textContainer);
        }
    }

    // Add a click event listener to all lecture elements
    document.querySelectorAll('.lecture-title').forEach((lectureTitle) => {
        lectureTitle.addEventListener('click', () => {
            const videoUrl = lectureTitle.getAttribute('data-video-url');
            const vimeoUrl = lectureTitle.getAttribute('data-vimeo-url');
            const textContent = lectureTitle.getAttribute('data-content');
            viewLesson(videoUrl, vimeoUrl, textContent);
        });
    });

    // Open the first lecture when the page loads
    window.addEventListener('load', () => {
        openFirstLecture();
    });
</script>

@include('frontend.mycourse.body.footer')
