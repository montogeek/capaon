@layout('templates.admin')
@section('contenido')
        <div class="span9 well">
          <div class="row-fluid">
              <h2>Gestión Cursos</h2>
              @if (Session::has('correcto'))
                {{ Alert::success("¡Curso ".Session::get('valor')." correctamente!.") }}
              @endif
          </div>
          <div class="row-fluid fuelux">
            <table id="ejemplo" class="table table-bordered datagrid">
              <thead>
                <tr>
                  <th>
                    <span class="datagrid-header-title"></span>
                    <div class="datagrid-header-left">
                    </div>
                    <div class="datagrid-header-right">
                      <div class="input-append search">
                        <input type="text" class="input-medium" placeholder="Buscar"><button class="btn"><i class="icon-search"></i></button>
                      </div>
                    </div>
                  </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>
                    <div class="datagrid-footer-left" style="display:none;">
                      <div class="grid-controls">
                        <span><span class="grid-start"></span> - <span class="grid-end"></span> de <span class="grid-count"></span></span>
                        <select class="grid-pagesize"><option>5</option><option>15</option><option>30</option><option>50</option></select>
                        <span>Por Página</span>
                      </div>
                    </div>
                    <div class="datagrid-footer-right" style="display:none;">
                      <div class="grid-pager">
                        <button class="btn grid-prevpage"><i class="icon-chevron-left"></i></button>
                        <span>Página</span>
                        <div class="input-append dropdown combobox">
                          <input class="span1" type="text"><button class="btn" data-toggle="dropdown"><i class="caret"></i></button>
                          <ul class="dropdown-menu"></ul>
                        </div>
                        <span>de <span class="grid-pages"></span></span>
                        <button class="btn grid-nextpage"><i class="icon-chevron-right"></i></button>
                      </div>
                    </div>
                  </th>
                </tr>
              </tfoot>
            </table>
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

@section('mostrar_curso')
{{ HTML::script('fuelux/underscore.min.js'); }}
{{ HTML::script('fuelux/datasource.js'); }}
{{ HTML::script('fuelux/loader.min.js'); }}
  <script type="text/javascript">
  $(function() {
    request = $.ajax({
                    url: '{{ URL::to('admin/curso/mostrarjson'); }}',
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                      dataSource = new StaticDataSource({
                                columns: [{
                                        property: 'nombre',
                                        label: 'Nombre',
                                        sortable: true
                                    }, {
                                        property: 'resumen',
                                        label: 'Resumen',
                                        sortable: true
                                    }, {
                                        property: 'ambito',
                                        label: 'Ámbito',
                                        sortable: true
                                    }, {
                                        property: 'inicio_ins',
                                        label: 'Inicio Inscripción',
                                        sortable: true
                                    }, {
                                        property: 'fin_ins',
                                        label: 'Fin Inscripción',
                                        sortable: true
                                    }, {
                                        property: 'inicio_curso',
                                        label: 'Inicio Curso',
                                        sortable: true
                                    }, {
                                        property: 'fin_curso',
                                        label: 'Fin Curso',
                                        sortable: true
                                    }, {
                                        property: 'est',
                                        label: 'Estado',
                                        sortable: true
                                    }, {
                                        property: 'cupo',
                                        label: 'Cupo',
                                        sortable: true
                                    }, {
                                        property: 'costo',
                                        label: 'Costo',
                                        sortable: true
                                    }, {
                                        property: 'acciones',
                                        label: 'Acciones',
                                        sortable: true
                                    }],
                                data: data,
                                delay: 250
                                });
                                $('#ejemplo').datagrid({
                                  dataSource: dataSource,
                                });
                                $('#ejemplo').bind('loaded',function (e) {
                                  $(".eliminar").css('color','red');
                                  $(".eliminar").click(function(e) {
                                    e.preventDefault();
                                    var href = $(this).attr('href');
                                    alertify.set({ labels: { ok: "Si", cancel: "Cancelar" } });
                                    alertify.confirm( "¿Seguro que deseas eliminar el curso?", function (e) {
                                      if (e) {
                                          window.location = href;
                                      } else {
                                          console.log('Hola!!!!! :P :P');
                                      }
                                    });
                                  });
                                });
                              },
                  });
  });
  </script>
@endsection