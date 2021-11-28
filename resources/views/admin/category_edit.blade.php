@extends('layouts.admin')
@section('title','Admin Panel Home Page')

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
                            <form class="form-horizontal" action="{{route('adminCategoryCreate')}}" method="post">
                                @csrf
                                <div class="card-body">

                                    <h4 class="card-title">Add Category</h4>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Parent</label>
                                        <div class="col-sm-9">
                                            <select name="parent_id" class="select2 form-select shadow-none"
                                                    style="width: 100%; height:36px;">
                                                <option value="0" selected="selected">Main Category</option>
                                                @foreach($dataList as $rs)
                                                    <option value="{{$rs->id}}">{{$rs->title}}</option>
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
                                        <label class="col-sm-3 text-end control-label col-form-label">Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="keywords" class="form-control" id="lname"
                                                   placeholder="Keywords Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="description" class="form-control" id="lname"
                                                   placeholder="Description Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname"
                                               class="col-sm-3 text-end control-label col-form-label">Slug</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="slug" class="form-control" id="lname"
                                                   placeholder="Slug Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">Status</label>
                                        <div class="col-md-9">
                                            <select name="status" class="select2 form-select shadow-none"
                                                    style="width: 100%; height:36px;">
                                                <option selected="selected">True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Add Category</button>
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
