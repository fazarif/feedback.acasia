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
            <h1>CSI Report: NOC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CSI Report: NOC</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

      <div class="container-fluid">

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-globe-asia" style="color: white;"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All</span>
                <span class="info-box-number">
                  {{count($ratingAll)}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <?php

          $countTotal = count($ratings);
          $countComment = $countFilled = 0;

          foreach($ratingAll as $rating)
          {
            if($rating->user_name != 'Placeholder')
            {
                if($rating->comment)
                {
                  $countComment++;
                }
    
                if($rating->rating_value)
                {
                    $countFilled++;
                }
            }
          }

          ?>

          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-orange elevation-1 disabled"><i class="fas fa-comment-dots" style="color: white;"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">With Comments</span>
                <span class="info-box-number">{{ $countComment }}</span>
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

        <?php

        $count5star = $count4star = $count3star = $count2star = $count1star = 0;

        foreach($ratingAll as $rating)
        {
          if($rating->rating_value == 1)
          {
            $count1star++;
          }

          if($rating->rating_value == 2)
          {
            $count2star++;
          }     

          if($rating->rating_value == 3)
          {
            $count3star++;
          }     

          if($rating->rating_value == 4)
          {
            $count4star++;
          }     

          if($rating->rating_value == 5)
          {
            $count5star++;
          }
        }

        ?>

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-2 col-md-offset-1">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">(5)</span>
                <span class="info-box-number">{{ $count5star }}</span>
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
                <span class="info-box-text">(4)</span>
                <span class="info-box-number">{{ $count4star }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">(3)</span>
                <span class="info-box-number">{{ $count3star }}</span>
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
                <span class="info-box-text">(2)</span>
                <span class="info-box-number">{{ $count2star }}</span>
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
                <span class="info-box-text">(1)</span>
                <span class="info-box-number">{{ $count1star }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Filled In</span>
                <span class="info-box-number">{{ $countFilled }}</span>
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
<!--                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button> -->
<!--                   <div class="btn-group">
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
                  </div> -->
<!--                   <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">

                  <?php

                  if($countTotal == 0)
                  $avgRating = number_format(0,1);

                  else
                  $avgRating = number_format((($count1star*1)+($count2star*2)+($count3star*3)+($count4star*4)+($count5star*5))/$countFilled,1);

                  ?>

                  <div class="col-md-5">
                    <p class="text-center">
                      <strong>NOC Feedback</strong>
                    </p>

                    <div class="error-page" style="width: 180px;">
                      <!-- Sales Chart Canvas -->
                      <!-- <canvas id="salesChart" height="180" style="height: 180px;"></canvas> -->
                      <h2 class="headline text-warning" style="font-size: 150px;"> {{ $avgRating }}</h2>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->

                  <?php

                  $width5star = $width4star = $width3star = $width2star = $width1star = 0;

                  if($countFilled != 0)
                  {
                    $width5star = ($count5star*100)/$countFilled;
                    $width4star = ($count4star*100)/$countFilled;
                    $width3star = ($count3star*100)/$countFilled;
                    $width2star = ($count2star*100)/$countFilled;
                    $width1star = ($count1star*100)/$countFilled;
                  }



                  ?>

                  <div class="col-md-7">
                    <p class="text-center">
                      <strong>Ratings and Reviews</strong>
                    </p>

                    <div class="progress-group">
                      <span class="progress-text">(5 Star Ratings)</span>
                      <span class="float-right"><b>{{ $count5star }}</b> / {{ $countFilled }}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: {{$width5star}}%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      <span class="progress-text">(4 Star Ratings)</span>
                      <span class="float-right"><b>{{ $count4star }}</b> / {{ $countFilled }}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: {{$width4star}}%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">(3 Star Ratings)</span>
                      <span class="float-right"><b>{{ $count3star }}</b> / {{ $countFilled }}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width: {{$width3star}}%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">(2 Star Ratings)</span>
                      <span class="float-right"><b>{{ $count2star }}</b> / {{ $countFilled }}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: {{$width2star}}%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">(1 Star Ratings)</span>
                      <span class="float-right"><b>{{ $count1star }}</b> / {{ $countFilled }}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: {{$width1star}}%"></div>
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
                <h3 class="card-title">CSI Entries Table: NOC</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Rating ID</th>
                    <th>Ticket Type</th>
                    <th>Ticket NUmber</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Circuit ID</th>
                    <th>Circuit Name</th>
                    <th>Rating</th>
                    <th>Comment</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ratings as $rating)

                  <?php
                      // bukan drpd link
                    if($rating->ticket_type == 0){
                      $type = 'SofeaRun';
                    }
                    elseif($rating->ticket_type == 1)
                    {
                      $type = 'NOC';
                    }
                    elseif($rating->ticket_type == 2){
                      $type = 'Sales';
                    }
                    elseif($rating->ticket_type == 3){
                      $type = 'Product';
                    }
                    else{
                      $type = 'General';
                    }
                    
                    $rate = "";
                    
                    if($rating->rating_value == 6)
                    {
                        $rate = "";
                    }
                  ?>

                    <tr>
                      <td>{{$rating->id}}</td>
                      <td>{{$type}}</td>
                      <td>{{$rating->ticket_no}}</td>
                      <td>{{$rating->email}}</td>
                      <td>{{ucwords($rating->user_name)}}</td>
                      <td>{{$rating->circ_name}}</td>
                      <td>{{$rating->circ_id}}</td>
                      <td>{{$rating->rating_value}}</td>
                      <td>{{$rating->comment}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $ratings->links() }}
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
