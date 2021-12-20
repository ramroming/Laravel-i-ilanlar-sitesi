<section class="bg-light pt-5 testimony-full">

    <div class="owl-carousel single-carousel">

        @foreach($slider as $rs)
            <div class="container">


                <div class="row">


                    <div class=" col-lg-6 align-self-center text-center text-lg-left">
                        <h1>{{$rs->title}}</h1>
                        <h4 class="my-font">{{$rs->salary}}</h4>
                        <a href="{{route('job',['id' => $rs->id,'slug'=> $rs -> slug])}}"
                           class="btn btn-warning text-white btn-lg mb-2 mt-2">Check Ad</a>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-right">
                        <img src="{{Storage::url($rs->image)}}" alt="Image" class="img-fluid mb-0">
                    </div>

                </div>
            </div>

        @endforeach
    </div>

</section>

