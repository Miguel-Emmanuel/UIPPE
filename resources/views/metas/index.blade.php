@extends('layout.navbar')
@section('content')
<title>Metas</title>
<div class="container">
    <dxiv class="row">
        <div class="col p-4">
            <h3>Metas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table">
                <thead>
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th scope="col">Clave</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Activo</th>
                        <th scope="col">id_registro</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($metas as $meta)
                    <tr>
                        <th scope="row">{{ $meta -> clave }}</th>
                        <td>{{ $meta -> nombre }}</td>
                        <td>{{ $meta -> descripcion }}</td>
                        <td>{{ $metas -> activo }}</td>
                        <td>{{ metas-> id_registro }}</td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </dxiv>
</div>
@endsection