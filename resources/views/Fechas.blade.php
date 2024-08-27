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
        <!--composer require phpoffice/phpspreadsheet Bootstrap CSS -->
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
                            <div class="modal-footer">
                                <button type="sumit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div id="option-bar" class="navbar fixed-top navbar-expand-lg navbar-light bg-light ml-auto">
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

        </div>


        <div class="modal fade" id="exportarMesesModal" tabindex="-1" role="dialog"
            aria-labelledby="exportarMesesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title label-negro text-dark" id="exportarMesesModalLabel">Exportar meses</h5>
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
                                    <label for="septiembre"
                                        class="form-check-label label-negro text-dark">Septiembre</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="octubre" name="meses[]" value="octubre">
                                    <label for="octubre" class="form-check-label label-negro text-dark">Octubre</label>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
        <div id="mydatatable-container">
            <h3 class="mb-5">Programacion de Fechas @switch($mes)
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
            </h3>

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
                                <th class="tam" scope="col">ID</th>
                                <th class="tam" scope="col">Cliente</th>
                                <th class="tam" scope="col">Fecha entrega</th>
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
                            <?php
                            $i = 0;
                            ?>
                            <!-- FILAS -->
                            <form action="{{ route('actualizar_registros', ['mes' => $mes, 'año' => $año]) }}"
                                method="GET">
                                <button type="submit" class="btn btn-primary">Actualizar <span id="changed-rows"></span></button>
                                @csrf
                                @foreach ($Fechas as $f)
                                    <tr data-id="{{ $f->id }}" onclick="">
                                        <td><button type="sumit" class="btn btn-success"></button></td>
                                        <td>
                                            <input type="hidden" name="Fechas[{{ $i }}][0]" value="{{ $f->id }}">
                                            {{$f->id}}
                                        </td>
                                        <td>{{ $f->cliente }}</td>

                                        <td><input name="Fechas[{{ $i }}][1]" type="date"
                                                class="rounded border"value="{{ $f->entrega }}"></td>

                                        <!-- OC -->
                                        <td>{{ $f->oc }}</td>

                                        <!-- CODIGO -->
                                        <td>{{ $f->codigo }}</td>

                                        <!-- NOMBRE -->
                                        <td style="font-size: 15px;">{{ $f->nombre }}</td>

                                        <!-- CANTIDAD -->
                                        <td><input
                                                class="rounded border"type="number " name="Fechas[{{ $i }}][6]"  style="width: 60px ;"value="{{ $f->cant }}"></td>

                                        <!-- COSTO UNITARIO -->
                                        <td><input  name="Fechas[{{ $i }}][7]"  type="number" class="rounded border"
                                                placeholder="0"value="{{ $f->cost_unit }}"></td>

                                        <!-- COSTO TOTAL -->
                                        <td><a oninput="handleInput(event)" placeholder="0">${{ $f->cost_total }}</a>
                                        </td>

                                        <!-- BARRAS DE PROGRESO -->
                                        <td>
                                            <div class="progress-circle" id="1{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][8]" type="number" min="0" max="100"
                                                    value="{{ $f->c_tela }}"
                                                    oninput="updateProgress(this.value, '1{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="2{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][9]"type="number" min="0" max="100"
                                                    value="{{ $f->cost }}"
                                                    oninput="updateProgress(this.value, '2{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="3{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][10]" type="number" min="0" max="100"
                                                    value="{{ $f->c_mad }}"
                                                    oninput="updateProgress(this.value, '3{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="4{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][11]" type="number" min="0" max="100"
                                                    value="{{ $f->arm }}"
                                                    oninput="updateProgress(this.value, '4{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="5{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][12]" type="number" min="0" max="100"
                                                    value="{{ $f->emparr }}"
                                                    oninput="updateProgress(this.value, '5{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="6{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][13]" type="number" min="0" max="100"
                                                    value="{{ $f->c_esp }}"
                                                    oninput="updateProgress(this.value, '6{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="7{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][14]" type="number" min="0" max="100"
                                                    value="{{ $f->p_blan }}"
                                                    oninput="updateProgress(this.value, '7{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="8{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][15]"type="number" min="0" max="100"
                                                    value="{{ $f->tapic }}"
                                                    oninput="updateProgress(this.value, '8{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="9{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][16]" type="number" min="0" max="100"
                                                    value="{{ $f->ensam }}"
                                                    oninput="updateProgress(this.value, '9{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="10{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][17]"type="number" min="0" max="100"
                                                    value="{{ $f->despa }}"
                                                    oninput="updateProgress(this.value, '10{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress-circle" id="-11{{ $f->id }}">
                                                <input name="Fechas[{{ $i }}][18]"type="number" min="0" max="100"
                                                    value="{{ $f->nieves }}"
                                                    oninput="updateProgress(this.value, '-11{{ $f->id }}')">
                                            </div>
                                        </td>
                                        <!-- Agrega los demás campos con el mismo formato -->
                                    </tr>
                                    <?php
                                    $i += 1;
                                    ?>
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
            background-color: #FFC67D; /* naranja pasteloso */
            border-color: #FFC67D; /* mismo color para el borde */
            border-width: 1px; /* ancho del borde */
            border-style: solid; /* estilo del borde */
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
                <a class="nav-link" id="tab8" href="{{ route('ver_año', ['mes' => 8, 'año' => $año]) }}">agosto</a>
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

