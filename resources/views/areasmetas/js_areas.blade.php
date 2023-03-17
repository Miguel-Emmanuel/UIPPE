
<option  multiple data-search="true"
data-silent-initial-value-set="true"  value="0">-- Seleccione un Area  --</option>
@foreach ($area as $info)
    <option multiple data-search="true"
    data-silent-initial-value-set="true" value="{{ $info->idare }}">{{ $info->arean }}</option>
@endforeach

