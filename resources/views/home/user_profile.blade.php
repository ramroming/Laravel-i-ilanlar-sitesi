@extends('layouts.home')

@section('title', 'User Profile')

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-white font-weight-bold">User Profile</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>User Profile</strong></span>
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
                    @include('profile.show')
                </div>
            </div>
        </div>
    </section>
@endsection
