@extends('layouts.home')

@section('css')
    <style>
        .comment-box {
            padding: 5px;
        }

        .comment-area textarea {
            resize: none;
        }

        .send {
            color: #fff;
        }

        .send:hover {
            opacity: 0.5;
        }

        .rating {
            display: flex;
            margin-top: -10px;
            flex-direction: row-reverse;
            margin-left: -4px;
            float: left
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 19px;
            font-size: 25px;
            color: #7ed048;
            cursor: pointer
        }

        .rating > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating > input:checked ~ label:before {
            opacity: 1
        }

        .rating:hover > input:checked ~ label:before {
            opacity: 0.4
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating > input:checked ~ label:before {
            opacity: 1
        }

        .rating:hover > input:checked ~ label:before {
            opacity: 0.4
        }
    </style>


@endsection

@section('title', $data->title)
@section('description'){{$data->description}}@endsection

@section('keywords',$data->keywords)


@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
             style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">

        @include('home._search-section')

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold ">{{$data->title}}</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Jobs</a> <span class="mx-2 slash">/</span>
                        <span
                            class="text-white"><strong> {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($data->category, $data->category->title)}}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>
    </section>


    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="{{asset('assets')}}/images/job.png" style="width:100px" alt="Image">
                        </div>
                        <div>
                            <h2 class="my-font">{{$data->title}}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>Puma</span>
                                <span class="m-2"><span class="icon-room mr-2"></span>{{$data->location}}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">Full Time</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">

                        <div class="bg-light pt-5  testimony-full">
                            <div class="owl-carousel single-carousel">

                                <div class="container">
                                    <div class="row" class="align-items-center justify-content-center ">

                                        <div>
                                            <img src="{{Storage::url($data->image)}}" alt="Image"
                                                 class="img-fluid m-auto py-2">
                                        </div>

                                    </div>
                                </div>

                                @foreach($imagelist as $image)
                                    <div class="container">
                                        <div class="row" class="align-items-center justify-content-center ">

                                            <div>
                                                <img src="{{Storage::url($image->image)}}" alt="Image"
                                                     class="img-fluid m-auto py-2">
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{--                    tabs--}}
                    <div class="row mb-4">
                        <!-- Tabs -->
                        <div class="card  ">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                        href="#desc"
                                                        role="tab"><span class="hidden-sm-up"></span> <span
                                            class="hidden-xs-down">Description</span></a></li>

                                <li class="nav-item"><a class="nav-link " data-bs-toggle="tab"
                                                        href="#details"
                                                        role="tab"><span class="hidden-sm-up"></span> <span
                                            class="hidden-xs-down">Details</span></a></li>

                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#comments"
                                                        role="tab"><span class="hidden-sm-up"></span> <span
                                            class="hidden-xs-down">
                                            @php
                                                $commentsCount= \App\Http\Controllers\HomeController::commentsCount($data-> id);
                                            @endphp
                                            Comments ({{$commentsCount}})</span></a></li>


                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">

                                <div class="tab-pane active" id="desc" role="tabpanel">
                                    <div class="p-20">

                                        <div class="form-group row ">
                                            <div class="p-20">
                                                <p class="p-4"> {{$data->description}} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane " id="details" role="tabpanel">
                                    <div class="p-20">

                                        <div class="form-group row ">
                                            <div class="p-20">
                                                <p class="p-4">{!! $data->detail !!}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                {{--      COMMENTS --}}
                                <div class="tab-pane " id="comments" role="tabpanel">
                                    <div class="p-20">

                                        <div class="form-group row ">
                                            <div class="p-20">

                                                <div class="row">

                                                        <div class="col-12">
                                                            <div class=" ml-2">

                                                            @foreach($comment as $rs)
                                                                <!-- Comment  -->
                                                                    <div class="d-flex flex-row comment-row p-3">
                                                                        <div class="bg-light p-3 w-100 rounded border border-success">
                                                                            <h6 class=" text-secondary font-medium mb-2"><a><i
                                                                                        class="fa fa-user mr-1"></i>
                                                                                </a>{{$rs->user->name}}</h6>
                                                                            <h6 class="font-medium">
                                                                                <strong>{{$rs->subject}}</strong>
                                                                            </h6>
                                                                            <span
                                                                                class="mb-3 d-block">{{$rs->comment}}</span>
                                                                            <div class="mb-3 rating">
                                                                                <i class="fa text-primary fa-star @if ($rs->rate<5) fa-star-o  @endif pl-1"></i>
                                                                                <i class="fa text-primary fa-star @if ($rs->rate<4) fa-star-o  @endif pl-1"></i>
                                                                                <i class="fa text-primary fa-star @if ($rs->rate<3) fa-star-o  @endif pl-1"></i>
                                                                                <i class="fa text-primary fa-star @if ($rs->rate<2) fa-star-o  @endif pl-1"></i>
                                                                                <i class="fa text-primary fa-star @if ($rs->rate<1) fa-star-o  @endif pl-1"></i>

                                                                            </div>
                                                                            <div class="comment-footer">
                                                                                    <span
                                                                                        class="text-muted float-end"><i
                                                                                            class="fa fa-clock-o pr-1"></i>{{$rs->created_at}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                            </div>

                                                        </div>


                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row align-items-center justify-content-center">
                        <div class="col-3 m-2">
                            <a href="#" class="btn btn-block btn-success btn-md">Apply Now</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2">
                                <strong class="text-black">Rating:</strong>

                                @php
                                $avgRating= \App\Http\Controllers\HomeController::avgRating($data-> id);
                                @endphp

                                {{$commentsCount}} Comment(s) {{$avgRating}}
                                <div class="p-2 ">
                                    <i class="fa text-primary fa-star @if ($avgRating<5) fa-star-o  @endif pl-1"></i>
                                    <i class="fa text-primary fa-star @if ($avgRating<4) fa-star-o  @endif pl-1"></i>
                                    <i class="fa text-primary fa-star @if ($avgRating<3) fa-star-o  @endif pl-1"></i>
                                    <i class="fa text-primary fa-star @if ($avgRating<2) fa-star-o  @endif pl-1"></i>
                                    <i class="fa text-primary fa-star @if ($avgRating<1) fa-star-o  @endif pl-1"></i>
                                </div>

                            </li>
                            <li class="mb-2"><strong class="text-black">Published on:</strong> {{$data->created_at}}
                            </li>
                            <li class="mb-2"><strong class="text-black">description:</strong> {{$data->description}}
                            </li>
                            {{--                            <li class="mb-2"><strong class="text-black">Vacancy:</strong> 20</li>--}}
                            {{--                            <li class="mb-2"><strong class="text-black">Employment Status:</strong> Full-time</li>--}}
                            {{--                            <li class="mb-2"><strong class="text-black">Experience:</strong> 2 to 3 year(s)</li>--}}
                            <li class="mb-2"><strong class="text-black">Job Location:</strong> {{$data->location}}</li>
                            <li class="mb-2"><strong class="text-black">Salary:</strong> {{$data->salary}}</li>

                            {{--                            <li class="mb-2"><strong class="text-black">Gender:</strong> Any</li>--}}
                            {{--                            <li class="mb-2"><strong class="text-black">Application Deadline:</strong> April 28, 2019--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>

                    <div class="bg-light p-3 border rounded">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Leave a comment:</h3>
                        <div class="px-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="comment-box ml-2">
                                        @livewire('comment',['id' => $data -> id])
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('footerjs')


    @endsection
