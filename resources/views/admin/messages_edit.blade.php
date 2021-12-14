<link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

{{--    from new template!!!!!!!!!!!!--}}
<!-- Vendor CSS Files -->
<link href="{{asset('assets')}}/assets/vendor/aos/aos.css" rel="stylesheet">
<link href="{{asset('assets')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset('assets')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="{{asset('assets')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="{{asset('assets')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="{{asset('assets')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="{{asset('assets')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{asset('assets')}}/assets/css/style.css" rel="stylesheet">

{{--    set icon on tab  --}}
<link rel="icon" href="{{asset('assets')}}/images/logo-search.png" type="image/x-icon"/>

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
                        <form class="form-horizontal" action="{{route('admin_message_update',['id' => $data])}}"
                              method="get" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <h4 class="card-title">Message Details</h4>

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
                                            <th>Email</th>
                                            <td>{{ $data->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $data->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>{{$data->subject}}</td>
                                        </tr>
                                        <tr>
                                            <th>Message</th>
                                            <td>{{$data->message}}</td>
                                        </tr>
                                        <tr>
                                            <th>Admin Note</th>
                                            <td><textarea id="detail" name="detail">{{$data->note}}</textarea></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                                <div class="border-top ">
                                                    <div class="card-body text-center">
                                                        <button type="submit" class="btn btn-primary">Update Message
                                                        </button>
                                                    </div>
                                                </div>

                                        </tr>
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



