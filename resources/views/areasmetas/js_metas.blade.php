
<option  multiple data-search="true"
data-silent-initial-value-set="true"  value="0">-- Seleccione una meta --</option>
@foreach ($meta as $info)
    <option multiple data-search="true"
    data-silent-initial-value-set="true" value="{{ $info->mid }}">{{ $info->nmeta }}</option>
@endforeach


