@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('content')

    <div class="container-fluid ">
        <div class="row ">
            <div class="col-lg-12">
                @include('home.message')
                <div class="card p-4">
                    <h3 class="card-title pb-3">Categories List</h3>
                    <div class="table-responsive">
                        <table id="com-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Subject</th>
                                <th>Comment</th>
                                <th>Rate</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($datalist as $rs)
                                <tr>
                                    <td>{{ $rs->id }}</td>
                                    <td>{{$rs->user->name}}</td>
                                    <td><a href="{{route('job',['id'=> $rs->job->id, 'slug' => $rs->job->slug])}}" target="_blank">
                                            {{ $rs->job->title }}
                                        </a></td>
                                    <td>{{ $rs->subject }}</td>
                                    <td>{{ $rs->comment }}</td>
                                    <td>{{ $rs->rate }}</td>
                                    <td>{{ $rs->created_at }}</td>
                                    <td>{{ $rs->status }}</td>
                                    <td><a href="{{route('admin_comment_show',['id'=> $rs->id])}}"
                                           onclick="return !window.open(this.href,'','top=50 left=100 width=1100 height=700')">Show</a></td>
                                    <td><a href="{{route('admin_comment_delete',['id'=> $rs->id])}}" onclick="return confirm('Are you Sure?')">Delete</a></td>

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

@endsection

@section('footer')

    <script src="{{asset('assets')}}/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="{{asset('assets')}}/admin/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="{{asset('assets')}}/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#com-table').DataTable();
    </script>
@endsection
