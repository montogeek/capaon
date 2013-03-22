@layout('templates.cliente')

@section('contenido')

		<div class="span6 well">

		    <div class="row-fluid">


              	<h1>Cursos Disponibles</h1>

             	@if(Session::has('correcto'))

             		{{ Alert::success('Te has Inscrito al curso <strong>'.Session::get('nombre').'</strong>') }}

             	@endif

             	@if(Session::has('cupo_correcto'))

             		{{ Alert::success('Petición de cupo al curso <strong>'.Session::get('cupo_correcto').'</strong>'.' enviada correctamente.') }}

             	@endif

              	@foreach($ambitos as $ambito)

              		<legend>{{ $ambito->ambito }}</legend>

              		<div class="accordion" id="accordion2">

			            @foreach($cursos as $curso)

			            	@if($curso->ambito === $ambito->ambito )

				                <div class="accordion-group">

				                  	<div class="accordion-heading">

				                    	<a rel="tooltip" placement="top" title="{{ ($curso->estado) ? ($curso->estado == -1) ? "Cancelado" : "Abierto" : "Cerrado"; }}" class="accordion-toggle collapsed btn-info" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{ $curso->id }}" style="{{ ($curso->estado == '1') ? '' : 'background-image: -webkit-linear-gradient(top,#FF0303,#F0261E);' }}">

				                    		{{ $curso->nombre }}

				                    	</a>

				                  	</div>

				                  	<div id="collapse{{ $curso->id }}" class="accordion-body collapse" style="height: 0px; ">

				                    	<div class="accordion-inner">

				                      		{{ $curso->resumen }}

				                      		{{ HTML::link('cliente/cursos/detallado/'.$curso->id,'Ver más') }}

				                    	</div>

				                  	</div>

				                </div>

				            @endif

			            @endforeach

		        	</div>

              	@endforeach

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

@section('cursos_disponibles')

	{{ HTML::script('js/bootstrap-collapse.js'); }}
	<script type="text/javascript">
	$(document).ready(function () {
    	$("[rel=tooltip]").tooltip();
  	});
	</script>

@endsection