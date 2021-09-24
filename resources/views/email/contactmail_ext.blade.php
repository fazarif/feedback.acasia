<!DOCTYPE html>
<html>
<head>

  <link href="{{ asset('main_theme/css/bracket.css') }}" rel="stylesheet">
  <link href="{{ asset('main_theme/lib/morris.js/morris.css') }}" rel="stylesheet">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{ asset('main_theme/lib/morris.js/morris.min.js') }}"></script>
  <script src="{{ asset('main_theme/lib/raphael/raphael.min.js') }}"></script>

  <script src="{{ asset('main_theme/lib/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('main_theme/lib/jquery.flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('main_theme/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script> -->

  <style>

  td {
    text-align: center;
  }
  .title {
    text-align: left;
  }

  body {
    background-color: white;
  }

  </style>

</head>

<body>
<!--  kena fix logic sikit -->

Dear Mr/Mrs {{ $name }}, <br><br>

This email is to inform you that we have received an outreach from you via <a href="http://acasia.net">ACASIA</a> website. </b>
<br>We will be in contact with you regarding your enquiry as soon as possible.
	<br><br>The enquiry details are as below:
  <br><br>Name: {{ $name }}
	<br>Contact Email: {{ $email }}
	<br><br><b>Subject: {{ $subject }}</b>
	<br><br>Message: {{ $messages }}


<br><br>----------------------------------------------------------------------------------------------

<br><br>ACASIA Support Team
<br><a href="http://acasia.net/">https://www.acasia.net</a>

</body>
</html>