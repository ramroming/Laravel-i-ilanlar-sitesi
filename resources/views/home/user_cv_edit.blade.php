@extends('layouts.home')

@section('title', 'Edit Cv')


@section('javascript')
    {{--    ck editor for the text area --}}
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection
@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
             style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white display-6 font-weight-bold">Edit Cv</h1>
                    <div class="custom-breadcrumbs display-7">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="{{route('user_cv')}}">My Cv</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Edit Cv</strong></span>
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
                        <div class="card align-items-center p-4 ">
                            <form class="form-horizontal" action="{{route('user_cv_update',['id'=>$data -> id])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label>Category</label>
                                    <select value="{{$data->category->title}}" name="category_id" class="select form-select shadow-none">
                                        @foreach($datalist as $d)
                                            <option
                                                value="{{$d->id}}">  {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($d, $d->title)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Professional title</label>
                                    <input type="text" class="form-control" name="title" value="{{$data->title}}">
                                </div>

                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="location" value="{{$data->location}}">
                                </div>

                                <div class="form-group">
                                    <label>Minimum rate/h ($) (optional)</label>
                                    <input type="text" class="form-control" name="minimum_rate"value="{{$data->minimum_rate}}">
                                </div>

                                <div class="form-group">
                                    <label>Cv Content</label>
                                    <textarea class="form-control" name="content" id="content"
                                              placeholder="Your Content">{!! $data->content !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('content');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label>Skills (optional)</label>
                                    <textarea class="form-control" name="skills" id="skills">{!! $data->skills !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('skills');
                                    </script>
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
