@layout('templates/admin')
@section('contenido')
        <div class="span9 well">
	        <div class="row-fluid">
	            <h2>Felicidades</h2>
              @if (Session::has('correcto'))
                {{ Alert::success("¡Curso agregado correctamente!.") }}
              @endif
              @if(Session::has('correctos'))
              {{ Alert::success("¡".Session::get('valor')." agregado correctamente!.")}}
              @endif
	        </div>
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