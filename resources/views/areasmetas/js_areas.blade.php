
<select multiple data-search="true"
data-silent-initial-value-set="true"   name="id_area[]" id="areas">

@foreach ($area as $info)
    <option value="{{ $info->idare }}">{{ $info->arean }}</option>
@endforeach
</select>
<script type="text/javascript" src="js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: 'select'
    });
</script>
