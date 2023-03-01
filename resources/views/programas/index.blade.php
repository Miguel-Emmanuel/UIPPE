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
                        <td>#</td>
                        <td>ABREVIATURA</td>
                        <td>NOMBRE</td>
                        <td>DESCRIPCION</td>
                        <td>ACTIVO</td>
                        <td>registro</td>
                        <td>ACCIONES</td>

                    </tr>
                    <tr>

                        @foreach ($programas as $info)
                            <td>{{ $info->id_programa }}</td>
                            <td>{{ $info->abreviatura }}</td>
                            <td>{{ $info->nombre }}</td>
                            <td>{{ $info->descripcion }}</td>
                            <td>{{ $info->activo }}</td>
                            <td>{{ $info->id_registro }}</td>
                            <td>

                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $info->id_programa }}">
                                    MODIFICAR
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modalshow{{ $info->id_programa }}">
                                    SHOW
                                </button>
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_programa }}">
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
                                                     </td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>



            {{-- ELIMINAR MODAL --}}


@foreach ($programas as $info )


            <div class="modal fade" id="deleteModal{{ $info->id_programa }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  DESEAS ELIMINAR EL PROGRAMA :
                  <p>{{$info -> nombre}}</p>

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
        @foreach ($programas as $info)
        <div class="modal fade" id="modalshow{{ $info->id_programa }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalshowLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>NOMBRE: </p>
                <p>{{$info -> nombre}}</p>
                <p>SIGLAS: </p>
                <p>{{$info -> abreviatura}}</p>
                <p>DESCRIPCION: </p>
                <p>{{$info -> descripcion}}</p>

                <p>ACTIVO: </p>
                <p>{{$info -> activo}}</p>
                <p>ID_REGISTRO: </p>
                <p>{{$info -> id_registro}}</p>
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

        @foreach ($programas as $info)
            <!-- Modal MODIFICAR -->
            <div class="modal fade" id="exampleModal{{ $info->id_programa }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> NOMBRE:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $info -> nombre }}">
                                </div>
<br><br>
                            <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> SIGLAS:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $info -> abreviatura }}">
                                </div>
<br><br>
                            <div class="input-group">
                                <span class="input-group-text" style="margin-left: 60px "> DESCRIPCION:</span>
                                <input type="text" aria-label="First name" class="form-control" name="clave" style="margin-right: 20px" value="{{ $info -> descripcion }}">
                                </div>

                        </div>
                        <br><br>
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
