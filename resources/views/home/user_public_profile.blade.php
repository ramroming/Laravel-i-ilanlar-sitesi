@extends('layouts.home')

@section('title', 'Public Profile')



@section('content')

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">My Public Profile</h1>
                <div class="custom-breadcrumbs">
                    <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                    <a href="{{route('home')}}">My Profile</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>My Public Profile</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section block" id="next-section">
    <div class="container">
        <div class="row">
            @include('home._user-control-panel')

            @foreach($datalist as $data)
            <div class="col-lg-6">

                <div class="card align-items-center justify-content-center p-5">

                    @include('home.message')
                    <div class="mb-2">
                        <label class="text-success  font-weight-bold">Name: </label>
                        <span>{{$data->user->name}}</span>
                    </div>

                    <div  class="mb-2">
                        <label class="text-success font-weight-bold">Phone: </label>
                        <span>{{$data->phone_number}}</span>
                    </div>

                    <div  class="mb-2">
                        <label class="text-success font-weight-bold">Address: </label>
                        <span>{{$data->address}}</span>
                    </div>

                    <div class="mb-2">
                        <label class="text-success font-weight-bold">Company: </label>
                        @if(empty($data->company))
                            <span>No Company </span>
                        @elseif(!empty($data->company))
                            <span>{{$data->company}}</span>
                        @endif

                    </div>

                    <div class="row">
                        <div class="text-center mb-2 "><a class="btn btn-primary " href="{{route('user_profile_edit',['id' => $data -> id])}}">Edit Profile
                            </a></div>
                        <div class="text-center mb-2 "><a class="btn btn-primary " href="{{route('user_profile_delete',['id' => $data -> id])}}">Delete Profile
                            </a></div>
                    </div>


                </div>

            </div>
            <div class="col-lg-4 sidebar pl-lg-4">
                    <!-- Current Profile Photo -->
                    <div class="mt-2">

                        <img src="{{ $data->user->profile_photo_url }}" alt="{{ $data->user->name }}" class="img-fluid mb-4 w-50 rounded-circle border">
                    </div>

            </div>

            @endforeach
        </div>
    </div>
</section>

@endsection
