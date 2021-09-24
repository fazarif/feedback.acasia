@extends('layouts.cms-app')
<!-- Site wrapper -->


@section('page-body')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Index Page -  CMS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Notes for Index page contents</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            1)  For Image Sliders, please ensure that the uploaded image is 1920px * 1153px.<br>
                            2)  The order of the slider image will follow from left to right as shown below.
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upload Here</h3>
                        </div>
                        <div class="card-body">
                            <div id="image-area" class="col-md-12 p-0"></div>
                            <form method="post" action="{{ route('upload-indexslider') }}" role="form" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group col-md-4 px-0 pt-2">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="sliderInput" name="sliderInput">
                                            <label class="custom-file-label" for="exampleInputFile" id="sliderLabel">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="uploadButton">Upload</span>
                                            <button type="submit" id="indexSubmit"></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.6/lib/draggable.bundle.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#indexSubmit').hide();

        function callFile(){
            var start = $.ajax({
                            method: 'GET',
                            url: '/json/index',
                            dataType: 'json'
                        }).done(function(data){
                            $.each(data, function(i,file){
                                $.each(file, function(i, eachFile){

                                    var imgSrc = "";

                                    var str="";
                                    str = eachFile.file_name+"";

                                    if (str.length > 29) {
                                        str = str.substr(0,29);
                                        str = str.concat("...");
                                    }

                                    $('#image-area').append("<img draggable=\"true\" class=\"img-fluid col-md-4 p-0 rounded\" src=\"/upload/index/"+eachFile.file_path+"\">")
                                });
                            });
                        });
        }

        callFile();

        $('#uploadButton').click(function() {

            if ($('#sliderInput').get(0).files.length === 0)
            {
                alert("Please attach image.")
            }

            else
            $('#indexSubmit').click();
        });

        $('#sliderInput').change(function(){
            var filename = $(this).val();
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
            $('#sliderLabel').html(filename);
        });
    });
</script>