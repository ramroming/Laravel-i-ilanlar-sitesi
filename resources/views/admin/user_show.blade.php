<head>

    <title>{{$data->name}}</title>
    <link href="{{asset('assets')}}/admin/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/assets/extra-libs/multicheck/multicheck.css">
    <link href="{{asset('assets')}}/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
          rel="stylesheet">
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

                    <div class="card">

                        <div class="card-body">
                            @include('home.message')
                            <h4 class="card-title">User</h4>


                            <div class="table-responsive">

                                <table id="job_table" class="table table-striped table-bordered ">
                                    <thead>
                                    <tr>
                                        <th><strong>User id =</strong> {{ $data->id }}</th>
                                        <td>
                                            @if ($data->profile_photo_path)
                                                <img src="{{Storage::url($data->profile_photo_path)}}" height="120" alt="old-image" class="rounded-circle">
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $data->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $data->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $data->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{ $data->created_at}}</td>
                                    </tr>

                                    <tr>
                                        <th>Roles</th>
                                        <td>
                                            <table>
                                                @foreach($data->roles as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>
                                                            <a href="{{route('admin_user_role_delete',['user_id'=> $data->id,'role_id'=>$row->id])}}"
                                                               onclick="return confirm('Are you Sure?')">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Add Role</th>
                                        <td>

                                            <form role="form"
                                                  action="{{route('admin_user_role_add',['id'=>$data->id])}}"
                                                  method="post" enctype="multipart/form-data">
                                                @csrf

                                                <select name="role_id" class="select form-select shadow-none"
                                                        style="width: 25%; height:36px;">
                                                    @foreach($datalist as $rs)
                                                        <option value="{{$rs->id}}"> {{$rs->name}} </option>
                                                    @endforeach
                                                </select>

                                                <button type="submit" class="mt-2 btn btn-primary">Add Role
                                                </button>


                                            </form>
                                        </td>
                                    </tr>

                                    </thead>

                                </table>


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

