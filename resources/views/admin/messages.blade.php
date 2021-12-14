@extends('layouts.admin')

@section('title','Contact Messages List')

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
                        <h3 class="card-title">Messages</h3>
                        @include('home.message')
                        <div class="table-responsive">
                            <table id="job_table" class="table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Admin Note</th>
                                    <th colspan="3">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>{{ $d->phone }}</td>
                                        <td>{{$d->subject}}</td>
                                        <td>{{$d->message}}</td>
                                        <td>{{$d->note}}</td>
                                        <td style="text-align: center"><a href="{{route('admin_message_edit',['id'=> $d->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100 height=700')">
                                                <i class="fas fa-2x fa-edit"></i></a></td>
                                        <td><a href="{{route('admin_message_delete',['id'=> $d->id])}}"
                                               onclick="return confirm('Are you Sure?')">Delete Message</a></td>
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
