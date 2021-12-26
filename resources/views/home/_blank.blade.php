@extends('layouts.home')

@section('title', $data->title)
@section('description'){{$data->description}}@endsection

@section('keywords',$data->keywords)


@section('content')

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Service Single</h1>
                <div class="custom-breadcrumbs">
                    <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Service Single</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section block__18514" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto">
                <div class="border p-4 rounded">
                    <ul class="list-unstyled block__47528 mb-0">
                        <li><span class="active">Graphic Design</span></li>
                        <li><a href="#">Marketing Strategy</a></li>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Market Leading</a></li>
                        <li><a href="#">Search Engine Optimization</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <p>hello from blank</p>
            </div>
        </div>
    </div>
</section>
@endsection
