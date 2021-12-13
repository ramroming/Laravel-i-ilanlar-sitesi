@extends('layouts.admin')
@section('title','Admin Panel Edit setting Page')


@section('javascript')

    <!-- include summernote css/js -->
    <!-- include libraries(jQuery, bootstrap) -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@endsection

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
                            <form class="form-horizontal" action="{{route('admin_setting_update')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <h4 class="card-title">Edit Settings</h4>

                                    <!-- Tabs -->
                                    <div class="card">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                                    href="#general"
                                                                    role="tab"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down">General</span></a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#smtp"
                                                                    role="tab"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down">Smtp</span></a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#social"
                                                                    role="tab"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down">Social Media</span></a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                                    href="#aboutUs"
                                                                    role="tab"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down">About us</span></a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                                    href="#contactPage"
                                                                    role="tab"><span class="hidden-sm-up"></span>
                                                    <span class="hidden-xs-down">Contact Page</span></a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#ref"
                                                                    role="tab"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down">References</span></a></li>

                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabcontent-border">
                                            <div class="tab-pane active" id="general" role="tabpanel">
                                                <div class="p-20">
                                                    <div class="form-group row  ">
                                                        <div class="col-sm-9">
                                                            <input type="hidden" name="id" class="form-control" id="id"
                                                                   value="{{$data->id}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row ">
                                                        <label class="col-sm-3 text-end control-label col-form-label">
                                                            Title</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="title" class="form-control"
                                                                   id="title"
                                                                   value="{{$data->title}}">
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 text-end control-label col-form-label">
                                                            Keywords</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="keywords" class="form-control"
                                                                   value="{{$data->keywords}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Description</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="description" class="form-control"
                                                                   value="{{$data->description}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Company</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="company" class="form-control"
                                                                   value="{{$data->company}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="address" class="form-control"
                                                                   value="{{$data->address}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Phone</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="phone" class="form-control"
                                                                   value="{{$data->phone}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Fax</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="fax" class="form-control"
                                                                   value="{{$data->fax}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 text-end control-label col-form-label">
                                                            Status</label>
                                                        <div class="col-md-9">
                                                            <select name="status"
                                                                    class="select2 form-select shadow-none"
                                                                    style="width: 100%; height:36px;">
                                                                <option
                                                                    selected="selected"> {{$data -> status}} </option>
                                                                <option>True</option>
                                                                <option>False</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    {{--   email--}}
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" name="email" class="form-control"
                                                                   value="{{$data->email}}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-pane  p-20" id="smtp" role="tabpanel">
                                                <div class="p-20">

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Smtp Server</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="smtpserver" class="form-control"
                                                                   value="{{$data->smtpserver}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Smtp Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" name="smptemail" class="form-control"
                                                                   value="{{$data->smtpemail}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Smtp Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" name="smtppassword"
                                                                   class="form-control"
                                                                   value="{{$data->smtppassword}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Smtp Port</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="smtpport" class="form-control"
                                                                   value="{{$data->smtpport}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane p-20" id="social" role="tabpanel">
                                                <div class="p-20">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Facebook</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="facebook" class="form-control"
                                                                   value="{{$data->facebook}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Instagram</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="instagram" class="form-control"
                                                                   value="{{$data->instagram}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Twitter</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="twitter" class="form-control"
                                                                   value="{{$data->twitter}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 text-end control-label col-form-label">
                                                            Youtube</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="youtube" class="form-control"
                                                                   value="{{$data->youtube}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane p-20" id="aboutUs" role="tabpanel">
                                                <div class="p-20">

                                                    <div class="form-group col">
                                                        <label class="row-sm-3 text-end control-label col-form-label">
                                                            About Us</label>
                                                        <div class="row-sm-9">
                                                            <textarea id="aboutus"
                                                                      name="aboutus">{{$data->aboutus}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-pane p-20" id="contactPage" role="tabpanel">

                                                <div class="p-20">
                                                    <div class="form-group col">
                                                        <label class="row-sm-3 text-end control-label col-form-label">
                                                            Contact</label>
                                                        <div class="row-sm-9">
                                                            <textarea id="contact"
                                                                      name="contact">{{$data->contact}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane p-20" id="ref" role="tabpanel">
                                                <div class="p-20">
                                                    <div class="form-group col">
                                                        <label class="row-sm-3 text-end control-label col-form-label">
                                                            References</label>
                                                        <div class="row-sm-9">
                                                        <textarea id="references"
                                                                  name="references">{{$data->references}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <script>
                                        $('#aboutus').summernote({
                                            tabsize: 2,
                                            height: 200
                                        });
                                        $('#references').summernote({
                                            tabsize: 2,
                                            height: 100
                                        });
                                        $('#contact').summernote({
                                            tabsize: 2,
                                            height: 100
                                        });
                                    </script>


                                    <div class="border-top ">
                                        <div class="card-body text-center">
                                            <button type="submit" class="btn btn-primary">Update setting</button>
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

@endsection
