<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/admin/assets/images/favicon.png">

    <link href="{{asset('assets')}}/admin/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/assets/extra-libs/multicheck/multicheck.css">
    <link href="{{asset('assets')}}/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/dist/css/style.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <div class="card">
                        <form class="form-horizontal" action="{{route('admin_image_store',['job_id'=> $j -> id])}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <h3 class="card-title">Add Image</h3>
                                <h4 class="card-title text-primary">Job: {{$j->title}}</h4>
                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 text-end control-label col-form-label">
                                        Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 text-end control-label col-form-label">
                                        Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>

                                <div class="border-top ">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Add image</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Title(s)</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($images as $i)

                                            <tr>
                                                <td>{{ $i->id }}</td>
                                                <td>{{ $i->title }}</td>

                                                <td>
                                                    @if($i -> image)
                                                        <img src="{{Storage::url($i->image)}}" height="60"
                                                             alt="job-image">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin_image_delete',['id'=> $i->id,'job_id'=>$j -> id])}}"
                                                       onclick="return confirm('Record will be deleted ! Are you Sure?')"><i
                                                            class=" fa-2x fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>

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
</html>
