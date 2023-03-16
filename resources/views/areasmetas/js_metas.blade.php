
<option value="0">-- Seleccione una meta --</option>
@foreach ($meta as $info)
    <option value="{{ $info->mid }}">{{ $info->nmeta }}</option>
@endforeach


