@extends('layouts.home')

@section('title','Contact - ' . $setting->title)
@section('description'){{$setting->description}}@endsection

@section('keywords',$setting->keywords)

@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Contact Us</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Contact Us</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <form action="{{route('sendmessage')}}" method="post">
                        @csrf
                        <div class="row form-group">
                            <h2 class="text-monospace text-secondary font-weight-bold">Contact Form</h2>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                <input type="subject" name="subject"  id="subject" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label>
                                <textarea name="message"  id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class=" mb-3 bg-white">
                        <div class="row form-group">
                            <h2 class="text-monospace text-secondary font-weight-bold">Contact info</h2>
                        </div>
                        <p class="mb-0 font-weight-bold">{!! $setting->contact!!}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
