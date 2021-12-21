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
                        <form class="form-horizontal" action="{{route('admin_comment_update',['id' => $data])}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <h4 class="card-title">Comment Details</h4>
                                 @include('home.message')

                                <div class="table-responsive">
                                    <table id="job_table" class="table table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <td>{{ $data->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Job</th>
                                            <td>{{ $data->job->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>{{ $data->subject }}</td>
                                        </tr>
                                        <tr>
                                            <th>Comment</th>
                                            <td>{{$data->comment}}</td>
                                        </tr>
                                        <tr>
                                            <th>Rate</th>
                                            <td>{{$data->rate}}</td>
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
                                                    <option>True</option>
                                                    <option>False</option>
                                                </select>

                                            </td>
                                        </tr>
                                        </thead>
                                {{--      <tbody>--}}
                                {{--      </tbody>--}}

                                    </table>

                                    <div class="border-top ">
                                        <div class="card-body text-center">
                                            <button type="submit" class="btn btn-primary">Update Comment
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

