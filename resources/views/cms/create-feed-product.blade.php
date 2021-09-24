@extends('layouts.cms-app')
<!-- Site wrapper -->

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection


@section('page-body')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Feedback: Product</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- News box -->
      <div class="card">
        <div class="card-header">
          <h3 class="text-primary"><i class="fas fa-plus-circle"></i> Create Feedback Form</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12" id="post-news">
                  <!-- APPEND HERE NEWS POST -->
                  <!-- <h3 class="text-primary"><i class="fas fa-plus-circle"></i> Add Feedback Form</h3> -->
                  <!-- <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p> -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Feedback Form: Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" role="form" enctype="multipart/form-data" action="{{ route('send-multiple') }}" >
                    @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="inputTitle">Subject</label>
                            <input type="text" class="form-control" id="inputSubject" placeholder="Enter email subject" name="formSubject" required>
                          </div>
<!--                      <div class="form-group col-md-6">
                            <label for="inputCustName">Customer Name</label>
                            <input type="text" class="form-control" id="inputCustName" placeholder="Enter customer name" name="formCustName" required>
                          </div>
 -->                        </div>
                        <div class="form-group">
                          <label for="inputDesc">Remark</label>
                          <input type="text" class="form-control" id="inputRemark" placeholder="Enter email remark" name="formRemark" required>
                        </div>

                        <div class="form-group" id="linkgroup">
                          <!-- <input type="hidden" class="form-control" id="inputLink" name="formLink[]" required>  -->
                        </div>

                        <input type="hidden" class="form-control" id="inputType" name="formType" value="3" required>
                        <div class="form-group row">
                          <div class="col-md-12">   
                            <label for="inputLink">To... </label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Enter receiver email" required multiple pattern="^([\w+-.%]+@[\w-.]+\.[A-Za-z]{2,4},*[\W]*)+$">
                            <div class="form-group" id="emailGroup">
                              <!-- <input type="hidden" class="form-control" id="inputEmailTrue" name="formEmail[]" multiple> -->
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row" id="namegroup">
                        </div>
                        <div class="form-group">
                            <label>Generated Links</label>
                            <select multiple="" class="custom-select" disabled id="generateBox" >
                              <!-- <option>option 1</option> -->
                            </select>
                        </div>
                        <button type="button" id="generateBtn" class="btn btn-secondary">Generate</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      <!-- /.card-body -->

                    </form>
                  </div>
                  <!-- /.card -->

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.6/lib/draggable.bundle.js"></script>

<script type="text/javascript">

  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#indexSubmit').hide();


    $('#newsFormFile').change(function(){
        var filename = $(this).val();
        var lastIndex = filename.lastIndexOf("\\");
        if (lastIndex >= 0) {
            filename = filename.substring(lastIndex + 1);
        }
        $('#newsFormFileLabel').html(filename);
    });

    $('#generateBtn').click(function(){

      $('#generateBox').html('');
      $('#namegroup').html('');

      if($('#inputEmail').val().length === 0 )
      {
        alert('Please fill in email input with atleast one(1) email.');
      }

      else
      {
        var str = $('#inputEmail').val();
        var arr = str.split(",").map(function(item) {
          var x = item.trim();
          if(emailIsValid(x)){
            return x;
          }
          else
          {
            alert('Not a valid email format');
          }
        });

        // generateLink(arr); 
        if(arr[0] != undefined && arr.length > 0){
          arr.forEach(generateBox);
          arr.forEach(generateLink);
        }
      }
    });

    function generateBox(item, index)
    {

      $('#namegroup').append('<div class="form-group col-md-4"><label for="inputCustName">Customer Name</label><input type="text" class="form-control" id="inputCustName'+(index+1)+'" placeholder="Enter customer name" name="formCustName'+(index+1)+'" required></div>');
    }

    function generateLink(item, index){

      var ticketId = $('#inputTicket').val();

      var d = new Date();
      var todayDate= d.getDate()+""+(d.getMonth()+1)+""+d.getFullYear();
      var str = item+todayDate;
      // item refers to email

      $.ajax({
        method: 'POST',
        url: '/json/link/create',
        contentType: 'application/json; charset=utf-8',
        data: JSON.stringify({ hash : str, email : item }),
        dataType: 'json',
        success: function(data, item){
            appendLink(data)
            // var d = JSON.parse(data);
        },
        error: function(xhr, status, err) {
            alert('error');
            console.log(err);
        }
      })
    };

    function appendLink(data)
    {
      // var email = $('#inputEmail').val();

      // $('#inputLink').val(data.link);

      $('#linkgroup').append('<input type="hidden" class="form-control" name="formLink[]" value='+data.link+' required>');
      $('#emailGroup').append('<input type="hidden" class="form-control" name="formEmail[]" value='+data.email+' required>');

      $('#generateBox').append('<option>'+data.email+' : http://localhost:8000/form/'+data.link+'</option>');
    }

    function emailIsValid(email){
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
    }

    function fillIn(data){
      // console.log(data);

      if (data.duplicate) {
        alert('Feedback form already created for this ticket number.')
      }

      else if(data.email == null)
      {
        alert('Ticket does not exist');
        $('#inputEmail').val('');
      }

      else
      $('#inputEmail').val(data.email)
    }

  });

</script>