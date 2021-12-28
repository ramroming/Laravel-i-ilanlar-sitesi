@extends('layouts.admin')
@section('title','Admin Panel Edit User Page')


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

    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card">
                            <form class="form-horizontal" action="{{route('admin_user_update',['id' => $data ->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <h4 class="card-title">Edit User</h4>



                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$data->name}}">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" class="form-control"
                                                   value="{{$data->email}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">
                                            Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="phone" class="form-control"
                                                   value="{{$data->phone}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">
                                            Address</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="address" class="form-control"
                                                   value="{{$data->address}}">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">
                                            Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control">

                                            @if ($data->profile_photo_path)
                                                <img src="{{Storage::url($data->profile_photo_path)}}" height="200" alt="old-image">
                                            @endif
                                        </div>
                                    </div>



                                    <div class="border-top ">
                                        <div class="card-body text-center">
                                            <button type="submit" class="btn btn-primary">Update User</button>
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
