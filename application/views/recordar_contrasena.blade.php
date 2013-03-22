@layout('templates/public')
@section('contenido')
	<div class="container-fluid">
	  	<div class="row-fluid">
	    	<div class="span2">
	      	<!--Sidebar content-->
	    	</div>
	    	<div class="span8">
	    		<h2 class="form-signin-heading">Restablecer contraseña</h2>
	      		{{ Form::open('user/restablecer','POST',array('class'=>'form-signin')) }}
	      		{{ $errors->first('contrasena', Alert::error(":message")); }}
	          	{{ Form::password('contrasena',array('placeholder'=>'Contrasena','class'=>'input-block-level','required'=>'')) }}
	          	{{ $errors->first('confirmacion_contrasena', Alert::error(":message")); }}
	          	{{ Form::password('confirmacion_contrasena',array('placeholder'=>'Confirmación Contrasena','class'=>'input-block-level','required'=>'')) }}
	          	{{ Form::hidden('id', $usuario[0]->id); }}
	          	{{ Form::hidden('codigo', $codigo); }}
	          	{{ Form::submit('Restablecer',array('class'=>'btn btn-large btn-primary')) }}
	    	</div>
	    	<div class="span2">
	      		<!--Sidebar content-->
	    	</div>
	  	</div>
    </div> <!-- /container -->
@endsection