@extends('layouts.admin')

@section('title','Admin Panel Edit Category Page')

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
                            <form class="form-horizontal" action="{{route('adminCategoryUpdate',['id' => $data -> id])}}" method="post">
                                @csrf
                                <div class="card-body">

                                    <h4 class="card-title">Edit Category</h4>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Parent</label>
                                        <div class="col-sm-9">
                                            <select name="parent_id" class="select2 form-select shadow-none"
                                                    value="{{$data->parent_id}}" style="width: 100%; height:36px;">
                                                <option value="0" >Main Category</option>
                                            {{-- datalist has all the parent's (main categories)--}}
                                                @foreach($dataList as $rs)
                                                    <option value="{{$rs->id}}"  {{ ($rs -> id) == $data -> parent_id ? "selected" : "" }} >
                                                        {{$rs->title}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" id="lname"
                                                   value="{{$data->title}}">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="keywords" class="form-control" id="lname"
                                                   value="{{$data->keywords}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3 text-end control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="description" class="form-control" id="lname"
                                                   value="{{$data->description}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname"
                                               class="col-sm-3 text-end control-label col-form-label">Slug</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="slug" class="form-control" id="lname"
                                                   value="{{$data->slug}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">Status</label>
                                        <div class="col-md-9">
                                            <select name="status" class="select2 form-select shadow-none"
                                                    style="width: 100%; height:36px;" value="{{$data->status}}">
                                                <option>True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-top">
                                        <div class="card-body text-center ">
                                            <button type="submit" class="btn btn-primary " >Update Category</button>
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
