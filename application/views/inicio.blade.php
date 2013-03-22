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
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <style type="text/css">
      body {
        font-family: 'Open Sans', serif;
        padding-top: 20px;
        padding-bottom: 40px;
        background: url('images/bg.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      .masthead{
        background-color: #fff;
        border-radius: 5px;
        color: #000;
      }

      .masthead ul li a{
        color: black;
      }
      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 800px;
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
        border-radius: 5px;
        text-shadow:#D9D4D4 1px 1px 5px;
        font-family: 'Abel', serif;
        background: rgba(0,0,0,0.2);
        padding: 40px 10px 120px 20px;
        font-size: 92px;
        line-height: 1;
        color: #fff;
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

      .lead{
        border-radius: 5px;
        background: rgba(0,0,0,0.4);
        color: #fff;
        line-height: 1;
        padding: 40px 20px;
      }
      .kol{
        border-radius: 5px;
        /*background: rgba(0,0,0,0.3);*/
        color: #fff;
        font-family: 'Abel', serif;
        font-size: 52px;
        font-weight: bold;
        line-height: 1;
        padding: 20px 10px;
      }

      .login{
        border-radius: 5px;
        transition: all 0.5s linear;
        margin: 0px 16px 0px 0px;
        padding: 4px 10px;
        text-shadow:#D9D4D4 1px 1px 5px;
        text-decoration: none;
        color:#fff;
      }
      .registro{
        border-radius: 5px;
        transition: all 0.5s linear;
        padding: 4px 10px;
        margin: 0px 16px 0px 0px;
        text-shadow:#D9D4D4 1px 1px 5px;
        text-decoration: none;
        color:#fff;
      }
      .cursos{
        border-radius: 5px;
        transition: all 0.5s linear;
        padding: 4px 10px;
        margin: 0px 16px 0px 0px;
        text-shadow:#D9D4D4 1px 1px 5px;
        text-decoration: none;
        color:#fff;
      }

      .kol a:hover{
        background: rgba(255,255,255,1);
        color:#08C;
        text-decoration: none;
      }
      .form-search{
        margin: 10px 10px 0px 10px;
        padding: 20px 0px;
      }
      .buscador-form{
        width: 700px;
      }

      .mhw{
        border-radius: 5px;
        background: rgba(0,0,0,0.3);
      }
      .social{
        border-radius: 5px;
        width:40px;
        height:100px;
        padding: 10px 5px;
        position:fixed;
        top:320px;
        right:0;
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
      <div class="navegacion">
        <ul class="nav nav-pills pull-right masthead">
          <li class="{{ (@$activo == 'mapa') ? 'active' : ' '; }}">{{ HTML::link('mapap','Mapa del sitio'); }}</li>
          <li class="{{ (@$activo == 'registro') ? 'active' : ' '; }}">{{ HTML::link('registro', 'Registrarse'); }}</li>
          <li class="{{ (@$activo == 'contactenos') ? 'active' : ' '; }}">{{ HTML::link('contactar', 'Contáctanos'); }}</li>
          <li class="{{ (@$activo == 'acerca') ? 'active' : ' '; }}">{{ HTML::link('acercap', 'Acerca'); }}</li>
        </ul>
      </div>
      <br/>
      <div class="jumbotron">
        <h1>Bienvenido a CAPAON</h1>
        <p class="lead">
          Cursos para ti o tu empresa en una plataforma rápida, segura y confiable.<br/>
          Bellamente funcional, increíblemente fácil de usar.
        </p>
        <div class="mhw">
          <div class="kol">
            {{ HTML::link('login', 'Entrar', array('class' => 'login')); }}</li>
            {{ HTML::link('registro', 'Registrarse', array('class' => 'registro')); }}</li>
            {{ HTML::link('cursos', 'Cursos', array('class' => 'cursos')); }}</li>
          </div>
          <div class="buscador">
            {{ Form::open('buscar','POST',array('class'=>'form-search')) }}
            {{ Form::search('cadena','',array('class'=>'buscador-form search-query','name'=>'q','placeholder'=>'Buscar Cursos','required')) }}
            {{ Form::close(); }}
          </div>
        </div>
      </div>
    </div> <!-- /container -->
    <div class="social">
        <a target="_blank" href="https://www.facebook.com/ccapaoni"><img src="img/icon-facebook.png" alt="placeholder+image"></a>
        <a target="_blank" href="https://twitter.com/ccapaoni"><img src="img/icon-twitter.png" alt="placeholder+image"></a>
        <a target="_blank" href="http://co.linkedin.com/pub/capaon-ci/62/87/738"><img src="img/icon-linkedin.png" alt="placeholder+image"></a
    </div>
    {{ HTML::script('js/jquery-1.8.2.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/prefixfree.min.js'); }}
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