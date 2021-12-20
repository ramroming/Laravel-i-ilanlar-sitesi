@extends('layouts.home')

@section('title', $search ." jobs list")


@section('content')

    <!-- HOME -->
    <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">



      @include('home._search-section')

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{$search}}</h1>
                    <div class="custom-breadcrumbs" style="width:100vw">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>{{$search}} Job List</strong></span>
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
                    <h2 class="section-title mb-2"> {{$search ." jobs list"}}</h2>
                </div>
            </div>

            <ul id="my-jobs" class="job-listings mb-5">

                @foreach($datalist as $rs)
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="{{route('job',['id' => $rs->id,'slug'=> $rs -> slug])}}"></a>
                    <div class="job-listing-logo">
                        <img src="{{Storage::url($rs->image)}}" alt="Image" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2>{{$rs->title}}</h2>
                            <strong>{{$rs->salary}}</strong>
                        </div>

                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            @if($rs->location)
                                <span class="icon-room"></span> {{$rs->location}}
                            @endif
                        </div>

                        <div class="job-listing-meta">
                            <button href="{{route('job',['id' => $rs->id,'slug'=> $rs -> slug])}}" class="btn btn-primary">Check Job</button>
                        </div>
                    </div>

                </li>
                @endforeach


            </ul>

            <div class="row pagination-wrap">
                <div class="col-md-12 text-center text-md-left mb-4 mb-md-0">
                    <span>Showing {{$count}} - {{$search}} jobs </span>
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
