<!doctype html>
<html lang="en">
  <head>
  	<title>JECO S.A.S</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @laravelPWA
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
        <form action="{{route('importar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <br>
            <input type="submit" value="IMPORTAR">
        </form>
<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportarMesesModal">Exportar meses</button>

<!-- Modal -->
<div class="modal fade" id="exportarMesesModal" tabindex="-1" role="dialog" aria-labelledby="exportarMesesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title label-negro text-dark" id="exportarMesesModalLabel">Exportar meses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('exportar',['mes'=>$mes,'año'=>$año])}}" method="GET">
          <div class="form-group">
            <label class="label-negro text-dark">Selecciona los meses:</label>
            <div class="form-check">
              <input type="checkbox" id="enero" name="meses[]" value="enero">
              <label for="enero" class="form-check-label label-negro text-dark">Enero</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="febrero" name="meses[]" value="febrero">
              <label for="febrero" class="form-check-label label-negro text-dark">Febrero</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="marzo" name="meses[]" value="marzo">
              <label for="marzo" class="form-check-label label-negro text-dark">Marzo</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="abril" name="meses[]" value="abril">
              <label for="abril" class="form-check-label label-negro text-dark">Abril</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="mayo" name="meses[]" value="mayo">
              <label for="mayo" class="form-check-label label-negro text-dark">Mayo</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="junio" name="meses[]" value="junio">
              <label for="junio" class="form-check-label label-negro text-dark">Junio</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="julio" name="meses[]" value="julio">
              <label for="julio" class="form-check-label label-negro text-dark">Julio</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="agosto" name="meses[]" value="agosto">
              <label for="agosto" class="form-check-label label-negro text-dark">Agosto</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="septiembre" name="meses[]" value="septiembre">
              <label for="septiembre" class="form-check-label label-negro text-dark">Septiembre</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="octubre" name="meses[]" value="octubre">
              <label for="octubre" class="form-check-label label-negro text-dark">Octubre</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="noviembre" name="meses[]" value="noviembre">
              <label for="noviembre" class="form-check-label label-negro text-dark">Noviembre</label>
            </div>
            <div class="form-check">
              <input type="checkbox" id="diciembre" name="meses[]" value="diciembre">
              <label for="diciembre" class="form-check-label label-negro text-dark">Diciembre</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit"  class="btn btn-primary">Exportar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">JECO</a></h1>
	        <ul class="list-unstyled components mb-5">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ver_año',['mes'=>1,'año'=>2024])}}">2024</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('ver_año',['mes'=>1,'año'=>2025])}}">2025</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('ver_año',['mes'=>1,'año'=>2026])}}">2026</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('ver_año',['mes'=>1,'año'=>2027])}}">2027</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('ver_año',['mes'=>1,'año'=>2028])}}">2028</a>
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

