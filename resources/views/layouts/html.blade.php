<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>12:30 Band</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//cdn.datatables.net/r/bs-3.3.5/dt-1.10.9/datatables.min.css">
    <link href="/assets/css/lavish-bootstrap.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
@if(Auth::check())
    @include('shared/navbar')
@endif
<div class="container">
    @yield('content')
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/r/bs-3.3.5/dt-1.10.9/datatables.min.js"></script>
<script type="text/javascript">
    $('body .dropdown-toggle').dropdown();
    $('#datepicker').datepicker();
</script>
@stack('scripts')
</body>
</html>
