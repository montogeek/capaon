@layout('templates.cliente')

@section('contenido')

	<div class="span6 well">

	    <div class="row-fluid">

	    	<h2>Petición de cupo para el curso {{ $curso->nombre }}</h2>

	    	<div class="well well-large">

	    		{{ Form::open('cliente/individual/cupo/'.$curso_id) }}

	    		<legend>Mensaje</legend>

	    		<span class="help-block">Explica tu razón de la petición del cupo.</span>

	    		{{ Form::textarea('mensaje', '', array('id'=>'mensaje','style'=>'width:100%')); }}

	    		{{ Form::submit('Pedir cupo',array('class'=>'btn btn-primary')) }}

	    		{{ Form::close() }}

	    	</div>

	    </div>

	</div>

	<div class="span3">

		</div><!--/span-->

	</div><!--/row-->

	<hr>

	<footer>

	    <p>&copy; CAPAON 2012</p>

	</footer>

	</div><!--/.fluid-container-->

@endsection

@section('peticion_cupo')

<script type="text/javascript">

	$('#mensaje').wysihtml5();

</script>

@endsection