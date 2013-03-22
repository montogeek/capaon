@layout('templates.cliente')
@section('contenido')
	<div class="span6 well">
	    <div class="row-fluid">
	    	<h2>Inscripción de participantes para el curso {{ $curso->nombre }}</h2>
	    	@if (Session::has('correcto'))
            	{{ Alert::success('Participante inscrito correctamente!'); }}
        	@endif
	    	<div class="well well-large">
	    		{{ Form::open('cliente/empresarial/inscripcionParticipante/'.$curso_id,'POST',array('class'=>'form-horizontal')) }}
	    		<legend>Datos personales</legend>
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
					{{ $errors->first('apellido_naturaleza', Alert::error(":message")) }}
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
					{{ $errors->first('telefono', Alert::error(":message")) }}
					{{ Form::label('cel_tel','Teléfono/Celular',array('class'=>'control-label')); }}
					<div class="controls">
						{{ Form::text('cel_tel',Input::old('cel_tel', ''),array('placeholder'=>'Teléfono','required'=>'')); }}
					</div>
				</div>
    					<div class="form-actions">
							{{ Form::submit('Inscribir participante',array('class'=>'btn btn-primary')) }}
							{{ HTML::link('cliente/cursos','Finalizar',array('class'=>'btn btn-info')) }}
		    				{{ Form::close() }}
	    				</div>
  				</div>
	    	</div>
	    	@if($participantes != null)
		    	<div class="well well-large">
		    		<legend>Participantes inscritos</legend>
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
						    		<td>{{ $participante->identificacion }} </td>
							    	<td>{{ $participante->nombre }} </td>
							    	<td>{{ $participante->apellido }} </td>
							    	<td>{{ $participante->email }} </td>
							    	<td>{{ $participante->cel_tel }} </td>
						    	</tr>
						    @endforeach
						</tbody>
					</table>
		    	</div>
		    @else
		    	<h3>Recuerda que puedes inscribir participantes ¬¬'</h3>
	    	@endif
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