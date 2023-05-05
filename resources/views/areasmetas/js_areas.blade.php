<select multiple data-search="true" data-silent-initial-value-set="true" name="id_area[]" id="multimetas">
    @foreach($areas as $info)
    <option value="{{ $info -> id_area }}">{{ $info -> nombre }}</option>
    @endforeach
</select>
<script type="text/javascript" src="js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multimetas'
    });
</script>