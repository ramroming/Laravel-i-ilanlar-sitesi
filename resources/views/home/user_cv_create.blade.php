@extends('layouts.home')

@section('title', 'Create Cv')


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
                    <h1 class="text-white display-6 font-weight-bold">Create Cv</h1>
                    <div class="custom-breadcrumbs display-7">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Create Cv</strong></span>
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
                            <form class="form-horizontal" action="{{route('user_cv_store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label>Category</label>
                                    <select name="category_id" class="select form-select shadow-none">
                                        @foreach($datalist as $d)
                                            <option
                                                value="{{$d->id}}">  {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($d, $d->title)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Professional title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Web Designer">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="location" placeholder="London">
                                </div>

                                <div class="form-group">
                                    <label>Minimum rate/h ($) (optional)</label>
                                    <input type="text" class="form-control" name="minimum_rate" placeholder="50 ($)">
                                </div>

                                <div class="form-group">
                                    <label>Cv Content</label>
                                    <textarea class="form-control" name="content" id="content"
                                              placeholder="Your Content"></textarea>
                                    <script>
                                        CKEDITOR.replace('content');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label>Skills (optional)</label>
                                    <textarea class="form-control" name="skills" id="skills"
                                              placeholder="Your Skills"></textarea>
                                    <script>
                                        CKEDITOR.replace('skills');
                                    </script>
                                </div>

                                <div class="card border-0">
                                    <div class="text-center mb-2 ">
                                        <button type="submit" class="btn btn-primary ">Create</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- Submit Cv END -->
                </div>



            </div>
        </div></section>

@endsection
