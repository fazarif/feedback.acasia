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

	<?php

	if($ticketType == 0)
	{
		$ticketId = "SR000".$ticketId;
	}

	?>

	Dear {{ ucwords($name) ?? '(Name)'}}, <br><br>

	{{ $messages ?? '' }} <br><br>

	We hope you’re happy with the solution we provided.<br><br>
	To improve the quality of our ticketing support, we’d really appreciate if you could rate our service by clicking on the feedback form.
	<br><br>

	Your details are as below for confirmation.
	<br><br>-----------------------------------------------
		<br><br>Name: {{ ucwords($name) ?? '(Name)'}}
		<br>Contact Email: {{ $email ?? '(Email)'}}

	<br><br>-----------------------------------------------

	<br><br>Please access the <b>feedback form</b> via this link > <a href="http://feedback.acasia.net/form/{{$unique_id}}"> ACASIA Feedback</a>

	<br><br>ACASIA Support Team
	<br><a href="http://acasia.net/" >https://www.acasia.net</a>

</body>
</html>