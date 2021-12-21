@extends('layouts.home')


@section('content')

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">My Comments</h1>
                <div class="custom-breadcrumbs">
                    <a href="">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>My Comments</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section block" id="next-section">
    <div class="container">
        <div class="row">
            @include('home._user-control-panel')
            <div class="col-lg-10">

                @include('home.message')
                <div class="card p-4 bg-light">
                    <div class="table-responsive">
                        <table id="com-table" class="table bg-white table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Job</th>
                                <th>Subject</th>
                                <th>Comment</th>
                                <th>Rate</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($datalist as $rs)
                                <tr>
                                    <td>{{ $rs->id }}</td>
                                    <td><a href="{{route('job',['id'=> $rs->job->id, 'slug' => $rs->job->slug])}}" target="_blank">
                                            {{ $rs->job->title }}
                                        </a></td>
                                    <td>{{ $rs->subject }}</td>
                                    <td>{{ $rs->comment }}</td>
                                    <td>{{ $rs->rate }}</td>
                                    <td>{{ $rs->created_at }}</td>
                                    <td>{{ $rs->status }}</td>
                                    <td><a href="{{route('destroy-comment',['id'=> $rs->id])}}" onclick="return confirm('Are you Sure?')">Delete</a></td>
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
</section>


@endsection

@section('footerjs')

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
