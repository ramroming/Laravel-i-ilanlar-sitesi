@extends('layouts.home')

@section('title', $data->title ." jobs list")
@section('description'){{$data->description}}@endsection

@section('keywords',$data->keywords)


@section('content')

    <!-- HOME -->
    <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">



        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, quas fugit ex!</p>
                    </div>
                    <form method="post" class="search-jobs-form">
                        <div class="row mb-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <input type="text" class="form-control form-control-lg" placeholder="Job title, Company...">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
                                    <option>Anywhere</option>
                                    <option>San Francisco</option>
                                    <option>Palo Alto</option>
                                    <option>New York</option>
                                    <option>Manhattan</option>
                                    <option>Ontario</option>
                                    <option>Toronto</option>
                                    <option>Kansas</option>
                                    <option>Mountain View</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                                    <option>Part Time</option>
                                    <option>Full Time</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 popular-keywords">
                                <h3>Trending Keywords:</h3>
                                <ul class="keywords list-unstyled m-0 p-0">
                                    <li><a href="#" class="">UI Designer</a></li>
                                    <li><a href="#" class="">Python</a></li>
                                    <li><a href="#" class="">Developer</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{$data->title}}</h1>
                    <div class="custom-breadcrumbs" style="width:100vw">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="{{route('home')}}">Jobs list</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong> {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($data, $data->title)}}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>
    </section>





    <section class="site-section" id="next">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2"> {{$data->title ." jobs list"}}</h2>
                </div>
            </div>

            <ul id="my-jobs" class="job-listings mb-5">

                @foreach($datalist as $rs)
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="job-single.html"></a>
                    <div class="job-listing-logo">
                        <img src="{{Storage::url($rs->image)}}" alt="Image" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2>{{$rs->title}}</h2>
                            <strong>{{$rs->salary}}</strong>
                        </div>

                        <div class="job-listing-meta">
                            <button href="#" class="btn btn-primary">Check Job</button>
                        </div>
                    </div>

                </li>
                @endforeach


            </ul>

            <div class="row pagination-wrap">
                <div class="col-md-12 text-center text-md-left mb-4 mb-md-0">
                    <span>Showing {{count($datalist)}} of {{$count}}  jobs on this website</span>
                </div>
{{--                <div class="col-md-6 text-center text-md-right">--}}
{{--                    <div class="custom-pagination ml-auto">--}}
{{--                        <a href="#" class="prev">Prev</a>--}}
{{--                        <div class="d-inline-block">--}}
{{--                            <a href="my_jobs" class="active">1</a>--}}
{{--                            <a href="my_jobs">2</a>--}}
{{--                            <a href="my_jobs">3</a>--}}
{{--                            <a href="my_jobs">4</a>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="next">Next</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </div>
    </section>

@endsection
