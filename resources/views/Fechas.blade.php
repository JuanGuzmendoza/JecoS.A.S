@extends('layouts.menu')

@section('content')
    <!DOCTYPE html>
    <html lang="es">
    @vite('resources/css/app.css')

    <head>
        <meta charset="UTF-8">
        <title>Fechas</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            $(document).ready(function() {
                $('.dropdown-toggle').dropdown();
            });
        </script>
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!--composer require phpoffice/phpspreadsheet Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
        <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    </head>

    <body>


        <script>
            // Ejecuta la función con los valores iniciales cuando la página carga
            document.addEventListener("DOMContentLoaded", function() {
                var progressCircles = document.querySelectorAll('.progress-circle');

                progressCircles.forEach(function(circle) {
                    var input = circle.querySelector('input[type="number"]');
                    var initialValue = input.value;
                    updateProgress(initialValue, circle.id);
                });
            });
        </script>

        <!-- Formulario flotante -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar fila</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Formulario para agregar fila -->
                        <form action="{{ route('guardar_registro', ['mes' => $mes, 'año' => $año]) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="cliente">Cliente</label>
                                <input type="text" class="form-control" name="cliente" id="cliente"
                                    placeholder="Ingrese cliente">
                            </div>
                            <div class="modal-footer">
                                <button type="sumit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <style>
            .modal-header {
                background-color: #6c5ce7;
                /* purple color */
                padding: 0.5rem;
                /* reduce padding to make the header thinner */
                border-bottom: 1px solid #6c5ce7;
                /* thin purple border */
            }

            .modal-xl {
                max-width: 90%;
                /* or any other value you want */
            }

            #portafolio {
                width: 50%;
                /* adjust the width to your liking */
                height: 80vh;
                /* adjust the height to your liking */
                margin: 10vh auto;
                /* add some margin to center the modal */
            }
        </style>

        <div class="modal fade" id="portafolio" tabindex="-1" role="dialog" aria-labelledby="portafolioLabel"
            aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-xl" role="document" data-backdrop="static">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-color: #6c5ce7; padding: 0.5rem; border-bottom: 1px solid #6c5ce7;">
                        <h5 class="modal-title" id="portafolioLabel">PORTAFOLIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-lg-8 grid-margin stretch-card">
                                        <h4 class="card-title">PORTAFOLIO</h4>
                                        <p class="card-description">
                                            Productos
                                        </p>

                                        <div class="container-fluid">
                                            <div class="table-responsive d-none d-md-table">
                                                <table id="Portafolio">
                                                    <thead>
                                                        <tr>
                                                            <!-- COLUMNAS -->
                                                            <th class="tam" scope="col">ID</th>
                                                            <th class="tam" scope="col">CODIGO</th>
                                                            <th class="tam" scope="col">NOMBRE</th>
                                                            <th class="tam" scope="col">PRECIO UNITARIO</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $portafolio_indice = 0;
                                                        @endphp


                                                        <!-- FILAS -->
                                                        <!--serparar logica del Js por lo de la venta de guardar-->
                                                        <button type="submit"
                                                            onclick="location.href='{{ route('Portafolio.create') }}'"
                                                            class="btn btn-primary">Agregar Producto</button>
                                                        <form action="{{ route('Portafolio.store') }}" method="GET">
                                                            <button type="submit"
                                                                class="btn btn-primary">Actualizar</button>
                                                            @csrf
                                                            @foreach ($Portafolio as $p)
                                                                <tr data-id="{{ $p->id }}">
                                                                    <input type="hidden"
                                                                        name="Portafolio[{{ $portafolio_indice }}][0]"
                                                                        value="{{ $p->id }}">
                                                                    <td>{{ $p->id }}</td>
                                                                    <td><input
                                                                            name="Portafolio[{{ $portafolio_indice }}][1]"
                                                                            type="text" class="rounded border"
                                                                            value="{{ $p->codigo }}">
                                                                    </td>
                                                                    <td><input
                                                                            name="Portafolio[{{ $portafolio_indice }}][2]"
                                                                            type="text" class="rounded border"
                                                                            value="{{ $p->nombre }}">
                                                                    </td>
                                                                    <td><input
                                                                            name="Portafolio[{{ $portafolio_indice }}][3]"
                                                                            type="text" class="rounded border"
                                                                            value="{{ $p->cost_unit }}">
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $portafolio_indice += 1;

                                                                @endphp
                                                            @endforeach
                                                        </form>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>

        <script>
            $('#portafolio').on('hidden.bs.modal', function() {
                console.log('Modal closed');
                // Add any additional code here to perform actions when the modal is closed
            });
        </script>
        <!-- /.modal -->
        <div id="option-bar" class="navbar fixed-top navbar-expand-lg navbar-light bg-light ml-auto">
            <button type="button" class="btn btn-light btn-icon" data-toggle="modal" data-target="#portafolio"
                title="Agregar nueva fila">
                <i class="fa-solid fa-briefcase fa-2x"></i>
                <p>Portafolio</p>
            </button>
            <button type="button" class="btn btn-light btn-icon" data-toggle="modal" data-target="#exampleModal"
                title="Agregar nueva fila">
                <i class="fa-solid fa-square-plus fa-2x"></i>
                <p>Agregar fila</p>
            </button>
            <button type="button" class="btn btn-light btn-icon" title="Add Column" data-toggle="modal"
                data-target="#importModal">
                <i class="fa-solid fa-file-import fa-2x"></i>
                <p>Importar excel</p>
            </button>
            <button type="button" class="btn btn-light btn-icon" title="Add Column" data-toggle="modal"
                data-target="#exportarMesesModal">
                <i class="fa-solid fa-file-export fa-2x"></i>
                <p>Exportar excel</p>
            </button>
            <div class="nav justify-content-center ml-auto">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                {{-- Boton de Logout --}}
                <a class="logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                    <div class="sign"><svg viewBox="0 0 512 512">
                            <path
                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                            </path>
                        </svg></div>
                    <div class="text"> Logout</div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>


            <div class="modal fade" id="exportarMesesModal" tabindex="-1" role="dialog"
                aria-labelledby="exportarMesesModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title label-negro text-dark" id="exportarMesesModalLabel">Exportar meses de
                                {{ $año }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('exportar', ['mes' => $mes, 'año' => $año]) }}" method="GET">
                                <div class="form-group">
                                    <label class="label-negro text-dark">Selecciona los meses:</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="enero" name="meses[]" value="enero">
                                        <label for="enero" class="form-check-label label-negro text-dark">Enero</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="febrero" name="meses[]" value="febrero">
                                        <label for="febrero"
                                            class="form-check-label label-negro text-dark">Febrero</label>
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
                                        <label for="agosto"
                                            class="form-check-label label-negro text-dark">Agosto</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="septiembre" name="meses[]" value="septiembre">
                                        <label for="septiembre"
                                            class="form-check-label label-negro text-dark">Septiembre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="octubre" name="meses[]" value="octubre">
                                        <label for="octubre"
                                            class="form-check-label label-negro text-dark">Octubre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="noviembre" name="meses[]" value="noviembre">
                                        <label for="noviembre"
                                            class="form-check-label label-negro text-dark">Noviembre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="diciembre" name="meses[]" value="diciembre">
                                        <label for="diciembre"
                                            class="form-check-label label-negro text-dark">Diciembre</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Exportar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- MODAL IMPORT  -->
            <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Importar excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('importar') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file">
                                <br>


                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="IMPORTAR">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @php
            $meses = [
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre',
            ];
            $FechasCount = count($Fechas);
            $Faltantes = $FechasCount - $Entregados;
        @endphp
        <h3 class="text-center font-extrabold text-3xl mb-5">
            <span class="text-gray-900">Fechas</span>
            {{ $meses[$mes - 1] }}
        </h3>
        <style>
            h3 {
                font-weight: 700;
            }
        </style>
        <div class="row mb-4">

            {{-- Ficha 1: Ventas Totales --}}
            <div class="col-md-4 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Pedidos Completados</h5>
                                    <i class="fas fa-chart-line fa-2x"></i>
                                </div>
                                <p class="display-4">{{ $Entregados }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Pedidos Pendientes</h5>
                                    <i class="fas fa-clock fa-2x"></i>
                                </div>
                                <p class="display-4">{{ $Faltantes }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Ficha 2: Pedidos Pendientes --}}


            <div class="col-md-4 mb-3">
                <div class="card bg-warning text-dark h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Pedidos Del Mes</h5>
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                        <p class="display-4">{{ $FechasCount }}</p>
                        <p class="card-text">


                        </p>
                    </div>

                </div>
            </div>

            {{-- Ficha 3: Ingresos Mensuales --}}
            <div class="col-md-4 mb-3">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Ingreso Del Mes</h5>
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                        <p class="display-4">${{ number_format($total, 0, '.', '.') }}</p>
                        {{-- <p class="card-text">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 8.3%
                                    </span>
                                    vs mes anterior
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-white-50">
                                Últimos 30 días
                            </div> --}}
                    </div>
                </div>
            </div>
            <div id="mydatatable-container">


                <div class="g_botones">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample">
                        Filtrar <i class="fa fa-chevron-down fa-xs" id="collapse-icon"></i>

                    </button>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body border-0">
                            <div class="group ">
                                <input required="" type="text" class="input-per" id="myInput"
                                    onkeyup="myFunction()">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-per">Nombre</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive d-none d-md-table">
                        <table id="myTable" class="table table-borderles table-hover custom-table table-sm w-100">
                            <thead>
                                <tr>
                                    <!-- COLUMNAS -->
                                    <th class="tam" scope="col"></th>
                                    <th class="tam" scope="col">estado</th>
                                    <th class="tam" scope="col">ID</th>
                                    <th class="tam" scope="col">Cliente</th>
                                    <th class="tam" scope="col">Fecha entrega</th>
                                    <th class="tam" scope="col"></th>
                                    <th class="tam" scope="col">OC</th>
                                    <th class="tam" scope="col">Codigo</th>
                                    <th class="tam" scope="col">NOMBRE</th>
                                    <th class="tam" scope="col">CANT</th>
                                    <th class="tam" scope="col">COSTO UNIT</th>
                                    <th class="tam" scope="col">Cost total</th>
                                    <th class="tam" scope="col">C.TELA</th>
                                    <th class="tam" scope="col">COSTURA</th>
                                    <th class="tam" scope="col">C.MAD</th>
                                    <th class="tam" scope="col">ARM</th>
                                    <th class="tam" scope="col">EMPARR</th>
                                    <th class="tam" scope="col">C.ESP</th>
                                    <th class="tam" scope="col">P.BLAN</th>
                                    <th class="tam" scope="col">TAPIC</th>
                                    <th class="tam" scope="col">ENSAM</th>
                                    <th class="tam" scope="col">DESPA</th>
                                    <th class="tam" scope="col">NIEVES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                    $indice_productos = 1;
                                @endphp

                                <!-- FILAS -->
                                <form action="{{ route('actualizar_registros', ['mes' => $mes, 'año' => $año]) }}"
                                    method="GET">
                                    <button type="submit" id="refresh"><i
                                            class="fa-solid fa-arrows-rotate"></i>Actualizar<span
                                            id="changed-rows"></span>

                                        @csrf
                                        @foreach ($Fechas as $f)
                                            <tr data-id="{{ $f->id }}" onclick="">

                                                <td><button type="sumit" class="btn btn-success"></button></td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input checkbox-lg checkbox-xxxl"
                                                                style="accent-color: #34C759;"
                                                                name="Fechas[{{ $i }}][19]"
                                                                @if ($f->estado == 1) checked @endif
                                                                value="1">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="Fechas[{{ $i }}][0]"
                                                        value="{{ $f->id }}">
                                                    {{ $indice_productos }}
                                                </td>@php
                                                    $indice_productos++;

                                                @endphp

                                                <td>{{ $f->cliente }}</td>

                                                <td><input name="Fechas[{{ $i }}][1]" type="date"
                                                        class="rounded border"value="{{ $f->entrega }}"></td>
                                                <td>
                                                    <!-- Button to open the modal -->
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#productos-{{ $i }}">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMZJREFUSEvllUEKwkAMRd8/hQtBEBd6Gy/jxhvohTyIG3ei4MJbRFqoWNuZBOugaLfzk5f8ZDqi8KfC+ckCzGwJbIBFopADsJK0SxXqAa7AyOnyKGn2KsCqQEm9hZhZ9ryOzVXnJfDOW4CA39F9aM3l3oGZXYBxNEt0Lo8A188I/Nm2HwREbIhomtXuWBQJjmiSAO9SNck93fcBIrZUmj9Y09Tw3mHRGZhEEzm6k6Rp3990C8wHQvbAunnlPvsmD+ykDi/ewQ3bvokZuRyp8QAAAABJRU5ErkJggg=="
                                                            width="16" height="16" />
                                                        <span class="caret"></span>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="productos-{{ $i }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true" data-backdrop="static">
                                                        <div class="modal-dialog modal-lg" role="document"
                                                            data-backdrop="static">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Portafolio
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table"
                                                                        style="border-collapse: collapse;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nombre</th>
                                                                                <th>Código</th>
                                                                                <th>Costo Unitario</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($Portafolio as $p)
                                                                                <tr>
                                                                                    <td>
                                                                                        <a href="javascript:void(0)"
                                                                                            data-product-id="{{ $i }}"
                                                                                            data-product-codigo="{{ $p->codigo }}"
                                                                                            data-product-nombre="{{ $p->nombre }}"
                                                                                            data-product-cost-unit="{{ $p->cost_unit }}">
                                                                                            {{ $p->nombre }}
                                                                                        </a>
                                                                                    </td>
                                                                                    <td>{{ $p->codigo }}</td>
                                                                                    <td>${{ number_format($p->cost_unit, 0, '.', '.') }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        // document.querySelectorAll('[id^="productos-"] table tbody tr td a').forEach(function(element) {
                                                        //     element.addEventListener('click', function() {
                                                        //         var modal = element.closest('.modal');
                                                        //         modal.classList.remove('show');
                                                        //         modal.setAttribute('aria-hidden', 'true');
                                                        //         var modalInstance = bootstrap.Modal.getInstance(modal);
                                                        //         modalInstance.hide();
                                                        //         modalInstance.dispose(); // Agregamos esta línea para cerrar el modal completamente
                                                        //     });
                                                        // });
                                                    </script>

                                                </td>
                                                <!-- OC -->
                                                <td><input type="text" name="Fechas[{{ $i }}][2]"
                                                        value="{{ $f->oc }}"></td>
                                                <!-- CODIGO -->
                                                <td><input type="text" name="Fechas[{{ $i }}][3]"
                                                        value="{{ $f->codigo }}"></td>
                                                <!-- NOMBRE -->
                                                <td><input type="text" name="Fechas[{{ $i }}][4]"
                                                        value="{{ $f->nombre }}"></td>

                                                <!-- CANTIDAD -->
                                                <td><input class="rounded border"type="number "
                                                        name="Fechas[{{ $i }}][6]"
                                                        style="width: 60px ;"value="{{ $f->cant }}"></td>

                                                <!-- COSTO UNITARIO -->
                                                <td><input name="Fechas[{{ $i }}][7]" type="text"
                                                        class="rounded border" placeholder="0"
                                                        value="{{ number_format($f->cost_unit, 0, ',', '.') }}"
                                                        pattern="[0-9.,]+"></td>

                                                <!-- COSTO TOTAL -->
                                                <td><a oninput="handleInput(event)"
                                                        placeholder="0">${{ number_format($f->cost_total, 0, ',', '.') }}</a>
                                                </td>

                                                <!-- BARRAS DE PROGRESO -->
                                                <td>
                                                    <div class="progress-circle" id="1{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][8]" type="number"
                                                            min="0" max="100" value="{{ $f->c_tela }}"
                                                            oninput="updateProgress(this.value, '1{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="2{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][9]"type="number"
                                                            min="0" max="100" value="{{ $f->cost }}"
                                                            oninput="updateProgress(this.value, '2{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="3{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][10]" type="number"
                                                            min="0" max="100" value="{{ $f->c_mad }}"
                                                            oninput="updateProgress(this.value, '3{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="4{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][11]" type="number"
                                                            min="0" max="100" value="{{ $f->arm }}"
                                                            oninput="updateProgress(this.value, '4{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="5{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][12]" type="number"
                                                            min="0" max="100" value="{{ $f->emparr }}"
                                                            oninput="updateProgress(this.value, '5{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="6{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][13]" type="number"
                                                            min="0" max="100" value="{{ $f->c_esp }}"
                                                            oninput="updateProgress(this.value, '6{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="7{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][14]" type="number"
                                                            min="0" max="100" value="{{ $f->p_blan }}"
                                                            oninput="updateProgress(this.value, '7{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="8{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][15]"type="number"
                                                            min="0" max="100" value="{{ $f->tapic }}"
                                                            oninput="updateProgress(this.value, '8{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="9{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][16]" type="number"
                                                            min="0" max="100" value="{{ $f->ensam }}"
                                                            oninput="updateProgress(this.value, '9{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="10{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][17]"type="number"
                                                            min="0" max="100" value="{{ $f->despa }}"
                                                            oninput="updateProgress(this.value, '10{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-circle" id="-11{{ $f->id }}">
                                                        <input name="Fechas[{{ $i }}][18]"type="number"
                                                            min="0" max="100" value="{{ $f->nieves }}"
                                                            oninput="updateProgress(this.value, '-11{{ $f->id }}')">
                                                    </div>
                                                </td>
                                                <!-- Agrega los demás campos con el mismo formato -->
                                            </tr>
                                            @php
                                                $i += 1;

                                            @endphp
                                        @endforeach
                                </form>

                            </tbody>
                        </table>

                    </div>
                    <div class="d-md-none">
                        <div class="accordion" id="accordionExample">
                            @foreach ($Fechas as $f)
                                <!-- Primer Producto -->
                                <div class="card border-0">
                                    <div class="card-header border" style="border-radius:30px "
                                        id="heading{{ $f->id }}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapse{{ $f->id }}" aria-expanded="true"
                                                aria-controls="collapse{{ $f->id }}">
                                                {{ $f->cliente }}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $f->id }}" class="collapse"
                                        aria-labelledby="heading{{ $f->id }}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><strong>Cliente:</strong> {{ $f->cliente }}</p>
                                            <p><strong>Fecha entrega:</strong> <input type="date"
                                                    value="{{ $f->entrega }}"></p>
                                            <p><strong>OC:</strong> 90252212</p>
                                            <p><strong>Código:</strong>
                                                <input list="codigos" id="codigos">
                                                <datalist id="codigos">
                                                    <option value="7033248">
                                                    <option value="7033248">
                                                    <option value="7033248">
                                                </datalist>
                                            </p>
                                            <p id="nombre-collapse"><strong>Nombre:</strong> {{ $f->nombre }}</p>
                                            <p><strong>Cantidad:</strong> <input type="number" style="width: 60px;"></p>
                                            <p><strong>Costo Unitario:</strong> <input type="text" class="money-input"
                                                    oninput="handleInput(event)" placeholder="0"></p>
                                            <p><strong>Costo Total:</strong> <input type="text" class="money-input"
                                                    oninput="handleInput(event)" placeholder="0" disabled></p>

                                            <!-- Barras de Progreso -->
                                            <p><strong>C. Tela:</strong>
                                            <div class="progress-circle" id="progressCircle1_{{ $f->id }}">
                                                <input type="number" min="0" max="100" value="0"
                                                    oninput="updateProgress(this.value, 'progressCircle1_{{ $f->id }}')">
                                            </div>
                                            </p>
                                            <p><strong>Costura:</strong>
                                            <div class="progress-circle" id="progressCircle2_{{ $f->id }}">
                                                <input type="number" min="0" max="100" value="0"
                                                    oninput="updateProgress(this.value, 'progressCircle2_{{ $f->id }}')">
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <style>
            #mydatatable tfoot input {
                width: 100% !important;
            }

            .changed {
                background-color: #FFC67D;
                /* naranja pasteloso */
                border-color: #FFC67D;
                /* mismo color para el borde */
                border-width: 1px;
                /* ancho del borde */
                border-style: solid;
                /* estilo del borde */
            }

            #mydatatable tfoot {
                display: table-header-group !important;
            }
        </style>

        <script type="text/javascript"></script>
    </body>
    <nav class="navbar fixed-bottom ">

        <ul class="nav nav-tabs justify-content-center">
            <li>
                <!-- Default dropup button -->
                <div class="btn-group dropup">
                    <button id="drop" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        Años
                    </button>
                    <div class="dropdown-menu">
                        <!-- Dropdown menu links -->
                        <ul class="list-unstyled components mb-5">
                            <li class="nav-item">
                                <a class="nav-link active"
                                    href="{{ route('ver_año', ['mes' => 1, 'año' => 2024]) }}">2024</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ver_año', ['mes' => 1, 'año' => 2025]) }}">2025</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ver_año', ['mes' => 1, 'año' => 2026]) }}">2026</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ver_año', ['mes' => 1, 'año' => 2027]) }}">2027</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ver_año', ['mes' => 1, 'año' => 2028]) }}">2028</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab1" href="{{ route('ver_año', ['mes' => 1, 'año' => $año]) }}">Enero</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2"
                    href="{{ route('ver_año', ['mes' => 2, 'año' => $año]) }}">Febrero</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab3" href="{{ route('ver_año', ['mes' => 3, 'año' => $año]) }}">Marzo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab4" href="{{ route('ver_año', ['mes' => 4, 'año' => $año]) }}">Abril</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab5" href="{{ route('ver_año', ['mes' => 5, 'año' => $año]) }}">Mayo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab6" href="{{ route('ver_año', ['mes' => 6, 'año' => $año]) }}">junio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab7" href="{{ route('ver_año', ['mes' => 7, 'año' => $año]) }}">julio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab8"
                    href="{{ route('ver_año', ['mes' => 8, 'año' => $año]) }}">agosto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab9"
                    href="{{ route('ver_año', ['mes' => 9, 'año' => $año]) }}">septiembre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab10"
                    href="{{ route('ver_año', ['mes' => 10, 'año' => $año]) }}">octube</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab11"
                    href="{{ route('ver_año', ['mes' => 11, 'año' => $año]) }}">noviembre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab12"
                    href="{{ route('ver_año', ['mes' => 12, 'año' => $año]) }}">diciembre</a>
            </li>

        </ul>
    </nav>

    </html>
@endsection
