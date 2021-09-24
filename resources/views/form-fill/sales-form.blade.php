@extends('layouts.general')
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
            <h1>Sales: Customer Satisfaction Index Form</h1>
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

      <form method="post" role="form" enctype="multipart/form-data" action="{{ route('sofearun-form-submit') }}" >
        @csrf

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sales: CSI Form</h3>
            </div>

              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Customer Name</label>
                    <input type="text" id="inputName" class="form-control" value="{{ucwords($ratingForm->user_name)}}" name="inputName" readonly="re">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputName">Customer Email</label>
                    <input type="text" id="inputEmail" class="form-control" value="{{$ratingForm->email}}" name="inputEmail" readonly="readonly">
                  </div>
                  <input type="hidden" id="inputUniqueId" class="form-control" value="{{$ratingForm->unique_id}}" name="inputUniqueId">
                </div>
                <div class="form-group"  style="padding-bottom: 0.5rem;">
                  <label for="customRange1" style="padding-bottom: 0.5rem;">1) How do you find our service in resolving your problem?</label><br>
                  <div style="display: flex; justify-content: space-between" class="pb-3 slider-button">
                    <div><button type="button" class="btn btn-block btn-outline-secondary" id="1btn" >Poor</button></div>
                    <div><button type="button" class="btn btn-block btn-outline-secondary" id="2btn" >Below Average</button></div>
                    <div><button type="button" class="btn btn-block btn-success" id="3btn" >Meet Expectation</button></div>
                    <div><button type="button" class="btn btn-block btn-outline-secondary" id="4btn" >Above Average</button></div>
                    <div><button type="button" class="btn btn-block btn-outline-secondary" id="5btn" >Excellent</button></div>
                  </div>
                  <input type="range" class="custom-range" id="sliderInput" name="inputRating">
                </div>
                <div class="form-group">
                  <label for="inputDescription">2) Please tell us how we can improve to serve you better.</label>
                  <textarea id="inputDescription" class="form-control" rows="4" name="inputText"></textarea>
                </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-12">
          <!-- <button type="button" id="sliderBtn" class="btn btn-secondary">Test</button> -->
          <button type="submit" value="Submit" class="btn btn-success float-right">Submit</button>
        </div>
      </div>
      </form>
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

    $('.slider-button').children().click(function(){
      var val = $(this).children().attr('id').substring(0,1);

      resetColor();

      $('#sliderInput').val(val);

      if(val == 1)
      {
        $('#1btn').switchClass('btn-outline-secondary','btn-danger');
        $('#sliderInput').val(0);
      }

      if(val == 2)
      {
        $('#2btn').switchClass('btn-outline-secondary','btn-warning');
        $('#sliderInput').val(23);
      }

      if(val == 3)
      {
        $('#3btn').switchClass('btn-outline-secondary','btn-success');
        $('#sliderInput').val(47);
      }

      if(val == 4)
      {
        $('#4btn').switchClass('btn-outline-secondary','btn-success');
        $('#sliderInput').val(74);
      }

      if(val == 5)
      {
        $('#5btn').switchClass('btn-outline-secondary','btn-success');
        $('#sliderInput').val(99);
      }

    })

    $('#sliderBtn').click(function(){

      var x = $('#sliderInput').val();
      alert(x);
    })

    $('#sliderInput').change(function(){

      var x = $('#sliderInput').val();

      resetColor();

      if(x <= 12)
      {
        $('#1btn').switchClass('btn-outline-secondary','btn-danger');
      }

      if(x > 12 && x <=35)
      {
        $('#2btn').switchClass('btn-outline-secondary','btn-warning');
      }

      if(x > 37 && x <=61)
      {
        $('#3btn').switchClass('btn-outline-secondary','btn-success');
      }

      if(x > 62 && x <=86)
      {
        $('#4btn').switchClass('btn-outline-secondary','btn-success');
      }

      if(x >86 && x <=100)
      {
        $('#5btn').switchClass('btn-outline-secondary','btn-success');
      }

    })

    function resetColor()
    {
      $('#3btn, #4btn, #5btn').each(function(){
        $(this).switchClass('btn-success','btn-outline-secondary');
      });

      $('#1btn').switchClass('btn-danger','btn-outline-secondary');
      $('#2btn').switchClass('btn-warning','btn-outline-secondary');
    }

  });
</script>