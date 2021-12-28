@extends('layouts.home')

@foreach($datalist as $data)
@section('title', $data->user->name."'s public profile")
@endforeach

@section('content')

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">

    @include('home._search-section')


</section>

<section class="site-section block " id="next-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <div class="card align-items-center justify-content-center p-5">
                    @foreach($datalist as $data)
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
