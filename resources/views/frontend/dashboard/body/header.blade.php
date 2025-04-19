@php
    $setting= App\Models\SiteSettings::find(1);
@endphp
<header class="header-menu-area">
    <div class="header-menu-content dashboard-menu-content pr-30px pl-30px bg-white shadow-sm">
        <div class="container-fluid">
            <div class="main-menu-content">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="logo-box logo--box">
                            <a href="#" class="logo"><img src="{{ asset('public/'.$setting->logo) }}" alt="logo"></a>
                        </div><!-- end logo-box -->
                        <div class="menu-wrapper">
                            <div class="nav-right-button d-flex align-items-center">
                                <div class="user-action-wrap d-flex align-items-center">

                                    @php
                                        $id = Auth::user()->id;
                                        $profileData = App\Models\User::find($id);
                                    @endphp

                                    <div class="shop-cart user-profile-cart">
                                        <ul>
                                            <li>
                                                <div class="shop-cart-btn">
                                                    <div class="avatar-xs">
                                                        <img class="rounded-full img-fluid" src="{{ (!empty($profileData->photo)) ? url('public/upload/user_images/'.$profileData->photo) : url('public/upload/no_image.jpg') }}" alt="Avatar image">
                                                    </div>
                                                    <span class="dot-status bg-1"></span>
                                                </div>
                                                <ul class="cart-dropdown-menu after-none p-0 notification-dropdown-menu">
                                                    <li class="menu-heading-block d-flex align-items-center">
                                                        <a href="#" class="avatar-sm flex-shrink-0 d-block">
                                                            <img class="rounded-full img-fluid" src="{{ (!empty($profileData->photo)) ? url('public/upload/user_images/'.$profileData->photo) : url('public/upload/no_image.jpg') }}" alt="Avatar image">
                                                        </a>
                                                        <div class="ml-2">
                                                            <h4><a href="#" class="text-black">{{ $profileData->name }}</a></h4>
                                                            <span class="d-block fs-14 lh-20">{{ $profileData->email }}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <ul class="generic-list-item">
                                                            <li>
                                                                <a href="{{ route('user.profile') }}">
                                                                    <i class="la la-edit mr-1"></i> Edit profile
                                                                </a>
                                                            </li>
                                                            <li><div class="section-block"></div></li>
                                                            <li>
                                                                <a href="{{ route('user.logout') }}">
                                                                    <i class="la la-power-off mr-1"></i> Logout
                                                                </a>
                                                            </li>
                                                            <li><div class="section-block"></div></li>
                                                            <li>
                                                                <a href="#" class="position-relative">
                                                                    <span class="fs-17 font-weight-semi-bold d-block">Aims Education</span>
                                                                    <span class="lh-20 d-block fs-14 text-gray">Bring learning to your company</span>
                                                                    <span class="position-absolute top-0 right-0 mt-3 mr-3 fs-18 text-gray">
                                                                    <i class="la la-external-link"></i>
                                                                </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- end shop-cart -->
                                </div>
                            </div><!-- end nav-right-button -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-10 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->

    <div class="body-overlay"></div>
</header><!-- end header-menu-area -->
