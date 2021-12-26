@extends('layouts.home')

@section('title', 'My jobs')
@section('content')

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets')}}/images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">My Jobs</h1>
                <div class="custom-breadcrumbs">
                    <a href="{{route('home')}}">Home</a> <span class="mx-2 slash">/</span>
                    <a href="{{route('myprofile')}}">My profile</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>My Jobs</strong></span>
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
                        <div class="text-center mb-2 "><a class="btn btn-primary " href="{{route('user_job_add')}}">Add A
                                Job</a></div>
                        <div class="table-responsive">
                            <table id="job-table" class="table bg-white  ">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Category</th>
                                    <th>Title(s)</th>
                                    <th>Salary</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Gallery</th>
                                    <th>Status</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($joblist as $j)
                                    <tr>
                                        <td>{{ $j->id }}</td>
                                        <td>
                                            {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($j->category, $j->category->title)}}
                                        </td>
                                        <td>{{ $j->title }}</td>
                                        <td>{{$j->salary}}</td>
                                        <td>{{$j->location}}</td>
                                        <td>
                                            @if($j -> image)
                                                <img src="{{Storage::url($j->image)}}" height="30" alt="job-image">
                                            @endif
                                        </td>
                                        <td style="text-align: center"><a href="{{route('user_image_add',['job_id'=> $j->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100 height=700')">
                                                <i class="fa fa-2x fa-image"></i></a></td>
                                        <td>{{ $j->status }}</td>
                                        <td><a href="{{route('user_job_edit',['id'=> $j->id])}}"> <i class="fa fa-edit"></i></a></td>
                                        <td><a href="{{route('user_job_delete',['id'=> $j->id])}}"
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
        $('#job-table').DataTable();
    </script>
@endsection
