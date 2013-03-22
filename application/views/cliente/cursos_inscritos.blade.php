@layout('templates.cliente')

@section('contenido')

		<div class="span8 well">

		    <div class="row-fluid">

              	<h1>Mis Cursos Inscritos</h1>
              	<p>Estos son tus cursos inscritos.</p>

              	@if (Session::has('correcto'))

           			{{ Alert::success(Session::get('correcto')) }}

           		@endif

           		@if (Session::has('incorrecto'))

           			{{ Alert::error(Session::get('incorrecto')) }}

           		@endif

          		<div class="accordion" id="accordion2">

		            @foreach($cursos as $curso)

		                <div class="accordion-group">

		                  	<div class="accordion-heading">

		                    	<a class="accordion-toggle collapsed btn-info" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{ $curso->id }}">

		                    		{{ $curso->nombre }}

		                    	</a>

		                  	</div>

		                  	<div id="collapse{{ $curso->id }}" class="accordion-body collapse" style="height: 0px; ">

		                    	<div class="accordion-inner">

		                      		{{ $curso->resumen }}



		                      		{{ HTML::link('cliente/cursos/detallado/'.$curso->id,'Ver más') }}

		                      			{{ Form::open('cliente/inicio/matricular/','POST',array('class'=>'pull-right input-append')) }}

			                      		{{ Form::text('codigo','',array('id'=>'appendedInputButton','class'=>'span4','required')) }}

			                      		{{ Form::hidden('curso_id', $curso->id) }}

			                      		{{ Form::submit('Matricularme') }}

			                      		{{ Form::close() }}

		                    	</div>

		                  	</div>

		                </div>

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

@section('cursos_disponibles')

	{{ HTML::script('js/bootstrap-collapse.js'); }}

@endsection