@extends('layouts.home')

@section('title', 'My Cv')

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white display-6 font-weight-bold">My Cv</h1>
                    <div class="custom-breadcrumbs display-7">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>My Cv</strong></span>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="site-section block" id="next-section">
        <div class="container">
            <div class="row">
               @include('home._user-control-panel')
                <div class="col-lg-10">

                    @foreach($datalist as $data)
                    <div class="row">
                        @include('home.message')
                        <div class="col-lg-8">
                            <div class="mb-5">
                                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Professional Title</h3>
                                <p>{{$data->title}}</p>
                            </div>


                            <div class="mb-5">
                                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Content</h3>
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="d-flex align-items-start mb-2"><span>{!! $data->content !!}</span></li>

                                </ul>
                            </div>

                            <div class="mb-5">
                                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Skills</h3>
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="d-flex align-items-start mb-2"><span>{!! $data->skills !!}</span></li>
                                </ul>
                            </div>


                        </div>

                        <div class="col-lg-4">
                            <div class="bg-light p-3 border rounded mb-4">
                                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Cv Summary</h3>
                                <ul class="list-unstyled pl-3 mb-0">
                                    <li class="mb-2"><strong class="text-black">Full name:</strong> {{$data->user->name}}</li>
                                    <li class="mb-2"><strong class="text-black">Professional Title:</strong> {{$data->title}}</li>
                                    <li class="mb-2"><strong class="text-black">Published on:</strong> {{$data->created_at}}</li>
                                    <li class="mb-2"><strong class="text-black">Location:</strong> {{$data->location}}</li>
                                    <li class="mb-2"><strong class="text-black">Minimum Rate:</strong> {{$data->minimum_rate}}</li>
                                </ul>
                            </div>


                            <div class="row">
                                <div class="text-center mb-2 "><a class="btn btn-primary " href="{{route('user_cv_edit',['id' => $data -> id])}}">Edit
                                        Cv</a></div>
                                <div class="text-center mb-2 "><a class="btn btn-primary " href="{{route('user_cv_delete',['id' => $data -> id])}}">Delete
                                        Cv</a></div>
                            </div>


                        </div>
                    </div>




                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
