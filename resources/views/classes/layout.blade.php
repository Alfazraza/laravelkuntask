<!DOCTYPE html>
<html>
<head>
    <title>Kun Academy</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	 <style>
    	.m_t{
    		margin-top:5em;
    	}
    	.pd-left{
    		padding-left: 0em;
    	}
    	.padding-bt{
    		padding-top: 2em;
            padding-bottom: 2em;
    	}
    </style>
</head>
<body>
  
<div class="container m_t">
    @yield('content')
</div>
   
</body>
</html>