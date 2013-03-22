@layout('templates.cliente')

@section('contenido')

	<div class="span6 well">

		    <div class="row-fluid">

		    	<legend>{{ $curso->nombre }}</legend>

		        <p><strong>Resumen: </strong> {{ $curso->resumen }}</p>

		        <p><strong>Objetivo: </strong> {{ $curso->objetivo }}</p>

		        <p><strong>Justificación: </strong> {{ $curso->justificacion }}</p>

		        <p><strong>Contenido: </strong> {{ ($curso->contenido) }}</p>

		        <p><strong>Conferencistas: </strong> 

		        @foreach($conferencista as $profesor) 
            <ul><b>{{ $profesor->nombre }}
               {{ $profesor->apellido }} </b>
              <li><b>Título: </b> {{ $profesor->titulo }}</li>
              <li><b>Información: </b> {{ $profesor->info_conferencista }}</li>
              <li>{{ HTML::link($profesor->enlace, 'Sitio Web'); }}</li>
            </ul>
          @endforeach    

		        </p>

		        <p><strong>Ambito: </strong> {{ $curso->ambito }}</p>

		        <p><strong>Fecha Inicio Inscripción: </strong> {{ $curso->inicio_ins }}</p>

		        <p><strong>Fecha Fin Inscripción: </strong> {{ $curso->fin_ins }}</p>

		        <p><strong>Fecha Inicio Curso: </strong> {{ $curso->inicio_curso }}</p>

		        <p><strong>Fecha Fin Curso: </strong> {{ $curso->fin_curso }}</p>

		        @if($curso->estado == 1)
		        	<p><strong>Cupo: </strong> {{ $curso->cupo }}</p>
		        @endif

		        <p><strong>Estado: </strong> {{($curso->estado == 1) ? "Abierto" : "Cerrado"; }}</p>

		        <p><strong>Costo: </strong> ${{ $curso->costo }}</p>

		        @if ($usuario->id_tipo_usuario == 2)

		        	@if ($inscrito)

		        		{{ Buttons::large_disabled_success_normal('Ya estas inscrito :)'); }}

		        	@elseif ($curso->estado == 0 || $curso->estado == -1)

		        		{{ HTML::link_to_route('cupo','Petición de cupo',array('nombre'=>$curso->id),array('class'=>'btn btn-info btn-large')); }}

		        	@else

		        		{{ HTML::link_to_route('inscripcion','Inscribirme', array('nombre'=>$curso->id), array('class'=>'btn btn-primary btn-large')); }}

		        	@endif

		        @elseif ($curso->estado == 0 || $curso->estado == -1)

		        		{{ HTML::link_to_route('cupo_empresarial','Petición de cupos',array('nombre'=>$curso->id),array('class'=>'btn btn-info btn-large')); }}

		        @else

		        		{{ HTML::link_to_route('participantes','Inscribir participantes', array('nombre'=>$curso->id), array('class'=>'btn btn-primary btn-large')); }}

		        @endif

		        <br/>

		    </div>

	</div>

	<div class="span3">

		</div><!--/span-->

	</div><!--/row-->

	<hr>

	<footer>

	    <p>&copy; CAPAON 2012</p>

	</footer>

	</div><!--/.fluid-container-->

@endsection