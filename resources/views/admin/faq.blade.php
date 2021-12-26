@extends('layouts.admin')

@section('title','Frequently Asked Questions List')

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
                        <h3 class="card-title">Frequently Asked Questions</h3>
                        <div class="text-center"><a class="btn btn-primary" href="{{route('admin_faq_add')}}">Add
                                FAQ</a></div>
                        <div class="mt-2">
                        @include('home.message')
                        </div>
                        <div class="table-responsive">
                            <table id="job_table" class="table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Position</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->position }}</td>
                                        <td>{{ $data->question }}</td>
                                        <td>{!! $data->answer!!}</td>
                                        <td>{{ $data->status }}</td>
                                        <td><a href="{{route('admin_faq_edit',['id'=> $data->id])}}"> <i class="fas fa-edit"></i></a></td>
                                        <td><a href="{{route('admin_faq_delete',['id'=> $data->id])}}"
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
