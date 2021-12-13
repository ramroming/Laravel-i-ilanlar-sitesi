@extends('layouts.admin')

@section('title','Admin Panel Add Job Page')


@section('javascript')

    <!-- include summernote css/js -->
    <!-- include libraries(jQuery, bootstrap) -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@endsection

@section('content')


  <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card">
                            <form class="form-horizontal" action="{{route('admin_job_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <h4 class="card-title">Add Job</h4>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Category</label>
                                        <div class="col-sm-9">
                                            <select name="category_id" class="select2 form-select shadow-none"
                                                    style="width: 100%; height:36px;">
                                                @foreach($datalist as $d)
                                                    <option value="{{$d->id}}">  {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($d, $d->title)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" id="lname"
                                                   placeholder="Enter Title Here">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="keywords" class="form-control" id="lname"
                                                   placeholder="Keywords Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">
                                            Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="description" class="form-control" id="lname"
                                                   placeholder="Description Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">
                                           Slug</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="slug" class="form-control"
                                                   placeholder="Slug Here">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="detail" class="col-sm-3 text-end control-label col-form-label">
                                            Details</label>
                                        <div class="col-sm-9">
                                            <textarea id="detail" name="detail">{{$d->detail}}</textarea>
                                            <script>
                                                $('#detail').summernote({
                                                    tabsize: 2,
                                                    height: 300
                                                });
                                            </script>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">
                                            Salary</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="salary" class="form-control"
                                                   placeholder="Enter Salary Here">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Status</label>
                                        <div class="col-md-9">
                                            <select name="status" class="select2 form-select shadow-none"
                                                    style="width: 100%; height:36px;">
                                                <option selected="selected">True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">
                                            Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="border-top ">
                                        <div class="card-body text-center">
                                            <button type="submit" class="btn btn-primary">Add Job</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
