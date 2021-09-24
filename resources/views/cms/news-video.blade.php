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
            <h1>News Page - News</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">News & Updates</a></li>
              <li class="breadcrumb-item active">Video</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Video Titles</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>                  
              <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>Description</th>
                <th>URL</th>
                <th>Image</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              @foreach($videos as $video)

              @php
                $str = $video->url;
                $nstr = str_replace('https://www.youtube.com/watch?v=','',$str);
              @endphp

              <tr>
                <td>{{ $video->id }}.</td>
                <td>{{ $video->title }}</td>
                <td>{{ $video->description }}</td>
                <td><a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></td>
                <td><a href="https://img.youtube.com/vi/{{ $nstr }}/0.jpg" target="_blank"><i class="fa fa-link"></i>&nbspImage</a></td>
                <td>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="modal-edit" data-edit-title="{{ $video->title }}" data-edit-desc="{{ $video->description }}"><i class="fas fa-align-center"></i></button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <div class="pagination justify-content-center">{{ $videos->links() }}</div>
        <!-- /.card-body -->
      </div>

      <!-- News box -->

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Example</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="blog-post">
              <a href="#"><img class="rounded mb-lg-1 mb-1" src="{{ asset('img/blog/b3.jpg') }}" alt="card image" style="width: 100%;" /></a>
              <h3 class=""><a href="#" id="example-title">Title</a></h3>
              <div class="meta font-lora">
                  <h5 href="#" id="topic" id="example-topic">Topic</h5>
                  <span class="meta-separator"></span>
                  <h5 href="#" id="example-created">Date</h5>
              </div>
              <p id="example-description">Desc</p>
          </div>

          <!-- <img src="{{ asset('img/portfolio/even/1.jpg') }}" style="margin-right: auto; margin-left: auto; width: 100%"> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.6/lib/draggable.bundle.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#indexSubmit').hide();

        $('#uploadButton').click(function() {

            if ($('#sliderInput').get(0).files.length === 0)
            {
                alert("Please attach image.")
            }

            else
            $('#indexSubmit').click();
        });

        $('#newsFormFile').change(function(){
            var filename = $(this).val();
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
            $('#newsFormFileLabel').html(filename);
        });

        $(document).on('show.bs.modal','#modal-example', function (e) {
          var exampleTitle = $(e.relatedTarget).data('example-title');
          var exampleDesc = $(e.relatedTarget).data('example-desc');
          var exampleTopic = $(e.relatedTarget).data('example-topic');
          var exampleDate = $(e.relatedTarget).data('example-created');

          $('#example-title').html(exampleTitle);
          $('#example-description').html(exampleDesc);
          $('#example-topic').html(exampleTopic);
          $('#example-created').html(exampleDate);

        });

        $(document).on('show.bs.modal','#modal-photo', function (e) {
          var exampleImg = $(e.relatedTarget).data('src');

          $('#modal-src').attr('src',exampleImg);

        });   

    });
</script>