@layout('templates/admin')
@section('contenido')
    <div class="span6">
        <div class="row-fluid">
            <div class="well">
                <h2>Bienvenido {{ $usuario->nombre; }}! </h2>
                  @if (Session::has('correcto'))
                    {{ Alert::success("¡Curso agregado correctamente!.") }}
                  @endif
                  @if(Session::has('correctos'))
                    { Alert::success("¡".Session::get('valor')." agregado acorrectamente!.")}}
                  @endif
                  {{-- dd($ambitos->get()) }}
                  @foreach($ambitos as $ambito)
                    <legend>{{ $ambito->ambito }}</legend>
                    @foreach($solicitudes as $solicitud)
                      @if($solicitud->ambito == $ambito->ambito)
                        <p>{{ $solicitud->nombre_curso }}</p>
                        <p>Solicitudes <b>{{ $solicitud->total }}</b> </p>
                      @endif
                    @endforeach
                  @endforeach
              </div>
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