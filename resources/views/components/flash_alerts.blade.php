@if ( session('message') )        
    @component( 'components.alert' )
        @slot( 'class', 'success' )
        @slot( 'name', 'Éxito' )
        @slot( 'message', session('message') )
    @endcomponent
@endif
@if (session('info'))
    @component( 'components.alert' )
        @slot( 'class', 'info' )
        @slot( 'name', 'Información' )
        @slot( 'message', session('info') )
    @endcomponent   
@endif
@if (session('warning'))
    @component( 'components.alert' )
        @slot( 'class', 'warning' )
        @slot( 'name', 'Advertencia' )
        @slot( 'message', session('warning') )
    @endcomponent
@endif
@if (session('danger'))
    @component( 'components.alert' )
        @slot( 'class', 'danger' )
        @slot( 'name', 'Se ha eliminado' )
        @slot( 'message', session('danger') )
    @endcomponent
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close"data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif