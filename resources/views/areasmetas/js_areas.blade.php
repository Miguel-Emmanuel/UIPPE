
<option value="0">-- Seleccione un Area  --</option>
@foreach ($area as $info)
    <option value="{{ $info->idare }}">{{ $info->arean }}</option>
@endforeach

