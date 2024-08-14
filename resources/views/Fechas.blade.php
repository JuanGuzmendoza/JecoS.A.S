@extends('layouts.menu')

@section('content')
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hello DefaultController!</title>

        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
        <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    </head>
    <!-- Botón que abre el formulario flotante -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Agregar fila</button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{ route('Fechas.store') }}" method="post">
                @csrf

          <div class="form-group">
            <label for="cliente">Cliente</label>
            <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Ingrese cliente">
          </div>
          <!-- Agrega más campos para cada columna de la tabla -->
          <a href="{{ url('Fechas/index') }}" class="btn btn-secondary">Regresar</a>
          <button type="sumit" class="btn btn-success">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

        <div class="table-responsive" id="mydatatable-container">
            <div class="container">
                <h2 class="mb-5">Programacion de Fechas</h2>
                <div class="table-responsive">
                  <table class="table table-striped custom-table">
                    <thead>
                      <tr>
                        <!-- COLUMNAS -->

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
                      <td>{{$f->id}}</td>
                      <td>{{$f->cliente}}</td>

                      <!-- FECHA ENTREGA -->
                      <td><input type="date" value="{{$f->entrega}}"></td>

                      <!-- OC -->
                      <td>{{$f->oc}}</td>

                      <!-- CODIGO -->
                      <td>{{$f->codigo}}</td>

                      <!-- NOMBRE -->
                      <td style="font-size: 15px;">{{$f->nomnbre}}</td>

                      <!-- CANTIDAD -->
                      <td><input type="number" style="width: 60px;"></td>

                      <!-- COSTO UNITARIO -->
                      <td><input type="text" class="money-input" oninput="handleInput(event)" placeholder="0"></td>

                      <!-- COSTO TOTAL -->
                      <td><input type="text" class="money-input" oninput="handleInput(event)" placeholder="0" disabled></td>
                      <!-- BARRAS DE PROGRESO -->
                      <td>
                        <div class="progress-circle" id="1{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->c_tela}}" oninput="updateProgress(this.value, '1{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="2{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->cost}}" oninput="updateProgress(this.value, '2{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="3{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->c_mad}}" oninput="updateProgress(this.value, '3{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="4{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->arm}}" oninput="updateProgress(this.value, '4{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="5{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->emparr}}" oninput="updateProgress(this.value, '5{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="6{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->c_esp}}" oninput="updateProgress(this.value, '6{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="7{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->p_blan}}" oninput="updateProgress(this.value, '7{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="8{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->tapic}}" oninput="updateProgress(this.value, '8{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="9{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->ensam}}" oninput="updateProgress(this.value, '9{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="10{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->despa}}" oninput="updateProgress(this.value, '10{{$f->id}}')">
                        </div>
                      </td>
                      <td>
                        <div class="progress-circle" id="-11{{$f->id}}">
                          <input type="number" min="0" max="100" value="{{$f->nieves}}" oninput="updateProgress(this.value, '-11{{$f->id}}')">
                        </div>
                      </td>

                      <tr>
                        <!-- CLIENTE -->
                        @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <style>
            #mydatatable tfoot input{
                width: 100% !important;
            }
            #mydatatable tfoot {
                display: table-header-group !important;
            }
            </style>

            <script type="text/javascript">
            </script>
            </body>
            </html>
            @endsection

