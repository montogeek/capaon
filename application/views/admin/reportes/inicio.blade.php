@layout('templates/admin')
@section('contenido')
      <div class="span6 well">
        <div class="row-fluid">
          <h2>Reportes</h2>
          <p>Acá puedes generar reportes.</p>
          <div class="span12">{{ HTML::link('admin/reportes/inicio/reportecursos','Reporte de Cursos') }}</div>
          <div class="span12">{{ HTML::link('admin/reportes/inicio/reportematriculados/','Reporte de Clientes matriculados por curso') }}</div>
          <h2>Reporte de Informacion detallada por curso</h2>
          <table class="table" id="cursos" width="100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Generar</th>
              </tr>
            <thead>
            <tbody>
              @foreach($cursos as $curso)
              <tr>
                <td>{{ $curso->nombre }}</td>
                <td>{{ HTML::link('admin/reportes/inicio/cursodetallado/'.$curso->id, 'Generar', array('class' => 'btn'));}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
        </div><!--/span-->
      </div><!--/row-->
      <hr>
      <footer>
        <p>&copy; CAPAON 2012</p>
      </footer>
    </div><!--/.fluid-container-->
@endsection