@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')

<div class="container-fluid">
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">My Courses</h3>
    </div>
    <div class="dashboard-cards mb-5">

        @foreach ($mycourse as $item)
            <div class="card card-item card-item-list-layout">
                <div class="card-image">
                    <a href="#" class="d-block">
                        <img class="card-img-top" src="{{ asset('public/'.$item->course->course_image) }}" alt="Card image cap">
                    </a>
                </div><!-- end card-image -->
                <div class="card-body">
                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $item->course->label }}</h6>
                    <h5 class="card-title"><a href="#">{{ $item->course->course_name }}</a></h5>
                    <p class="card-text"><a href="#">{{ $item->course->user->name }}</a></p>
                    <ul class="card-duration d-flex align-items-center fs-15 pb-2">

                        @if ($item->payment->status == 'confirm')
                            <li class="mr-2">
                                <span class="text-black">Watch Now:</span>
                                <span class="badge badge-danger p-2"> <a href="{{ route('course.view',$item->course_id) }}"
                                    class="text text-light px-2 pt-2 pb-2 text-uppercase" target="_blank"> Play <i class="la la-play-circle"></i> </a></span>
                            </li>
                            <li class="mr-2">
                                <span class="text-black">Status:</span>
                                <span class="badge badge-success text-white p-2 text-uppercase">{{ $item->payment->status }}</span>
                            </li>
                            <li class="mr-2">
                                <span class="text-black">Duration:</span>
                                <span>{{ $item->course->duration }}</span>
                            </li>
                        @else
                            <li class="mr-2">
                                <span class="text-black">Watch Now:</span>
                                <span class="badge badge-info p-2 text-uppercase">Please wait for activation.</span>
                            </li>
                            <li class="mr-2">
                                <span class="text-black">Status:</span>
                                <span class="badge badge-success text-white p-2 text-uppercase">{{ $item->payment->status }}</span>
                            </li>
                            <li class="mr-2">
                                <span class="text-black">Duration:</span>
                                <span>{{ $item->course->duration }}</span>
                            </li>
                        @endif

                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-price text-black font-weight-bold">${{ $item->course->selling_price }}</p>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        @endforeach


    </div><!-- end col-lg-12 -->
</div><!-- end container-fluid -->

@endsection
