      <div class="row-fluid marketing">
        <p><strong>Nombre:</strong> {{ $curso->nombre }}</p>
        <p><strong>Resumen:</strong> {{ $curso->resumen }}</p>
        <p><strong>Objetivo:</strong></br> {{ $curso->objetivo }}</p>
        <p><strong>Justificación:</strong> {{ $curso->justificacion }}</p>
        <p><strong>Contenido:</strong> {{ $curso->contenido }}</p>
        <p><strong>Conferencistas:</strong> 
        @foreach($conferencista as $profesor) 
          <ul><strong>Nombre:</strong> {{ $profesor->nombre }}
            <li>Apellido: {{ $profesor->apellido }}</li>
            <li>Titulo: {{ $profesor->titulo }}</li>
            <li>Iformacion: {{ $profesor->info_conferencista }}</li>
            <li>Enlace: {{ $profesor->enlace }}</li>
          </ul>
        @endforeach  
        </p>
        <p><strong>Ambito: </strong> {{ $curso->ambito }}</p>
        <p><strong>Fecha Inicio Inscripción: </strong> {{ $curso->inicio_ins }}</p>
        <p><strong>Fecha Fin Inscripción: </strong> {{ $curso->fin_ins }}</p>
        <p><strong>Fecha Inicio Curso: </strong> {{ $curso->inicio_curso }}</p>
        <p><strong>Fecha Fin Curso: </strong> {{ $curso->fin_curso }}</p>
        <p><strong>Cupo: </strong> {{ $curso->cupo }}</p>
        <p><strong>Estado: </strong> {{ ($curso->estado) ? "Abierto" : "Cerrado"; }}</p>
        <p><strong>Costo: </strong> {{ $curso->costo }}</p>
        <br/>
      </div>