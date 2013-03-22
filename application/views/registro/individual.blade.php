@layout('templates.public')

@section('contenido')

		@if (Session::has('error'))

            {{ Alert::error('Datos incorrectos boludo!'); }}

        @endif

	<div class="hero">

	    <h1>Registro Individual</h1>

	</div>

	{{ Form::open('registro/individual','POST',array('class'=>'form-horizontal well')); }}



	<legend>Datos de usuario</legend>



  	<div class="control-group">

		{{ $errors->first('email', Alert::error(":message")) }}

		{{ Form::label('email', 'Email (Será tu usuario)',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::email('email',Input::old('email', ''), array('placeholder'=>'Email','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('contrasena', Alert::error(":message")); }}

		{{ Form::label('contrasena', 'Contraseña',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::password('contrasena',array('placeholder'=>'Contraseña','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('confirmacion_contrasena', Alert::error(":message")); }}

		{{ Form::label('confirmacion_contrasena', 'Confirmación Contraseña',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::password('confirmacion_contrasena',array('placeholder'=>'Confirmación','required'=>'')); }}

		</div>

	</div>



	<legend>Datos Personales</legend>

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

		{{ Form::label('apellido_naturaleza', 'Apellidos',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('apellido_naturaleza', Input::old('apellido_naturaleza', ''), array('placeholder'=>'Apellidos','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('direccion', Alert::error(":message")) }}

		{{ Form::label('direccion', 'Dirección',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('direccion', Input::old('direccion', ''), array('placeholder'=>'Dirección','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('telefono', Alert::error(":message")) }}

		{{ Form::label('telefono','Teléfono',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('telefono',Input::old('telefono', ''),array('placeholder'=>'Teléfono','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('cel_fax', Alert::error(":message")) }}

		{{ Form::label('cel_fax', 'Celular',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('cel_fax', Input::old('cel_fax', ''), array('placeholder'=>'Celular','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('titulo', Alert::error(":message")) }}

		{{ Form::label('titulo','Título',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('titulo', Input::old('titulo', ''), array('placeholder'=>'Titulo','required'=>'')); }}

		</div>

	</div>



	{{ Form::hidden('id_tipo_usuario', '2'); }}

	{{ Form::hidden('id_representante', '1'); }}

	{{ Form::hidden('potencial', 'no'); }}

	{{ Form::actions(array(Buttons::large_primary_submit('Registrarme!'), Buttons::large_info_link('Regresar','/registro'))); }}

	{{ Form::close(); }}

@endsection