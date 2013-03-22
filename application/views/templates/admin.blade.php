<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>CAPAON - Administración - {{ $titulo }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/admin/bootstrap-wysihtml5-0.0.2.css'); }}
    {{ HTML::style('css/jquery.dataTables.css'); }}
    {{ HTML::style('css/jquery-ui-1.8.18.custom.css'); }}
    {{ HTML::style('css/alertify.core.css'); }}
    {{ HTML::style('css/alertify.default.css'); }}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>    
    {{ HTML::style('fuelux/css/fuelux.min.css'); }}
    {{ HTML::style('fuelux/css/fuelux-responsive.min.css'); }}

    <style type="text/css">
      .alertify-button:hover{
        color: white;
        text-decoration: none;
      }
      body {
        background: url('/img/merely_cubed.png');
        font-family: 'Open Sans', serif;
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 0px 0;
      }
      a.alertify-button{
        color:white !important;
      }
    </style>
    {{ HTML::style('css/bootstrap-responsive.css'); }}
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">CAPAON</a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li>
                <a href="#">Hola, {{ $usuario->nombre }}</a>
              </li>
              <li>
                <a href="/logout" rel="tooltip" data-placement="bottom" data-original-title="Desconectarse"><i class="icon-off"></i></a>
              </li>
            </ul>
            <ul class="nav">
              <li class="{{ (@$activo == 'inicio') ? 'active' : ' '; }}">{{ HTML::link('admin/inicio','Inicio') }}</li>
              <li class="{{ (@$activo == 'crear' || @$activo == 'mostrar' || @$activo == 'conferencista') ? 'active' : ' '; }}">{{ HTML::link('admin/curso/mostrar','Cursos') }}</li>
              <li class="{{ (@$activo == 'institucional') ? 'active' : ' '; }}">{{ HTML::link('admin/infoempresa/','Institucional') }}</li>
              <li class="{{ (@$activo == 'clientes') ? 'active' : ' '; }}">{{ HTML::link('admin/depuracion/','Clientes') }}</li>
              <li class="{{ (@$activo == 'reportes') ? 'active' : ' '; }}">{{ HTML::link('admin/reportes/inicio','Reportes') }}</li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="sidebar-nav">
            <div class="well" style="width:300px; padding: 8px 0;">
              <ul class="nav nav-list"> 
                  <li class="nav-header">Panel de Administrador</li>        
                  <li class="{{ (@$activo == 'inicio') ? 'active' : ' '; }}">{{ HTML::link('admin/inicio','Inicio') }}</li>
                  <li class="{{ (@$activo == 'cursos') ? 'active' : ' '; }}">Gestión de cursos</li>
                  <ul class="nav nav-list"> 
                    <li class="{{ (@$activo == 'crear') ? 'active' : ' '; }}"><a href="{{ URL::base(); }}/admin/curso/crear"><i class="icon-edit"></i> Creación</a></li>
                    <li class="{{ (@$activo == 'mostrar') ? 'active' : ' '; }}"><a href="{{ URL::base(); }}/admin/curso/mostrar"><i class="icon-search"></i> Consulta y Edición</a></li>
                    <li class="{{ (@$activo == 'conferencista') ? 'active' : ' '; }}"><a href="{{ URL::base(); }}/admin/curso/conferencista"><i class="icon-plus"></i> Conferencistas</a></li>
                  </ul>
                  <li class="{{ (@$activo == 'institucional') ? 'active' : ' '; }}">{{ HTML::link('admin/infoempresa/','Gestión de Información') }}</li>
                  <li class="{{ (@$activo == 'clientes') ? 'active' : ' '; }}">{{ HTML::link('admin/depuracion/','Depuración de Clientes') }}</li>
                  <li class="{{ (@$activo == 'reportes') ? 'active' : ' '; }}">{{ HTML::link('admin/reportes/inicio','Generar Reportes') }}</li>
                  <li><i class="icon-search"></i> Buscador</li>
                  {{ Form::open('buscar','POST',array('class'=>'form-search')) }}
                  {{ Form::search('cadena','',array('class'=>'input-medium search-query','name'=>'q','placeholder'=>'Cursos')) }}
                  {{ Form::close(); }}
              </ul>
            </div>
          </div>
        </div><!--/span-->
    @yield('contenido')
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('js/jquery-1.8.2.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/bootstrap-tooltip.js'); }}
    {{ HTML::script('js/admin/wysihtml5-0.3.0_rc2.min.js'); }}
    {{ HTML::script('js/admin/bootstrap-wysihtml5-0.0.2.min.js'); }}
    {{ HTML::script('js/jquery-ui-1.8.18.custom.min.js'); }}
    {{ HTML::script('js/alertify.min.js'); }}
    <script type="text/javascript">
    $(document).ready(function(){
      $('[rel=tooltip]').tooltip();
    });
    </script>
    @yield('depuracion_clientes')
    @yield('info_empresa')
    @yield('crear_curso')
    @yield('mostrar_curso')
    @yield('conferencista')
    @yield('editar_curso')
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37053499-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </body>
</html>