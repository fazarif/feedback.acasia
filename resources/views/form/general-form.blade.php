@extends('layouts.cms-app')
<!-- Site wrapper -->


@section('page-body')
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-8">
            <h1>SofeaRun: Customer Satisfaction Index Form</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CSI Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">SofeaRun: CSI Form</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" id="inputName" class="form-control" value="IMYBN-150025 - AAG CONSORTIUM" disabled>
              </div>
              <div class="form-group" style="padding-bottom: 1.5rem;">
                <label for="inputName">Ticket Number</label>
                <input type="text" id="inputName" class="form-control" value=" ACS9000468" disabled>
              </div>
              <div class="form-group"  style="padding-bottom: 0.5rem;">
                <label for="customRange1" style="padding-bottom: 0.5rem;">1) How do you find our service in resolving your problem?</label><br>
                <div style="display: flex; justify-content: space-between;">
                  <div><p>Poor</p></div>
                  <div><p>Acceptable</p></div>
                  <div><p>Meet Expectation</p></div>
                  <div><p>Above Average</p></div>
                  <div><p>Excellent</p></div>
                </div>
                <input type="range" class="custom-range" id="customRange1">
              </div>
              <div class="form-group">
                <label for="inputDescription">2) Please tell us how we can improve and serve you better.</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Submit" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
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