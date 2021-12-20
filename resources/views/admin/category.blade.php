@extends('layouts.admin')

@section('title','Category List')

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
                        <h3 class="card-title">Categories List</h3>
                        <div class="text-center"><a class="btn btn-primary" href="{{route('adminCategoryAdd')}}">Add A Category</a></div>
                        <div class="table-responsive">
                            <table id="cat-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Parent</th>
                                    <th>Title(s)</th>
                                    <th>Status</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($dataList as $rs)
                                <tr>
                                    <td>{{ $rs->id }}</td>
{{--                                    <td>{{ $rs->parent_id }}</td>--}}
                                    <td>
                                        {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title)}}
                                    </td>
                                    <td>{{ $rs->title }}</td>
                                    <td>{{ $rs->status }}</td>
                                    <td><a href="{{route('adminCategoryEdit',['id'=> $rs->id])}}">Edit</a></td>
                                    <td><a href="{{route('adminCategoryDelete',['id'=> $rs->id])}}" onclick="return confirm('Are you Sure?')">Delete</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
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
        $('#cat-table').DataTable();
    </script>
@endsection
