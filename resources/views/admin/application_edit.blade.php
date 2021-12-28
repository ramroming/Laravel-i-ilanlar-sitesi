<head>

    <title>Message</title>
    <link href="{{asset('assets')}}/admin/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/assets/extra-libs/multicheck/multicheck.css">
    <link href="{{asset('assets')}}/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/admin/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{asset('assets')}}/admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]!-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    {{--    ck editor for the text area --}}
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

</head>
<body>
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

                    <div class="card">
                        @foreach($datalist as $data)
                        <form class="form-horizontal" action="{{route('admin_application_update',['id' => $data->id,'owner_id' => $data->owner_id])}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('home.message')
                                <h4 class="card-title">Application Details</h4>


                                <div class="table-responsive">

                                    <table id="job_table" class="table table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <td>{{ $data->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Candidate name</th>
                                            <td>{{ $data->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Candidate id</th>
                                            <td>{{ $data->user_id }}</td>
                                        </tr>

                                        <tr>
                                            <th>Employer id</th>
                                            <td>{{ $data->owner_id }}</td>
                                        </tr>
                                        @foreach($owner as $ow)
                                        <tr>
                                            <th>Employer name</th>
                                            <td>{{ $ow->name }}</td>
                                        </tr>

                                        @if(!empty($ow->profile->company))
                                        <tr>
                                            <th>Employer Company</th>
                                            <td>{{ $ow->profile->company }}</td>
                                        </tr>
                                        @endif
                                        @endforeach

                                        <tr>
                                            <th>Job</th>
                                            <td>{{$data->job->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Note</th>
                                            <td>
                                                <div class="row form-group">
                                                    <div class="col-md-12 mb-6 mb-md-0">
                                                        <label class="text-black" for="note">Notes:</label>
                                                        <textarea  id="note" name="note" class="form-control" required>{!! $data->note !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('note');
                                                        </script>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <select name="status" class="select2 form-select shadow-none"
                                                        style="width: 100%; height:36px;">
                                                    <option selected="selected" > {{$data -> status}} </option>
                                                    <option>New</option>
                                                    <option>in-review</option>
                                                    <option>Accepted</option>
                                                    <option>Rejected</option>
                                                </select>

                                            </td>
                                        </tr>
                                        </thead>


                                    </table>

                                    <div class="border-top ">
                                        <div class="card-body text-center mb-2">
                                            <button type="submit" class="btn btn-primary">Update
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

