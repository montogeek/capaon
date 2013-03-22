@layout('templates/admin')
@section('contenido')
        <div class="span9 well">
	        <div class="row-fluid">
	            <h2>Gestión Cursos</h2>
              <h4>Conferencistas</h4>
	            <p>Agrega un conferencista.</p>        
	        </div>
          {{ Form::open('admin/curso/nuevoConferencista') }}

          {{ $errors->first('nombre', Alert::error(":message")) }}
          {{ Form::label('nombre','Nombre') }} 
          {{ Form::text('nombre',Input::old('nombre', ''),array('required'=>'')) }}

          {{ $errors->first('apellido', Alert::error(":message")) }}
          {{ Form::label('apellido','Apellido') }}
          {{ Form::text('apellido',Input::old('apellido', ''),array('required'=>'')) }}

          {{ $errors->first('titulo', Alert::error(":message")) }}
          {{ Form::label('titulo','Titulos') }}
          {{ Form::text('titulo',Input::old('titulo', ''), array('required'=>'')) }}

          {{ $errors->first('enlace', Alert::error(":message")) }}
          {{ Form::label('enlace','Enlace del conferencista') }}
          {{ Form::text('enlace',Input::old('enlace', ''),array('required'=>'')) }}
          
          {{ $errors->first('info_conferencista', Alert::error(":message")) }}
          {{ Form::label('info_conferencista','Informacion del conferencista') }}
          {{ Form::textarea('info_conferencista',Input::old('info_conferencista', ''),array('style'=>'width:100%','required'=>'')) }}

          {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
          {{ Form::close() }}
          
        </div><!--/span-->
        <div class="span3">
        </div><!--/span-->
      </div><!--/row-->
      <hr>
      <footer>
        <p>&copy; CAPAON 2012</p>
      </footer>
    </div><!--/.fluid-container-->
@endsection

@section('conferencista')
    <script type="text/javascript">
        $('#info_conferencista').wysihtml5();
    </script>
@endsection