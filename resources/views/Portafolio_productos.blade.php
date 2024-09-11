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
