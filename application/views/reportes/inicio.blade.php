<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>CAPAON - Principal Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/admin/bootstrap-wysihtml5-0.0.2.css'); }}
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
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
          <a class="brand" href="#">CAPAON</a>
          <div class="nav-collapse collapse">
            <div class="pull-right">
                  <ul class="nav pull-right">
                      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hola, {{ $usuario->nombre }}<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="/user/preferences"><i class="icon-cog"></i> Perfil</a></li>
                              <li class="divider"></li>
                              <li><a href="{{URL::base() }}/admin/admin/logout"><i class="icon-off"></i> Salir</a></li>
                          </ul>
                      </li>
                  </ul>
            </div>
            <ul class="nav">
              <li class="active"><a href="admin"><i class="icon-home icon-black"></i>Inicio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
        </div><!--/span-->
        <div class="span6">
          <div class="row-fluid">
              <h2>Administración</h2>
              <p>Acá puedes editar la información de la plataforma.</p>
          </div>
            <div class="well">
              <div class="span6">{{ HTML::link('admin/curso/','Cursos') }} </div>
              <div class="span6">Aqui prodra crear, listar, modificar y eliminar todos los cursos ofrecido por la empresa CI</div>
            </div>
          
            <div class="well">
              <div class="span6">{{ HTML::link('admin/infoempresa/','Informacion') }} </div>
              <div class="span6">Aqui se prodra editar la informacion importante de la empresa como es Su Mision, Vision, Descripcion y Correo.</div>
            </div>
                    
            <div class="well">
              <div class="span6">{{ HTML::link('admin/depuracion/','Depuración Potenciales') }}</div>
              <div class="span6">Descripción</div>
            </div>
                    
            <div class="well">
              <div class="span6">Generar Reportes</div>
              <div class="span6">Descripción</div>
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

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/admin/wysihtml5-0.3.0_rc2.min.js'); }}
    {{ HTML::script('js/admin/bootstrap-wysihtml5-0.0.2.min.js'); }}
    <script type="text/javascript">
        $('#mision').wysihtml5();
        $('#vision').wysihtml5();
        $('#quienes_somos').wysihtml5();
    </script>
  </body>
</html>
