@layout('templates.public')

@section('contenido')

		@if($resultados == null)

        	<h4>

        		Lo sentimos, tu búsqueda "{{ $cadena }}" no coincidió con ningún curso :(

        	</h4>

        	{{ Form::open('buscar','POST',array('class'=>'page-header form-search')) }}

        	{{ Form::search('cadena','',array('class'=>'input-xxlarge search-query','name'=>'q','placeholder'=>'Buscar Cursos')) }}

        	{{ Form::close(); }}

        @else

	        <h1>Resultados de la búsqueda para "{{ $cadena }}"</h1>

	        <br>

	        <div class="accordion" id="accordion2">
	        	<div class="well">
		           @foreach($resultados as $curso)

		                <div class="accordion-group">

		                  	<div class="accordion-heading">

		                    	<a class="accordion-toggle collapsed btn-info" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{ $curso->id }}">

		                    		{{ $curso->nombre }}{{-- Buttons::normal('memo',array('class'=>'lsf symbol pull-right','style'=>'font-size: 20px')) }}

		                    	</a>

		                  	</div>

		                  	<div id="collapse{{ $curso->id }}" class="accordion-body collapse" style="height: 0px; ">

		                    	<div class="accordion-inner">

		                      		{{ $curso->resumen }}

		                      		{{ Buttons::normal('memo',array('class'=>'lsf symbol pull-right','style'=>'font-size: 24px','id'=>$curso->id,'data-toggle'=>'modal','href'=>'#curso'.$curso->id)) }}

		                    	</div>

		                  	</div>

		                </div>

		            @endforeach
		        </div>

	        </div>


	    @endif

	    @foreach($resultados as $curso)

	    <div id="curso{{ $curso->id }}" class="modal hide fade" tabindex="-1" data-width="760" style="width: 760px; margin-left: -380px; display: none; margin-top: -264.5px; " aria-hidden="true">

		  <div class="modal-header">

		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

		    <h3>{{ $curso->nombre }}</h3>

		  </div>

		  <div class="modal-body">

		    <div class="row-fluid">

		      <div class="span6">

		        <p><strong>Resumen: </strong> {{ $curso->resumen }}</p>

		        <p><strong>Objetivo: </strong> {{ $curso->objetivo }}</p>

		        <p><strong>Justificación: </strong> {{ $curso->justificacion }}</p>

		        <p><strong>Contenido: </strong> {{ $curso->contenido }}</p>

		        <p><strong>Ambito: </strong> {{ $curso->ambito }}</p>

		        <p><strong>Cupo: </strong> {{ $curso->cupo }}</p>

		        <p><strong>Estado: </strong> {{ ($curso->estado) ? "Abierto" : "Cerrado"; }}</p>

		        <p><strong>Costo: </strong> ${{ $curso->costo }}</p>

		      </div>

		      <div class="span6">

		      	@if($conferencista[$curso->id] != null)

			        <strong>Conferencistas: </strong>

			        @foreach($conferencista[$curso->id] as $profesor) 
            <ul><b>{{ $profesor->nombre }}
               {{ $profesor->apellido }} </b>
              <li><b>Título: </b> {{ $profesor->titulo }}</li>
              <li><b>Información: </b> {{ $profesor->info_conferencista }}</li>
              <li>{{ HTML::link($profesor->enlace, 'Sitio Web'); }}</li>
            </ul>
          @endforeach  

		        @else 

		        	<strong>No hay conferencistas.</strong><br/>

		        @endif

		        <p><strong>Fecha Inscripción: </strong></p>

		        <p><strong>Desde</strong> {{ $curso->inicio_ins }} <br> <strong>hasta</strong> {{ $curso->fin_ins }}</p>

		        <p><strong>Fecha Duración: </strong> </p>

		        <p><strong>Desde</strong> {{ $curso->inicio_curso }} <br> <strong>hasta</strong> {{ $curso->fin_curso }}</p>

		      </div>

		    </div>

		  </div>

		</div>

		@endforeach

@endsection

@section('busqueda')

    {{ HTML::script('js/bootstrap-modalmanager.js'); }}

    {{ HTML::script('js/bootstrap-modalplugin.js'); }}

    @foreach($resultados as $curso)

	    <script type="text/javascript">

	    	$('#curso{{ $curso->id }}').modalmanager

	    </script>

    @endforeach

@endsection