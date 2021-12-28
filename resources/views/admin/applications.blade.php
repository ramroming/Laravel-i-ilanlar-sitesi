@extends('layouts.admin')
@section('title','Admin Applications List')

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
                        <h5 class="card-title">Applications List</h5>


                        @include('home.message')
                        <div class="card ">
                            <div class="row">
                                <div class="text-center mb-2 "><h1 class="my-font">All Applications</h1></div>
                                <div class="table-responsive">
                                    <table id="app-table" class="table table-striped table-bordered " >
                                        <thead>
                                        <tr>
                                            <th>Application id</th>
                                            <th>Candidate name</th>
                                            <th>Candidate id</th>
                                            <th>Employer id</th>
                                            <th>Job</th>
                                            <th>Candidate note</th>
                                            <th>created at</th>
                                            <th>status</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datalist as $d)
                                            <tr>
                                                <td>{{ $d->id }}</td>
                                                <td>
                                                    <a href="{{route('admin_user_show',['id'=> $d->user->id])}}"
                                                       onclick="return !window.open(this.href,'','top=50 left=100 width=1100 height=700')">
                                                        {{$d->user->name}}
                                                    </a>
                                                </td>
                                                <td>{{ $d->user_id }}</td>
                                                <td>{{ $d->owner_id }}</td>
                                                <td>{{ $d->job->title }}</td>
                                                <td>{!! $d->note !!}</td>
                                                <td>{{ $d->created_at }}</td>
                                                <td>{{ $d->status }}</td>
                                                <td><a href="{{route('admin_application_show',['id'=> $d->id,'owner_id' => $d-> owner_id])}}"
                                                       onclick="return !window.open(this.href,'','top=50 left=100 width=1100 height=700')">Show</a></td>
                                                <td><a href="{{route('user_application_delete',['id'=> $d->id])}}"
                                                       onclick="return confirm('Are you Sure?')"><i class="fa fa-trash"></i></a></td>
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
        </div>
    </div>

@endsection
@section('footer')
    {{--    ck editor for the text area --}}
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="{{asset('assets')}}/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="{{asset('assets')}}/admin/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="{{asset('assets')}}/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#app-table').DataTable();
    </script>
@endsection
