<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('style.css')}}">
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" >
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Menú</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">JECO</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#"></span>Enero</a>
	          </li>
	          <li>
				<a href="#"></span>Febrero</a>
	          </li>
	          <li>
	            <a href="#"></span>Marzo</a>
	          </li>
	          <li>
				<a href="#"></span>Abril</a>
	          </li>
	          <li>
				<a href="#"></span>Mayo</a>
	          </li>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
		<div class="main-content">
            @yield('content')
		  </div>
		</div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>
