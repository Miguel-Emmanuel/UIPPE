 <div id="resultado">
    <table class="table" id="lista">
        <thead>
            <tr>
                <th class="text-center">Foto</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th colspan="3">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($areas as $info)
            @if($session_id != 3)
            <tr>
                <td class="text-center"><img src="{{ asset('img/post/'.$info-> foto) }}" alt="{{ $info->foto }}" style="width: 50px; border-radius: 15px;"></td>
                <td>{{ $info->clave}}</td>
                <td>{{ $info->nombre}}</td>
                <td>{{ $info->descripcion}}</td>
                <td>
                    @if($info -> activo > 0)
                    <p style="color: green;">Activo</p>
                    @else
                    <p style="color: red;">Inactivo</p>
                    @endif
                </td>
                <td>
                    <!-- Button show modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_area }}"><i class="fa-solid fa-eye"></i></button>
                </td>
                <td>
                    <!-- Button modif modal -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_area }}"><i class="fa-solid fa-pen-to-square"></i></button>
                </td>
                <td>
                    <!-- Button delete modal -->
                    @if($info -> activo > 0)
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                    @else
                    <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                    @endif
                </td>
            </tr>
            @elseif($info -> activo > 0)
            <tr>
                <td class="text-center"><img src="{{ asset('img/post/'.$info-> foto) }}" alt="{{ $info->foto }}" style="width: 50px; border-radius: 15px;"></td>
                <td>{{ $info->clave}}</td>
                <td>{{ $info->nombre}}</td>
                <td>{{ $info->descripcion}}</td>
                <td>
                    @if($info -> activo > 0)
                    <p style="color: green;">Activo</p>
                    @else
                    <p style="color: red;">Inactivo</p>
                    @endif
                </td>
                <td>
                    <!-- Button show modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_area }}"><i class="fa-solid fa-eye"></i></button>
                </td>
                <td>
                    <!-- Button modif modal -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_area }}"><i class="fa-solid fa-pen-to-square"></i></button>
                </td>
                <td>
                    <!-- Button delete modal -->
                    @if($info -> activo > 0)
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                    @else
                    <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                    @endif
                </td>
            </tr>
            @else
            @endif
            @endforeach
        </tbody>
    </table>
</div>
