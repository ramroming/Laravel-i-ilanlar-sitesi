@extends('layouts.home')

@section('title', 'My Application')

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white display-6 font-weight-bold">My Profile</h1>
                    <div class="custom-breadcrumbs display-7">
                        <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="{{route('user_application')}}">Applications</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>My Application</strong></span>
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
                    <div class="row">
                        @foreach($datalist as $d)
                        <a href="{{route('user_application_edit',['id'=> $d->id])}}"> Edit Application <i class="fa fa-edit"></i></a>
                    </div>
                        <div class="table-responsive">
                            <table id="app-table" class="table table-bordered border-light bg-white  ">

                                <tr>
                                    <th>id</th>
                                    <td>{{ $d->id }}</td>
                                </tr>

                                <tr>
                                    <th>Job</th>
                                    <td>{{ $d->job->title }}</td>
                                </tr>

                                <tr>
                                    <th>my_id</th>
                                    <td>{{ $d->user_id }}</td>
                                </tr>
                                <tr>
                                    <th>note</th>
                                    <td>{!! $d->note !!}</td>
                                </tr>
                                <tr>
                                    <th>created at</th>
                                    <td>{{ $d->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>status</th>
                                    <td>{{ $d->status }}</td>
                                </tr>


                                @endforeach


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
        $('#app-table').DataTable();
    </script>
@endsection

