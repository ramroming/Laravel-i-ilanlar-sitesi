@extends('layouts.admin')

@section('title','Job List')

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
                        <h3 class="card-title">Jobs List</h3>
                        <div class="text-center"><a class="btn btn-primary" href="{{route('admin_job_add')}}">Add A
                                Job</a></div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Category</th>
                                    <th>Title(s)</th>
                                    <th>Salary</th>
                                    <th>Image</th>
                                    <th>Images Gallery</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($joblist as $j)
                                    <p></p>

                                    <tr>
                                        <td>{{ $j->id }}</td>
                                        <td>{{ $j->category_id }}</td>
                                        <td>{{ $j->title }}</td>
                                        <td>{{$j->salary}}</td>
                                        <td>
                                            @if($j -> image)
                                                <img src="{{Storage::url($j->image)}}" height="30" alt="job-image">
                                            @endif
                                        </td>
                                        <td style="text-align: center"><a href="{{route('admin_image_add',['job_id'=> $j->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100 height=700')">
                                                <i class="fas fa-2x fa-images"></i></a></td>
                                        <td>{{ $j->status }}</td>
                                        <td><a href="{{route('admin_job_edit',['id'=> $j->id])}}">Edit Job</a></td>
                                        <td><a href="{{route('admin_job_delete',['id'=> $j->id])}}"
                                               onclick="return confirm('Are you Sure?')">Delete Job</a></td>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
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
        $('#zero_config').DataTable();
    </script>
@endsection
