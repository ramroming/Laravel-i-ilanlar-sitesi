@extends('layouts.admin')

@section('title','Add A Frequently Asked Question')


@section('javascript')

{{--    ck editor for the text area --}}
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

@endsection

@section('content')


  <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card">
                            <form class="form-horizontal" action="{{route('admin_faq_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <h4 class="card-title">Add Faq</h4>


                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Position</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="position" class="form-control" value="0" id="position">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">
                                            Question</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="question" class="form-control" id="question">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="detail" class="col-sm-3 text-end control-label col-form-label">
                                            Answer</label>
                                        <div class="col-sm-9">
                                            <textarea id="answer" name="answer"></textarea>
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
                                                <option selected="selected">True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border-top ">
                                        <div class="card-body text-center">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
