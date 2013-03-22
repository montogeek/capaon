@layout('templates.public')
@section('contenido')
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="row-fluid">
              <h1>Contáctanos</h1>
              <p>Su opinión es de mucha importancia.</p>
              @if (Session::has('correcto'))
                {{ Alert::success("¡Correo Enviado Correctamente") }}
              @endif
          </div>
          {{ Form::open('/contactar/enviar','POST',array('class'=>'well')) }}
          {{ $errors->first('nombre', Alert::error(":message")) }}
          {{ Form::label('nombre','Nombre') }} 
          {{ Form::text('nombre',Input::old('nombre', ''),array('required'=>'')) }}

          {{ $errors->first('email', Alert::error(":message")) }}
          {{ Form::label('email','Correo Electronico') }} 
          {{ Form::email('email',Input::old('email', ''),array('required'=>'')) }}

          {{ $errors->first('asunto', Alert::error(":message")) }}
          {{ Form::label('asunto','Asunto') }} 
          {{ Form::text('asunto',Input::old('asunto', ''),array('required'=>'')) }}

          {{ $errors->first('mensaje', Alert::error(":message")) }}
          {{ Form::label('mensaje','Mensaje') }} 
          {{ Form::textarea('mensaje',Input::old('mensaje', ''),array('style'=>'width:100%','required'=>'')) }}

          {{ Form::submit('Enviar',array('class'=>'btn btn-primary btn-large')) }}
          {{ Form::close() }}

        </div><!--/span-->
      </div><!--/row-->
@endsection

@section('contactenos')
  {{ HTML::script('js/admin/wysihtml5-0.3.0_rc2.min.js'); }}
  {{ HTML::script('js/admin/bootstrap-wysihtml5-0.0.2.min.js'); }}
  <script type="text/javascript">
    $('#mensaje').wysihtml5();
  </script>
@endsection