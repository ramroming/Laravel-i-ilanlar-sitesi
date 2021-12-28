@extends('layouts.home')

@section('title', 'My Received Applications')

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white display-6 font-weight-bold">My Received Applications</h1>
                    <div class="custom-breadcrumbs display-7">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="{{route('myprofile')}}">My Profile</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>My Received Applications</strong></span>
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
                    <div class="card  p-4 bg-light">
                        <div class="row">
                            <div class="text-center mb-2 "><h1 class="my-font">Received Applications</h1></div>
                        <div class="table-responsive">
                            <table id="app-table" class="table table-bordered border-light bg-white  ">

                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Job</th>
                                    <th>candidate_id</th>
                                    <th>note</th>
                                    <th>created at</th>
                                    <th>status</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $d)

                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->job->title }}</td>
                                        <td>{{$d->user_id}}</td>
                                        <td>{!! $d->note !!}</td>
                                        <td>{{ $d->created_at }}</td>
                                        <td>{{ $d->status }}</td>
                                        <td><a href="{{route('user_single_received_application',['job_id' => $d->job_id,'user_id'=> $d->user_id])}}"> <i class="fa fa-edit"></i></a></td>
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
        $('#app-table').DataTable();
    </script>
@endsection

