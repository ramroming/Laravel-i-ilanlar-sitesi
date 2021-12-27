@extends('layouts.home')

@section('title','Edit Received Application')

@section('javascript')
    {{--    ck editor for the text area --}}
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection
@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">

        @include('home._search-section')

    </section>

    <section class="site-section" id="next-section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 mb-5 mb-lg-0 ">
                    <form action="{{route('user_application_update',['id'=>$data->id])}}" method="post" class="card p-5 align-items-center ">
                        @csrf
                        <div class="row form-group">
                            <h2 class="my-font text-secondary font-weight-bold">Update the application:</h2>
                        </div>
                        @include('home.message')

                        <div class="row form-group">
                            <h3 class="  my-font text-secondary ">You are now updating the application to the
                                <span class="text-primary font-weight-bold">{{$data->job->title}}</span> job <i class="fa fa-briefcase"></i></h3>
                        </div>




                        <div class="row form-group">
                            <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="job">Job id:</label>
                                <input type="text"  id="job" name="job_id" class="form-control"
                                       value="{{$data->job_id}}" readonly/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="user_id">Candidate id:</label>
                                <input type="text"  id="id" name="user_id" class="form-control"
                                       value="{{Auth::user()->id}}" readonly/>
                            </div>
                        </div>

                        @if(!empty(Auth::user()->cv->id))
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                    <label class="text-black" for="cv_id">Cv id:</label>
                                    <input type="text"  id="id" name="cv_id" class="form-control"
                                           value="{{Auth::user()->cv->id}}" readonly/>
                                </div>
                            </div>
                        @endif


                        @if(!empty(Auth::user()->cv->id))
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                    <label class="text-black" for="cv">The title in the cv:</label>
                                    <input type="text"  id="cv" name="cv" class="form-control"
                                           value="{{Auth::user()->cv->title}}" readonly/>
                                </div>
                            </div>
                        @endif


                        <div class="row form-group">
                            <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="job">Name:</label>
                                <input type="text"  id="name" name="name" class="form-control"
                                       value="{{Auth::user()->name}}" readonly/>
                            </div>
                        </div>

                        @if(!empty(Auth::user()->profile->phone_number))
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                    <label class="text-black" for="phone">Phone Number:</label>
                                    <input type="text"  id="phone" name="phone" class="form-control"
                                           value="{{Auth::user()->profile->phone_number}}" readonly/>
                                </div>
                            </div>
                        @endif

                        <div class="row form-group">
                            <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="note">Notes:</label>
                                <textarea  id="note" name="note" class="form-control" readonly>{!! $data->note !!}</textarea>
                                <script>
                                    CKEDITOR.replace('note');
                                </script>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 text-end control-label col-form-label">
                                Status</label>
                            <div class="col-md-9">
                                <select name="status" class="select2 form-select shadow-none"
                                        style="width: 100%; height:36px;">
                                    <option selected="selected"> {{$data -> status}} </option>
                                    <option>New</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Update" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>




@endsection
