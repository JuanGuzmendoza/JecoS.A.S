@extends('layouts.menu')

@section('content')
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Hello DefaultController!</title>

        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
        <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
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
                            <!-- Agrega más campos para cada columna de la tabla -->
                            <a href="{{ route('Fechas.show', $mes) }}" class="btn btn-secondary">Regresar</a>
                            <button type="sumit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="mydatatable-container">
            <h2 class="mb-5">Programacion de Fechas @switch($mes)
                    @case(1)
                        Enero
                    @break

                    @case(2)
                        Febrero
                    @break

                    @case(3)
                        marzo
                    @break

                    @case(4)
                        Abril
                    @break

                    @case(5)
                        mayo
                    @break

                    @case(6)
                        Junio
                    @break

                    @case(7)
                        Julio
                    @break

                    @case(8)
                        Agosto
                    @break

                    @case(9)
                        Septiembre
                    @break

                    @case(10)
                        Octubre
                    @break

                    @case(11)
                        Noviembre
                    @break

                    @case(12)
                        Septiembre
                    @break

                    @default
                @endswitch
            </h2>

            <div class="g_botones">
                <!-- Botón que abre el formulario flotante -->
                <button type="button" class="btn btn-primary rounded" data-toggle="modal"
                    data-target="#exampleModal">Agregar fila</button>

                <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample">
                    Filtrar <i class="fa fa-chevron-down fa-xs" id="collapse-icon"></i>

                </button>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body border-0">
                        <div class="group ">
                            <input required="" type="text" class="input-per" id="myInput" onkeyup="myFunction()">
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
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha entrega</th>
                                <th scope="col">OC</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">CANT</th>
                                <th scope="col">COSTO UNIT</th>
                                <th scope="col">Cost total</th>
                                <th scope="col">C.TELA</th>
                                <th scope="col">COSTURA</th>
                                <th scope="col">C.MAD</th>
                                <th scope="col">ARM</th>
                                <th scope="col">EMPARR</th>
                                <th scope="col">C.ESP</th>
                                <th scope="col">P.BLAN</th>
                                <th scope="col">TAPIC</th>
                                <th scope="col">ENSAM</th>
                                <th scope="col">DESPA</th>
                                <th scope="col">NIEVES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- FILAS -->
                            @foreach ($Fechas as $f)
                                <form action="{{ url('Fechas/' . $f->id) }}" method="post">
                                    @method('PUT')
                                    @csrf

                                    <tr data-id="{{ $f->id }}" onclick="selectRow(this)">
                                        <td><button type="sumit" class="btn btn-success"></button></td>
                                        <td>{{ $f->id }}</td>
                                        <td>{{ $f->cliente }}</td>

                                        <!-- FECHA ENTREGA -->
                                        <td><input type="date" class="rounded border " value="{{ $f->entrega }}"></td>

                                        <!-- OC -->
                                        <td>{{ $f->oc }}</td>

                                        <!-- CODIGO -->
                                        <td>{{ $f->codigo }}</td>

                                        <!-- NOMBRE -->
                                        <td style="font-size: 15px;">{{ $f->nombre }}</td>

                                        <!-- CANTIDAD -->
                                        <td><input class="rounded border"type="number "name="cant" style="width: 60px ;"value="{{$f->cant}}"></td>

                                        <!-- COSTO UNITARIO -->
                                        <td><input name="cost_unit" type="number" class="rounded border"
                                                placeholder="0"value="{{ $f->cost_unit }}"></td>

                                        <!-- COSTO TOTAL -->
                                        <td><a oninput="handleInput(event)" placeholder="0">${{ $f->cost_total }}</a>
                                        </td>

                                        <!-- BARRAS DE PROGRESO -->
                                        <td>
                                            <div class="progress-circle" id="1{{ $f->id }}">
                                                <input name="c_tela" type="number" min="0" max="100"
                                                    value="{{ $f->c_tela }}"
                                                    oninput="updateProgress(this.value, '1{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="2{{ $f->id }}">
                                                <input name="cost"type="number" min="0" max="100"
                                                    value="{{ $f->cost }}"
                                                    oninput="updateProgress(this.value, '2{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="3{{ $f->id }}">
                                                <input name="c_mad" type="number" min="0" max="100"
                                                    value="{{ $f->c_mad }}"
                                                    oninput="updateProgress(this.value, '3{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="4{{ $f->id }}">
                                                <input name="arm" type="number" min="0" max="100"
                                                    value="{{ $f->arm }}"
                                                    oninput="updateProgress(this.value, '4{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="5{{ $f->id }}">
                                                <input name="emparr" type="number" min="0" max="100"
                                                    value="{{ $f->emparr }}"
                                                    oninput="updateProgress(this.value, '5{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="6{{ $f->id }}">
                                                <input name="c_esp" type="number" min="0" max="100"
                                                    value="{{ $f->c_esp }}"
                                                    oninput="updateProgress(this.value, '6{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="7{{ $f->id }}">
                                                <input name="p_blan" type="number" min="0" max="100"
                                                    value="{{ $f->p_blan }}"
                                                    oninput="updateProgress(this.value, '7{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="8{{ $f->id }}">
                                                <input name="tapic" type="number" min="0" max="100"
                                                    value="{{ $f->tapic }}"
                                                    oninput="updateProgress(this.value, '8{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="9{{ $f->id }}">
                                                <input name="ensam" type="number" min="0" max="100"
                                                    value="{{ $f->ensam }}"
                                                    oninput="updateProgress(this.value, '9{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="10{{ $f->id }}">
                                                <input name="despa" type="number" min="0" max="100"
                                                    value="{{ $f->despa }}"
                                                    oninput="updateProgress(this.value, '10{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="-11{{ $f->id }}">
                                                <input name="nieves"type="number" min="0" max="100"
                                                    value="{{ $f->nieves }}"
                                                    oninput="updateProgress(this.value, '-11{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <!-- Agrega los demás campos con el mismo formato -->
                                    </tr>
                                </form>
                            @endforeach
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
                                            {{ $f->cliente }} - Sala Rinconera FIT Velvet Plomo
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
                                        <p><strong>Nombre:</strong> Sala Rinconera FIT Velvet Plomo</p>
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

            #mydatatable tfoot {
                display: table-header-group !important;
            }
        </style>

        <script type="text/javascript"></script>
    </body>
    <nav class="navbar fixed-bottom navbar-light bg-light justify-content-center">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 1, 'año' => $año]) }}">Enero</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 2, 'año' => $año]) }}">Febrero</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 3, 'año' => $año]) }}">Marzo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 4, 'año' => $año]) }}">Abril</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 5, 'año' => $año]) }}">Mayo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 6, 'año' => $año]) }}">junio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 7, 'año' => $año]) }}">julio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 8, 'año' => $año]) }}">agosto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 9, 'año' => $año]) }}">septiembre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 10, 'año' => $año]) }}">octube</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 11, 'año' => $año]) }}">noviembre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ver_año', ['mes' => 12, 'año' => $año]) }}">diciembre</a>
            </li>
        </ul>
    </nav>

    </html>
@endsection
<style>




</style>
