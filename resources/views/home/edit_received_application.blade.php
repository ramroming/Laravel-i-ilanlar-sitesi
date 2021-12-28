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
                    @foreach($datalist as $data)
                    <form action="{{route('user_application_update',['id'=>$data->id])}}" method="post" class="card p-5 align-items-center ">
                        @csrf
                        <div class="row form-group">
                            <h2 class="my-font text-secondary font-weight-bold">Update the application:</h2>
                        </div>
                        @include('home.message')

                        <div class="row form-group">
                            <h3 class="  my-font text-secondary ">You are now updating the application <span class="text-danger font-weight-bold">{{$data->id}}</span>
                                to the <span class="text-primary font-weight-bold">{{$data->job->title}}</span> job <i class="fa fa-briefcase"></i>
                           <p class="text-center"> of the candidate <span class="text-success font-weight-bold">{{Auth::user()->name}}</span></p></h3>
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
                                       value="{{$data->user_id}}" readonly/>

                                @if(!empty($data->user->profile->id))
                                <div class="col-md-12 mt-2 text-center">
                                    <a href="{{route('user_profile_show',['id'=> $data->user_id])}}" class="btn btn-outline-warning text-black  ">Check public profile</a>
                                </div>
                                @endif

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="job">Candidate name:</label>
                                <input type="text"  id="name" name="name" class="form-control"
                                       value="{{$data->user->name}}" readonly/>
                            </div>
                        </div>

                        @if(!empty($data->user->cv->id))
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                    <label class="text-black" for="cv_id">Cv id:</label>
                                    <input type="text"  id="id" name="cv_id" class="form-control"
                                           value="{{$data->user->cv->id}}" readonly/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                    <label class="text-black" for="cv">The title in the cv:</label>
                                    <input type="text"  id="cv" name="cv" class="form-control"
                                           value="{{$data->user->cv->title}}" readonly/>
                                </div>
                                <div class="col-md-12 mt-2 text-center">
                                    <a href="{{route('show_application_cv',['id'=> $data->user->cv->id])}}" class="btn btn-outline-warning text-black  ">Check Cv</a>
                                </div>
                            </div>
                        @endif




                        @if(!empty($data->user->profile->phone_number))
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                    <label class="text-black" for="phone">Candidate  phone number:</label>
                                    <input type="text"  id="phone" name="phone" class="form-control"
                                           value="{{$data->user->profile->phone_number}}" readonly/>
                                </div>
                            </div>
                        @endif


                        <td>
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                    <label class="text-black" for="note">Notes:</label>
                                    <textarea  id="note" name="note" class="form-control" >{!! $data->note !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('note');
                                    </script>
                                </div>
                            </div>
                        </td>

                        <div class="form-group row ">
                            <label class=" control-label col-form-label">
                                Status: </label>
                            <div>
                                <select name="status" class="select form-select shadow-none" >
                                    <option selected="selected"> {{$data -> status}} </option>
                                    <option>New</option>
                                    <option>in-review</option>
                                    <option>Accepted</option>
                                    <option>Rejected</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group mt-3">
                            <div class="col-md-12">
                                <input type="submit" value="Update" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>

                    </form>
                        @endforeach
                </div>

            </div>
        </div>
    </section>




@endsection
