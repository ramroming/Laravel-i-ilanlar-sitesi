@extends('layouts.home')

@section('title', $setting->title)
@section('description'){{$setting->description}}@endsection

@section('keywords',$setting->keywords)


@section('content')


    <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
    @include('home._search-section')

        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>
    </section>


    {{--  stats  --}}
    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
             style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">{{$setting->company}} Site Stats</h2>
                    <p class="lead text-white">{{$setting->description}}</p>
                </div>
            </div>
            <div class="row pb-0 block__19738 section-counter">

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="1930">0</strong>
                    </div>
                    <span class="caption">Candidates</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="54">0</strong>
                    </div>
                    <span class="caption">Jobs Posted</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="120">0</strong>
                    </div>
                    <span class="caption">Jobs Filled</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="550">0</strong>
                    </div>
                    <span class="caption">Companies</span>
                </div>


            </div>
        </div>
    </section>


    {{--    slider--}}
    @include('home._slider')


    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h1 class="section-title mb-2 my-font ">Latest Jobs </h1>
                </div>
            </div>


                <ul id="my-jobs" class="job-listings mb-5">

                    @foreach($latest as $rs)
                        <li class="job-listing d-block d-sm-flex p-3 pb-sm-0 align-items-center">
                            <a href="{{route('job',['id' => $rs->id,'slug'=> $rs -> slug])}}"></a>

                            <div class="job-listing-logo">
                                <img src="{{Storage::url($rs->image)}}"  alt="Image" class="img-fluid">
                            </div>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>{{$rs->title}}</h2>
                                    @php
                                        $avgRating= \App\Http\Controllers\HomeController::avgRating($rs-> id);
                                        $commentsCount= \App\Http\Controllers\HomeController::commentsCount($rs-> id);
                                    @endphp

                                    @if($commentsCount)
                                        {{$commentsCount}} Comment(s) {{$avgRating}}
                                        <div class="p-2 ">
                                            <i class="fa text-primary fa-star @if ($avgRating<1) fa-star-o  @endif pl-1"></i>
                                            <i class="fa text-primary fa-star @if ($avgRating<2) fa-star-o  @endif pl-1"></i>
                                            <i class="fa text-primary fa-star @if ($avgRating<3) fa-star-o  @endif pl-1"></i>
                                            <i class="fa text-primary fa-star @if ($avgRating<4) fa-star-o  @endif pl-1"></i>
                                            <i class="fa text-primary fa-star @if ($avgRating<5) fa-star-o  @endif pl-1"></i>
                                        </div>
                                    @endif
                                    <strong>{{$rs->salary}}</strong>
                                </div>

                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    @if($rs->location)
                                    <span class="icon-room"></span> {{$rs->location}}
                                 @endif
                                </div>

                                <div class="job-listing-meta">
                                    <button href="{{route('job',['id' => $rs->id,'slug'=> $rs -> slug])}}"
                                            class="btn btn-danger btn-sm">View
                                    </button>
                                    <button href="{{route('apply',['id' => $rs->id])}}" class="btn btn-secondary btn-sm ">Apply
                                        for Job
                                    </button>
                                </div>
                            </div>

                        </li>
                    @endforeach

                </ul>





{{--            <div class="row pagination-wrap">--}}
{{--                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">--}}
{{--                    <span>Showing 1-7 Of 43,167 Jobs</span>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 text-center text-md-right">--}}
{{--                    <div class="custom-pagination ml-auto">--}}
{{--                        <a href="#" class="prev">Prev</a>--}}
{{--                        <div class="d-inline-block">--}}
{{--                            <a href="#" class="active">1</a>--}}
{{--                            <a href="#">2</a>--}}
{{--                            <a href="#">3</a>--}}
{{--                            <a href="#">4</a>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="next">Next</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay"
             style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Looking For A Job?</h2>
                    <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
                        adipisci impedit.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
                </div>
            </div>
        </div>
    </section>


    {{--    <section class="site-section py-4">--}}
    {{--        <div class="container">--}}

    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-12 text-center mt-4 mb-5">--}}
    {{--                    <div class="row justify-content-center">--}}
    {{--                        <div class="col-md-7">--}}
    {{--                            <h2 class="section-title mb-2">Company We've Helped</h2>--}}
    {{--                            <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum ipsam fugit mollitia ipsum facilis expedita tempora suscipit iste</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_mailchimp.svg" alt="Image" class="img-fluid logo-1">--}}
    {{--                </div>--}}
    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_paypal.svg" alt="Image" class="img-fluid logo-2">--}}
    {{--                </div>--}}
    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_stripe.svg" alt="Image" class="img-fluid logo-3">--}}
    {{--                </div>--}}
    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_visa.svg" alt="Image" class="img-fluid logo-4">--}}
    {{--                </div>--}}

    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_apple.svg" alt="Image" class="img-fluid logo-5">--}}
    {{--                </div>--}}
    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_tinder.svg" alt="Image" class="img-fluid logo-6">--}}
    {{--                </div>--}}
    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_sony.svg" alt="Image" class="img-fluid logo-7">--}}
    {{--                </div>--}}
    {{--                <div class="col-6 col-lg-3 col-md-6 text-center">--}}
    {{--                    <img src="{{asset('assets')}}/images/logo_airbnb.svg" alt="Image" class="img-fluid logo-8">--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}


    {{--    <section class="bg-light pt-5 testimony-full">--}}

    {{--        <div class="owl-carousel single-carousel">--}}


    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-6 align-self-center text-center text-lg-left">--}}
    {{--                        <blockquote>--}}
    {{--                            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>--}}
    {{--                            <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>--}}
    {{--                        </blockquote>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-lg-6 align-self-end text-center text-lg-right">--}}
    {{--                        <img src="{{asset('assets')}}/images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-6 align-self-center text-center text-lg-left">--}}
    {{--                        <blockquote>--}}
    {{--                            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>--}}
    {{--                            <p><cite> &mdash; Chris Peters, @Google</cite></p>--}}
    {{--                        </blockquote>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-lg-6 align-self-end text-center text-lg-right">--}}
    {{--                        <img src="{{asset('assets')}}/images/person_transparent.png" alt="Image" class="img-fluid mb-0">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </section>--}}

    <section class="pt-5 bg-image overlay-primary fixed overlay"
             style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
                    <h2 class="text-white">Get The Mobile Apps</h2>
                    <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
                        adipisci impedit.</p>
                    <p class="mb-0">
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-apple mr-3"></span>App Store</a>
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-android mr-3"></span>Play Store</a>
                    </p>
                </div>
                <div class="col-md-6 ml-auto align-self-end">
                    <img src="{{asset('assets')}}/images/apps.png" alt="Free Website Template by Free-Template.co"
                         class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
