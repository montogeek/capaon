@layout('templates.public')
@section('contenido')

      <div class="hero">
        <h1>{{ $curso->nombre }}</h1>
      </div>

      <hr>

      <div class="row-fluid marketing">
        <div class="well">
          <p><strong>Resumen</strong> {{ $curso->resumen }}</p>
          <p><strong>Objetivo</strong> {{ $curso->objetivo }}</p>
          <p><strong>Justificación</strong> {{ $curso->justificacion }}</p>
          <p><strong>Contenido</strong> {{ $curso->contenido }}</p>
          <p><strong>Conferencistas</strong> 
          @foreach($conferencista as $profesor) 
            <ul><b>{{ $profesor->nombre }}
               {{ $profesor->apellido }} </b>
              <li><b>Título: </b> {{ $profesor->titulo }}</li>
              <li><b>Información: </b> {{ $profesor->info_conferencista }}</li>
              <li>{{ HTML::link($profesor->enlace, 'Sitio Web'); }}</li>
            </ul>
          @endforeach  
          </p>
          <p><strong>Ambito</strong> {{ $curso->ambito }}</p>
          <p><strong>Fecha Inicio Inscripción</strong> {{ $curso->inicio_ins }}</p>
          <p><strong>Fecha Fin Inscripción</strong> {{ $curso->fin_ins }}</p>
          <p><strong>Fecha Inicio Curso</strong> {{ $curso->inicio_curso }}</p>
          <p><strong>Fecha Fin Curso</strong> {{ $curso->fin_curso }}</p>
          <p><strong>Cupo</strong> {{ $curso->cupo }}</p>
          <p><strong>Estado</strong> {{($curso->estado) ? "Abierto" : "Cerrado"; }}</p>
          <p><strong>Costo</strong> ${{ $curso->costo }}</p>
          <br/>
        </div>
      </div>
    <hr>
@endsection