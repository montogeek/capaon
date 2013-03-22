@layout('templates.public')

@section('contenido')

		@if (Session::has('error'))

            {{ Alert::error('Datos incorrectos boludo!'); }}

        @endif

	<div class="hero">

	    <h1>Registro Empresariales</h1>

	</div>

	{{ Form::open('registro/empresarial','POST',array('class'=>'form-horizontal well')); }}



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



	<legend>Datos de la Empresa</legend>



	<div class="control-group">

		{{ $errors->first('identificacion', Alert::error(":message")) }}

		{{ Form::label('identificacion', 'N.I.T.',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('identificacion', Input::old('identificacion', ''), array('placeholder' => 'N.I.T.','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('nombre', Alert::error(":message")) }}

		{{ Form::label('nombre', 'Nombre de la Empresa',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('nombre', Input::old('nombre', ''), array('placeholder'=>'Nombre','required'=>''));	}}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('apellido_naturaleza', Alert::error(":message")) }}

		{{ Form::label('apellido_naturaleza', 'Naturaleza',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('apellido_naturaleza', Input::old('apellido_naturaleza', ''), array('placeholder'=>'Naturaleza','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('direccion', Alert::error(":message")) }}

		{{ Form::label('direccion', 'Dirección de la Empresa',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('direccion', Input::old('direccion', ''), array('placeholder'=>'Dirección','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('telefono', Alert::error(":message")) }}

		{{ Form::label('telefono','Teléfono de la Empresa',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('telefono',Input::old('telefono', ''),array('placeholder'=>'Teléfono','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('cel_fax', Alert::error(":message")) }}

		{{ Form::label('cel_fax', 'FAX',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('cel_fax', Input::old('cel_fax', ''), array('placeholder'=>'FAX','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('titulo', Alert::error(":message")) }}

		{{ Form::label('titulo','Actividad Empresarial',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('titulo', Input::old('titulo', ''), array('placeholder'=>'Actividad Empresarial','required'=>'')); }}

		</div>

	</div>



	<legend>Representante</legend>



	<div class="control-group">

		{{ $errors->first('nombre_r', Alert::error(":message")) }}

		{{ Form::label('nombred_r', 'Nombre',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('nombre_r', Input::old('nombre_r', ''), array('placeholder' => 'Nombre','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('apellido_r', Alert::error(":message")) }}

		{{ Form::label('apellido_r', 'Apellidos',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('apellido_r', Input::old('apellido_r', ''), array('placeholder'=>'Apellidos','required'=>''));	}}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('telefono_r', Alert::error(":message")) }}

		{{ Form::label('telefono_r', 'Teléfono',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('telefono_r', Input::old('telefono_r', ''), array('placeholder'=>'Teléfono','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('email_r', Alert::error(":message")) }}

		{{ Form::label('email_r', 'Email',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('email_r', Input::old('email_r', ''), array('placeholder'=>'Email','required'=>'')); }}

		</div>

	</div>

	<div class="control-group">

		{{ $errors->first('direccion_r', Alert::error(":message")) }}

		{{ Form::label('direccion_r','Dirección',array('class'=>'control-label')); }}

		<div class="controls">

			{{ Form::text('direccion_r',Input::old('direccion_r', ''),array('placeholder'=>'Dirección','required'=>'')); }}

		</div>

	</div>





	{{ Form::hidden('id_tipo_usuario', '3'); }}

	{{ Form::hidden('id_representante', '1'); }}

	{{ Form::hidden('potencial', 'no'); }}

	{{ Form::actions(array(Buttons::large_primary_submit('Registrarme!'), Buttons::large_info_link('Regresar', '/registro'))); }}

	{{ Form::close(); }}

@endsection