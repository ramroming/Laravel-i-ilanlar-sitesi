@extends('layouts.home')

@section('title','Edit Job')

@section('javascript')


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

@section('css')
    <style>
        .note-editable {
            background-color: white !important;
        }
    </style>
@endsection
@section('content')


    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
             style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Edit job</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="{{route('user_jobs')}}">My jobs</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Edit Job</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section block" id="next-section">
        <div class="container">
            <div class="row">
                @include('home._user-control-panel')
                <div class="col-lg-10 ">
                    <div class="card bg-light align-items-center">
                        <form class="form-horizontal" action="{{route('user_job_update',['id' => $j ->id])}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-3 text-end control-label col-form-label">
                                        Category</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" class="select form-select shadow-none"
                                                style="width: 100%; height:36px;">
                                            @foreach($dataList as $d)
                                                <option
                                                    value="{{$d->id}}" {{ ($d-> id) == $j -> category_id ? "selected" : "" }} >
                                                    {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($d,$d->title)}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 text-end control-label col-form-label">
                                        Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" id="lname"
                                               value="{{$j->title}}">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 text-end control-label col-form-label">
                                        Keywords</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="keywords" class="form-control" id="lname"
                                               value="{{$j->keywords}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 text-end control-label col-form-label">
                                        Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="description" class="form-control" id="lname"
                                               value="{{$j->description}}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-end control-label col-form-label">
                                        Detail</label>
                                    <div class="col-sm-9">
                                        <textarea id="details" name="details">{{$j->detail}}</textarea>
                                        <script>
                                            $('#details').summernote({
                                                tabsize: 2,
                                                height: 300
                                            });
                                        </script>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="salary" class="col-sm-3 text-end control-label col-form-label">
                                        Salary</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="salary" class="form-control" id="salary"
                                               value="{{$j->salary}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 text-end control-label col-form-label">
                                        Location</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="location" class="form-control"
                                               value="{{$j->location}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 text-end control-label col-form-label">
                                        Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="slug" class="form-control"
                                               value="{{$j->slug}}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 text-end control-label col-form-label">
                                        Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control">

                                        @if ($j->image)
                                            <img src="{{Storage::url($j->image)}}" height="100" alt="old-image">
                                        @endif
                                    </div>
                                </div>




                                <div class="border-top ">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Update Job</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    @include('home.message')

                </div>
            </div>
        </div>
        </div>
    </section>


@endsection


