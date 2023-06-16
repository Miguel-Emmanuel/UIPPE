<!-- MODAL MESES START -->
@foreach ($areasmetas as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_areasmetas }}"></div><div id="res{{ $meta->id_areasmetas }}"></div>
            </div>
            <div class="modal-body">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum0{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Enero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum1{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Febrero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum2{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Marzo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum3{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Abril">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum4{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Mayo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-6 col-md-3 col-form-label">Junio:</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" id="sum5{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Junio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum6{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Julio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum7{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Agosto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum8{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Septiembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum9{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Octubre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum10{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Noviembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum11{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Diciembre">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    mostrar{{ $meta->id_areasmetas }} = (valor) => {
        document.getElementById("res{{ $meta->id_areasmetas }}").innerHTML = "/ "+valor;
    };

    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = () => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.getElementById("sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);

        }
        console.log(sumaT);
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT;
    };
</script>
@endforeach
<!-- MODAL MESES START -->

<!-- MODAL DELETE START -->
@foreach ($areasmetas as $meta)
<div class="modal fade" id="deleteModal{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar registro | {{ $meta->id_areasmetas }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <p><strong>{{ $meta->nombreM }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('deleteMeta', ['id' => $meta->id_areasmetas]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- MODAL DELETE END -->
