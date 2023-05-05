<option data-search="true" data-silent-initial-value-set="true" value="0">-- Seleccione una meta --</option>
@foreach ($meta as $info)
<option data-search="true" data-silent-initial-value-set="true" value="{{ $info->id_meta }}">{{ $info->nombre }}</option>
@endforeach