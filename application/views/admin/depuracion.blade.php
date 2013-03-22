@layout('templates/admin')
@section('contenido')
       <div class="span9 well">
         <div class="row-fluid">
              <h2>Depuracion de Clientes potenciales</h2>
              <p>Esta es la vista de depuracion de clientes</p>
          </div>
          <div class="row-fluid">
              <h2>Clientes Individuales potenciales</h2>
          </div>
          <div class="row-fluid">
              <table class="table" id="clientesI" width="100%">
                <thead>
                  <tr>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Direccion</th>
                    <th>E-mail</th>
                    <th>Titulo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clientesI as $cliente)
                  <tr>
                    <td>{{ $cliente->identificacion }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido_naturaleza }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->cel_fax }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->titulo }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
          <hr>
          <div class="row-fluid">
              <h2>Clientes Empresariales potenciales</h2>
          </div>
          <div class="row-fluid">
              <table class="table" id="clientesE" width="100%">
                <thead>
                  <tr>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Naturaleza</th>
                    <th>Telefono</th>
                    <th>FAX</th>
                    <th>Direccion</th>
                    <th>E-mail</th>
                    <th>Acividad Empresarial</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clientesE as $cliente)
                  <tr>
                    <td>{{ $cliente->identificacion }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido_naturaleza }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->cel_fax }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->titulo }}</td>
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
    @section('depuracion_clientes')
    {{ HTML::script('js/jquery.dataTables.min.js'); }}
    <script type="text/javascript">
        $('#clientesE, #clientesI').dataTable( {
          "oLanguage": {
            "sLengthMenu": "Mostrando _MENU_ clientes",
            "sZeroRecords": "No existen clientes",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ clientes",
            "sInfoEmpty": "No existen clientes",
            "sInfoFiltered": "(filtered from _MAX_ total records)",
            "sSearch": "Buscar",
            "sFirst": "Primero",
            "sNext": "Siguiente",
            "sLast": "Último",
            "sPrevious": "Anterior"
        }
        });
    </script>
    @endsection