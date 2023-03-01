@extends('layout.navbar')
@section('content')
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta">
                    AGG
                </button>
                <table class="table">

                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Operaciones</th>
                    </tr>
                    <tr>

                    @foreach($Usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->clave}}</td>
                                            <td>{{$usuario->nombre}}</td>
                                            <td>{{$usuario->app}}</td>
                    
                                            <td>    
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $usuario->id_usuario }}">
                                    MODIFICAR
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modalshow{{ $usuario->id_usuario }}">
                                    SHOW
                                </button>
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $usuario->id_usuario }}">
ELIMINAR
  </button>

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

                            </div>
</td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>



            {{-- ELIMINAR MODAL --}}


@foreach ($Usuarios as $usuario )


            <div class="modal fade" id="deleteModal{{ $usuario->id_usuario }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  DESEAS ELIMINAR EL PROGRAMA :
                  <p>{{$usuario -> nombre}} </p>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
          </div>


          {{-- ELIMINAR END MODAL --}}
          @endforeach

        {{-- SHOW MODAL --}}
        @foreach ($Usuarios as $usuario)
        <div class="modal fade" id="modalshow{{ $usuario->id_usuario }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalshowLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>NOMBRE: </p>
                <p>{{$usuario -> nombre}}</p>
                <p>SIGLAS: </p>
                <p>{{$usuario -> app}}</p>
                <p>ACADEMICO: </p>
                <p>{{$usuario -> academico}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
@endforeach
        {{-- SHOW END MODAL --}}

        @foreach ($Usuarios as $usuario)
            <!-- Modal MODIFICAR -->
            <div class="modal fade" id="exampleModal{{ $usuario->id_usuario }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> CLAVE:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $usuario -> clave }}">
                                </div>
                                 <br><br>
                            <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> NOMBRE:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $usuario -> nombre }}">
                                </div>
                          <br><br>
                            <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> APELLIDO MATERNO:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $usuario -> app }}">
                                </div>

                        </div>
                        <br><br>
                        <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> APELLIDO PATERNO:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $usuario -> apm }}">
                                </div>

                        </div>
                        <br><br>
                        <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> GENERO:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $usuario -> genero }}">
                                </div>

                        </div>
                        <br><br>
                        <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> FECHA DE NACIMIENTO:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $usuario -> fn }}">
                                </div>

                        </div>
                        <br><br>
                        <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> ACADEMICO:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $usuario -> academico }}">
                                </div>

                        </div>
                        <br><br>
                        <label for="colFormLabelSm" class="fw-bold">Foto :</label>
                        <div class="mb-3">
                            
                            <input class="form-control form-control-sm" id="formFileSm" type="file" id="photo" name="photo">
                        <div>
                        <br>
                            <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input type="text" class="form-control" id="autoSizingInputGroup" name="email" placeholder="ejemplo: jimena.diaz@utvtol.edu.mx">
                            </div>
                            <label for="colFormLabelSm" class="fw-bold">Password :</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                            <br>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name='activo' value="Activo">
                            <label class="form-check-label" for="flexCheckDefault">
                                Activo
                            </label>
                            </div>

                            <!-- FALTA LO DE TIPO DE USUARIOS MIS ESTIMADOS -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL MODIFICAR END --}}
        @endforeach

        {{-- ALTA MODAL --}}

        <div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalalta">MODAL | DETALLE DE EMPLEADO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="contenedor_body">
            <form action="{{ route('programas.store') }}" method="POST"class="row g-3" enctype="multipart/form-data">

            </form>
                            <p>ALTA</p>



                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CERRAR</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ALTA END MODAL --}}






        </div>
        <script>
            $(function() {
                $('#modalmod').modal('show')
            });
        </script>
        <script>
            $(function() {
                $('#modalshow').modal('show')
            });
            $(function() {
                $('#modalver').modal('show')
            });
            $(function() {
                $('#eliminarmodal').modal('show')
            });
        </script>
    @endsection