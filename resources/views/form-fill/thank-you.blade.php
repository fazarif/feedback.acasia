@extends('layouts.general')

@section('page-body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>404 Error Page</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">ACASIA.Feedback</a></li>
              <li class="breadcrumb-item active">Thank You Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-success">TQ! </h2>

        <div class="error-content">
          <h3><i class="fas fa-thumbs-up text-success"></i> Thank you for the feedback.</h3>

          <p>Your feedback is greatly appreciated and will be used to enhance our services. To learn more about ACASIA and its products & services, do <a href="https://acasia.net">visit our website</a>.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.6/lib/draggable.bundle.js"></script>