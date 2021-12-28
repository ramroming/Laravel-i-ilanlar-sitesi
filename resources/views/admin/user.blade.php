@extends('layouts.admin')

@section('title','Users List')

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
                    <div class="card-body ">
                        <h3 class="card-title">Users List</h3>
{{--                        <div class="text-center"><a class="btn btn-primary" href="{{route('admin_user_add')}}">Add A--}}
{{--                                User</a></div>--}}

                        @include('home.message')
                        <div class="table-responsive">
                            <table id="job_table" class="table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Roles</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            @if($data -> profile_photo_path)
                                                <img src="{{Storage::url($data->profile_photo_path)}}" height="50" alt="job-image">
                                            @endif
                                        </td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>
                                            @foreach($data->roles as $row)
                                                {{$row->name}},
                                            @endforeach
                                            <a class="ml-2" href="{{route('admin_user_roles',['id'=> $data->id])}}"
                                               onclick="return !window.open(this.href,'','top=50 left=100 width=1100 height=700')"> <i class="fas fa-plus-circle"></i></a>
                                        </td>
                                        <td><a href="{{route('admin_user_edit',['id'=> $data->id])}}"> <i class="fas fa-edit"></i></a></td>
                                        <td><a href="{{route('admin_user_delete',['id'=> $data->id])}}"
                                               onclick="return confirm('Are you Sure?')"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->

@endsection

@section('footer')
    <script src="{{asset('assets')}}/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="{{asset('assets')}}/admin/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="{{asset('assets')}}/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#job_table').DataTable();
    </script>
@endsection
