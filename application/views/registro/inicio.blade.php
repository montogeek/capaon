@layout('templates.public')
@section('contenido')
	<div class="hero">
        <h1>Registro</h1>
    </div>
    {{ Form::open('registro/registro'); }}
    {{ Form::select('tipo', array('0'=>'','2'=>'Individual','3'=>'Empresarial'), '0',array('id'=>'tipo')); }}
@endsection

@section('registro')
<script type="text/javascript">
$(document).ready(function() {
    $('#tipo').change(function() {
        this.form.submit();
    });
});
</script>
@endsection