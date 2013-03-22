<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>CAPAON - Iniciar Sesion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{ HTML::style('css/bootstrap.min.css'); }}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>

    <style type="text/css">
      body {
        background: url('images/bg.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        font-family: 'Open Sans', serif;
        padding-top: 20px;
        padding-bottom: 40px;
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

      .form-signin {
        background: rgba(255,255,255,0.7);;
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
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

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li>{{ HTML::link('/', 'Inicio'); }}</li>
          <li>{{ HTML::link('mapap', 'Mapa del sitio'); }}</li>
          <li>{{ HTML::link('registro', 'Registrarse'); }}</li>
          <li>{{ HTML::link('contactar', 'Contactanos'); }}</li>
          <li>{{ HTML::link('acercap', 'Acerca'); }}</li>
        </ul>
        <h3 class="muted">CAPAON</h3>
      </div>
      <hr>
      <div id="login">
        {{ Form::open('user/login','POST',array('class'=>'form-signin')) }}
          @if (Session::has('login_errors'))
              {{ Alert::error('Datos incorrectos'); }}
          @endif
          @if (Session::has('registro_correcto'))
              {{ Alert::success('Registro correcto! Ahora puedes iniciar sesión'); }}
          @endif
          @if (Session::has('email_enviado'))
              {{ Alert::success(Session::get('email_enviado')) }}
          @endif
          @if (Session::has('contrasena_cambiada'))
              {{ Alert::success(Session::get('contrasena_cambiada')) }}
          @endif
          <h2 class="form-signin-heading">Inicia sesión</h2>
          {{ Form::text('usuario','',array('placeholder'=>'Usuario','class'=>'input-block-level','required'=>'','autofocus')) }}
          {{ Form::password('contrasena',array('placeholder'=>'Contrasena','class'=>'input-block-level','required'=>'')) }}
          {{ Form::submit('Entrar',array('class'=>'btn btn-large btn-primary')) }}
          {{ HTML::link('#','¿Olvidaste tu contraseña?', array('id'=>'recordar')); }}
        {{ Form::close() }}
      </div>
      <div id="recordar_contrasena" style="display: none">
          {{ Form::open('user/recordar','POST',array('class'=>'form-signin')) }}
          {{ Form::text('usuario','',array('placeholder'=>'Usuario','class'=>'input-block-level','required'=>'','autofocus')) }}
          {{ Form::submit('Recordar',array('class'=>'btn btn-large btn-primary')) }}
          {{ Form::close(); }}
      </div>
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
    $(document).on("ready",inicio);
    function inicio () {
      $("#recordar").on("click",transicion);
    }
    function transicion () {
      //Objeto JS/JSON
      var cambiosCSS = 
      {
        overflow: "hidden",
        margin: 0,
        padding: 0,
        width: 0,
        display: 'none',
      };

      var cambiosPerson =
      {
        display: 'initial',
      };
      $("#login").css(cambiosCSS);
      $("#recordar_contrasena").css(cambiosPerson);
    }
    </script>
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
