<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">

    <title>CAPAON - {{ $titulo }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">



    <!-- Le styles -->

    {{ HTML::style('css/bootstrap.min.css'); }}

    {{ HTML::style('css/admin/bootstrap-wysihtml5-0.0.2.css') }}

    {{ HTML::style('css/bootstrap-modal.css') }}

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>    

    <style type="text/css">

      body {
        background: url('/images/bg.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

        font-family: 'Open Sans', serif;

        padding-top: 20px;

        padding-bottom: 40px;

      }

      .well{
        background: rgba(255,255,255,0.8) !important;
      }
      .masthead ul{
        background-color: #fff;
        border-radius: 5px;
        color: #000;
      }

      /* Custom container */

      .container-narrow {

        margin: 0 auto;

        max-width: 700px;

      }

      .container-narrow > hr {

        margin: 30px 0;

      }



      /* Main marketing message and sign up button */

      .jumbotron {

        margin: 20px 0;

        text-align: center;

      }

      .jumbotron h1 {

        font-size: 72px;

        line-height: 1;

      }

      .jumbotron .btn {

        font-size: 21px;

        padding: 14px 24px;

      }



      /* Supporting marketing content */

      .marketing {

        margin: 20px 0;

      }

      .marketing p + h4 {

        margin-top: 28px;

      }

    </style>

    {{ HTML::style('css/bootstrap-responsive.css'); }}

    {{ HTML::style('fonts/style.css'); }}



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



    <div class="container-narrow">



      <div class="masthead">

        <ul class="nav nav-pills pull-right">

          <li class="{{ (@$activo == 'inicio') ? 'active' : ' '; }}">{{ HTML::link('/', 'Inicio'); }}</li>

          <li class="{{ (@$activo == 'mapa') ? 'active' : ' '; }}">{{ HTML::link('mapap','Mapa del sitio'); }}</li>

          <li class="{{ (@$activo == 'registro') ? 'active' : ' '; }}">{{ HTML::link('registro', 'Registrarse'); }}</li>

          <li class="{{ (@$activo == 'contactenos') ? 'active' : ' '; }}">{{ HTML::link('contactar', 'Contáctanos'); }}</li>

          <li class="{{ (@$activo == 'acerca') ? 'active' : ' '; }}">{{ HTML::link('acercap', 'Acerca'); }}</li>

        </ul>

        <h3 class="muted">CAPAON</h3>

      </div>



      <hr>

      

      @yield('contenido')

        

      <hr>



      <div class="footer">

        <p>&copy; CAPAON 2012</p>

      </div>



    </div> <!-- /container -->



    <!-- Le javascript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

    {{ HTML::script('js/jquery-1.8.2.min.js'); }}

    {{ HTML::script('js/bootstrap.min.js'); }}
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

    @yield('contactenos')

    @yield('cursos')

    @yield('registro')

    @yield('busqueda')

  </body>

</html>  