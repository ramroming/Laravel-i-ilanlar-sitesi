@extends('layouts.home')

@section('title', 'Frequently Asked Questions')


@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Frequently Asked Questions</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>FAQ</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="accordion">
        <div class="container">

            <div class="row accordion justify-content-center align-items-center block__76208">

                <div class="col-lg-7 m-auto">

                    <!-- .accordion-item -->

                    @foreach($datalist as $rs)
                    <div class="accordion-item p-2">
                        <h3 class="mb-0 heading">
                            <a class="btn-block h4 my-font" data-toggle="collapse" href="#collapse{{$rs->id}}" role="button" aria-expanded="true"
                               aria-controls="collapse{{$rs->id}}">
                                {{$rs->question}}
                                <span class="icon"></span></a>
                        </h3>
                        <div id="collapse{{$rs->id}}" class="collapse" data-parent="#accordion">
                            <div class="body-text">
                                <p>{!! $rs->answer !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>


            </div>
        </div>
    </section>

@endsection
