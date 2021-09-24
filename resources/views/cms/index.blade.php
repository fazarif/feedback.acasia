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
          <div class="col-sm-6">
            <h1>Customer Satisfaction Index Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CSI Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

      <div class="container-fluid">

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-cog" style="color: white;"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All</span>
                <span class="info-box-number">
                  10
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-orange elevation-1 disabled"><i class="fas fa-thumbs-up" style="color: white;"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">With Comments</span>
                <span class="info-box-number">6</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
        </div>
        <!-- /.row -->

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-2 col-md-offset-1">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">(5 STARS)</span>
                <span class="info-box-number">
                  4
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">(4 STARS)</span>
                <span class="info-box-number">2</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">(3 STARS)</span>
                <span class="info-box-number">1</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-star" style="color: white;"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">(2 STARS)</span>
                <span class="info-box-number">2</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">(1 STARS)</span>
                <span class="info-box-number">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Ratings Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <p class="text-center">
                      <strong>Ratings: 1 Mar 2020 - 31 Mar 2020</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-5">
                    <p class="text-center">
                      <strong>Ratings and Reviews</strong>
                    </p>

                    <div class="progress-group">
                      <span class="progress-text">(5)</span>
                      <span class="float-right"><b>6</b>/10</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      <span class="progress-text">(4)</span>
                      <span class="float-right"><b>2</b>/10</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 20%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">(3)</span>
                      <span class="float-right"><b>0</b>/10</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width: 1%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">(2)</span>
                      <span class="float-right"><b>2</b>/10</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 20%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">(1)</span>
                      <span class="float-right"><b>0</b>/10</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 1%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">CSI Entries Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Rating ID</th>
                    <th>Rating</th>
                    <th>Ticket ID</th>
                    <th>Customer ID</th>
                    <th>Date Submitted</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>01</td>
                    <td>5</td>
                    <td>000129</td>
                    <td>1142</td>
                    <td>10th Feb 2020</td>
                  </tr>
                  <tr>
                    <td>02</td>
                    <td>3</td>
                    <td>000113</td>
                    <td>1087</td>
                    <td>13th Feb 2020</td>
                  </tr>
                  <tr>
                    <td>03</td>
                    <td>5</td>
                    <td>000134</td>
                    <td>1168</td>
                    <td>14th Feb 2020</td>
                  </tr>
                  <tr>
                    <td>04</td>
                    <td>5</td>
                    <td>000132</td>
                    <td>1175</td>
                    <td>20th Feb 2020</td>
                  </tr>
                  <tr>
                    <td>01</td>
                    <td>5</td>
                    <td>000141</td>
                    <td>1136</td>
                    <td>21st Feb 2020</td>
                  </tr>
                  <tr>
                    <td>04</td>
                    <td>5</td>
                    <td>000143</td>
                    <td>1138</td>
                    <td>24th Feb 2020</td>
                  </tr>
                  <tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->  
      </div>

    </section>





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

        $.ajax({
          method: 'POST',
          url: '/json/index/update',
          contentType: 'application/json; charset=utf-8',
          data: JSON.stringify(sorted),
          dataType: 'json',
          success: function(data){
              alert('Successfully updated!');
              // var d = JSON.parse(data);
              // console.log(data);

          },
          error: function(xhr, status, err) {
              alert('error');
              console.log(err);
          }
        })

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