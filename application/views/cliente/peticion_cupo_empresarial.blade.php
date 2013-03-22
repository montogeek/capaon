@layout('templates.cliente')

@section('contenido')

	<div class="span6 well">

	    <div class="row-fluid">

	    	<h2>Petición de cupo para el curso {{ $curso->nombre }}</h2>

	    	<div class="well well-large">

	    		{{ Form::open('cliente/empresarial/envioPeticion/'.$curso_id) }}

	    		<legend>Número de cupos</legend>

	    		{{ Form::input('cupos','cupos',$cupos_pedidos,array('class'=>'uneditable-input')); }}

	    		<span class="help-block">No debe susperar el número de cupo disponibles en el curso (cupos) ó No superar el número máximo de 30 cupos.</span>

	    		<legend>Mensaje</legend>

	    		<span class="help-block">Cuéntanos por qué deseas obtener los cupos.</span>

	    		{{ Form::textarea('mensaje', '', array('id'=>'mensaje','style'=>'width:100%')); }}

	    		@if (empty($participantes))

	    			{{ HTML::link('#agregar_participante','Agregar participante',array('class'=>'btn btn-info','role'=>'button','data-toggle'=>'modal')) }}

	    		@else

	    			{{ Form::submit('Enviar Petición',array('class'=>'btn btn-primary')) }}

	    			{{ HTML::link('#agregar_participante','Agregar participante',array('class'=>'btn btn-info','role'=>'button','data-toggle'=>'modal')) }}

	    		@endif

	    		{{ Form::close() }}

	    	</div>

	    	@if(!empty($participantes))

		    	<div class="">

		    		<legend>Participantes para solicitud</legend>

		    		<table class="table table-hover">

						<thead>

						    <tr>

						        <th>Identificación</th>

						      	<th>Nombres</th>

						      	<th>Apellidos</th>

						      	<th>Email</th>

						      	<th>Teléfono/Celular</th>

						    </tr>

						</thead>

						<tbody>

							@foreach($participantes as $participante)

						    	<tr>

						    		<td>{{ $participante['identificacion'] }} </td>

							    	<td>{{ $participante['nombre'] }} </td>

							    	<td>{{ $participante['apellido'] }} </td>

							    	<td>{{ $participante['email'] }} </td>

							    	<td>{{ $participante['cel_tel'] }} </td>

						    	</tr>

						    @endforeach

						</tbody>

					</table>

		    	</div>

		    @else

		    	<h3>Debes agregar al menos un participante para enviar la solicitud de cupo.</h3>

	    	@endif

	    </div>

	</div>



	<div id="agregar_participante" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="AgregarParticipante" aria-hidden="true">

	  	<div class="modal-header">

		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

	    	<h3 id="AgregarParticipante">Agregar Participante</h3>

	  	</div>

	  	@if (Session::has('correcto'))

            {{ Alert::success("Participante agregado correctamente!.") }}

        @endif

	  	<div class="modal-body">

    		{{ Form::open('cliente/empresarial/agregarparticipante/','POST',array('class'=>'form-horizontal')) }}

    		<div class="control-group">
				{{ $errors->first('identificacion', Alert::error(":message")) }}
				{{ Form::label('identificacion', 'Identificación',array('class'=>'control-label')); }}
				<div class="controls">
					{{ Form::text('identificacion', Input::old('identificacion', ''), array('placeholder' => 'Identificación','required'=>'')); }}
				</div>
			</div>
			<div class="control-group">
				{{ $errors->first('nombre', Alert::error(":message")) }}
				{{ Form::label('nombre', 'Nombres',array('class'=>'control-label')); }}
				<div class="controls">
					{{ Form::text('nombre', Input::old('nombre', ''), array('placeholder'=>'Nombres','required'=>''));	}}
				</div>
			</div>
			<div class="control-group">
				{{ $errors->first('apellido', Alert::error(":message")) }}
				{{ Form::label('apellido', 'Apellidos',array('class'=>'control-label')); }}
				<div class="controls">
					{{ Form::text('apellido', Input::old('apellido', ''), array('placeholder'=>'Apellidos','required'=>'')); }}
				</div>
			</div>
			<div class="control-group">
				{{ $errors->first('email', Alert::error(":message")) }}
				{{ Form::label('email', 'Email',array('class'=>'control-label')); }}
				<div class="controls">
					{{ Form::email('email',Input::old('email', ''), array('placeholder'=>'Email','required'=>'')); }}
				</div>
			</div>
			<div class="control-group">
				{{ $errors->first('cel_tel', Alert::error(":message")) }}
				{{ Form::label('cel_tel','Teléfono/Celular',array('class'=>'control-label')); }}
				<div class="controls">
					{{ Form::text('cel_tel',Input::old('cel_tel', ''),array('placeholder'=>'Teléfono','required'=>'')); }}
				</div>
			</div>

			{{ Form::hidden('curso_id',$curso_id) }}

			{{ Form::hidden('cupos_pedidos',$cupos_pedidos) }}

			<div class="form-actions">

				{{ Form::submit('Agregar participante',array('class'=>'btn btn-primary')) }}

				{{ HTML::link('cliente/cursos','Cerrar',array('class'=>'btn','data-dismiss'=>'modal','aria-hidden'=>'true')) }}

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

@section('peticion_cupo_empresarial')
	{{ HTML::script('js/boostrap-modal.js');}}
	<script type="text/javascript">
		$('#agregar_participante').modal('{{ ($correcto) ? "hide" : "show" }}');
	</script>
@endsection