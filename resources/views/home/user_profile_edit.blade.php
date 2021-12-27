@extends('layouts.home')

@section('title', 'Edit Public Profile')



@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
             style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white display-6 font-weight-bold">Edit Public Profile</h1>
                    <div class="custom-breadcrumbs display-7">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="{{route('user_public_profile')}}">My Public Profile</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Edit Public Profile</strong></span>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="site-section block" id="next-section">
        <div class="container">
            <div class="row">
            @include('home._user-control-panel')
            <!-- contact area -->
                <div class="col-lg-10 ">
                    <!-- create cv -->
                    <div class="row">
                        <div class="card  p-4 ">
                            <form class="form-horizontal" action="{{route('user_profile_update',['id'=>$data -> id])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$data->address}}">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{$data->phone_number}}">
                                </div>

                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" name="company" value="{{$data->company}}">
                                </div>

                                <div class="card border-0">
                                    <div class="text-center mb-2 ">
                                        <button type="submit" class="btn btn-primary ">Update</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <!-- Submit Cv END -->
                </div>



            </div>
        </div>
    </section>

@endsection
