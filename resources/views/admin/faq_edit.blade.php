@extends('layouts.admin')
@section('title','Edit A Frequently Asked Question')


@section('javascript')

    {{--    ck editor for the text area --}}
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

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
                            <form class="form-horizontal" action="{{route('admin_faq_update',['id' => $data ->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <h4 class="card-title">Edit faq</h4>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Position</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="position" class="form-control" id="position"
                                                   value="{{$data->position}}">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Question</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="question" class="form-control" id="question"
                                            value="{{$data->question}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="detail" class="col-sm-3 text-end control-label col-form-label">
                                            Answer</label>
                                        <div class="col-sm-9">
                                            <textarea id="answer" name="answer">{!!$data->answer !!}</textarea>
                                            <script>
                                                CKEDITOR.replace( 'answer' );
                                            </script>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Status</label>
                                        <div class="col-md-9">
                                            <select name="status" class="select2 form-select shadow-none"
                                                    style="width: 100%; height:36px;">
                                                <option selected="selected" > {{$data -> status}} </option>
                                                <option>True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-top ">
                                        <div class="card-body text-center">
                                            <button type="submit" class="btn btn-primary">Update faq</button>
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
