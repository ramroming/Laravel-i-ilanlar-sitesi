@extends('layouts.home')

@section('title', 'User Profile')

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">User Profile</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>User Profile</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section block__18514" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 mr-auto">
                    <div class="border p-4 rounded">
                        <p class="text-black font-weight-bold">User Panel</p>
                        <hr>
                        <br>
                        <ul class="list-unstyled block__47528 mb-0">
                            <li><a href="{{route('myprofile')}}">My profile</a></li>
                            <li><a href="#">My Cv</a></li>
                            <li><a href="#">xxxxx</a></li>
                            <li><a href="#">xxxxx</a></li>
                            <li><a href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10">
                    @include('profile.show')
                </div>
            </div>
        </div>
    </section>
@endsection
