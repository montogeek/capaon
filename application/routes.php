<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/
// Ruta base del proyecto.
Route::get('/', function()
{
	//$curso = Conferencista::find(1)->cursos()->get();
	//$curso = Curso::find(2)->conferencista()->get();
	//var_dump($curso);
	return View::make('inicio')->with('titulo','Inicio')->with('activo','inicio');
});

// Carga la información institucional para usuarios no logueados.
Route::get('acerca', function()
{
	$informacion = InfoEmpresa::all();
	return View::make('acerca')->with('informacion',$informacion)->with('titulo','Acerca')->with('activo','acerca');
});

// Enviar informacion a la empresa
Route::get('contactar', function()
{
	//$informacion = InfoEmpresa::all();
	return View::make('contactar')->with('titulo','Contáctenos')->with('activo','contactenos');//;->with('informacion',$informacion);
});

// Carga el formulario de inicio de sesión.
Route::get('login', array('before' => 'logueado', 'do' => function()
{
	return View::make('login')->with('titulo','Iniciar sesión');
}));

// Carga la vista de los cursos para usuarios no logueados.
Route::get('cursos', function()
{
	$cursos = Curso::all();
	return View::make('cursos')->with('cursos',$cursos)->with('titulo','Cursos');
});

// Carga la vista detallada de un curso. Usuario no logueados
// dependiendo del Id enviado.
Route::get('curso/(:num)',array('do' => function($id){
	$info_curso = Curso::find($id);
	$conferencista = Curso::find($id)->conferencista()->get();
	return View::make('mascursos')->with('curso',$info_curso)->with('conferencista',$conferencista)->with('titulo',$info_curso->nombre);
}));

/**
 * Carga la vista de Registro Individual
 */
Route::get('registro/individual', function()
{
	return View::make('registro.individual')->with('titulo','Registro Individual')->with('activo','registro');
});

/**
 * Carga la vista de Registro Empresarial
 */
Route::get('registro/empresarial', function()
{
	return View::make('registro.empresarial')->with('titulo','Registro Empresarial')->with('activo','registro');
});

//Ruta para matricular un cliente.
Route::get('cliente/matricular/',array('as' => 'matricular', 'uses' => 'cliente.inicio@matricular'));

//Ruta para inscribir un cliente individual.
Route::get('cliente/inscripcion/(:num)',array('as' => 'inscripcion', 'uses' => 'cliente.individual@inscripcion'));

//Cliente para enviar una petición individual
Route::get('cliente/cursos/peticion/(:num)',array('as' => 'cupo', 'uses' => 'cliente.individual@peticion'));

//Ruta para inscribir participantes de un cliente empresarial.
Route::get('cliente/participantes/(:num)',array('as' => 'participantes', 'uses' => 'cliente.empresarial@inscripciones'));

//Ruta para pedir cupos de un cliente empresarial.
Route::get('cliente/cursos/detallado/(:num)/cupo',array('as' => 'cupo_empresarial', 'uses' => 'cliente.empresarial@peticiones'));

//Salir de la aplicación.
Route::get('logout',function()
{
	Auth::logout();
	return Redirect::to('/');
});

//Ruta cuando nos tratan de hackear. IN YOUR FACE!
Route::get('hack',function()
{
	return View::make('hack')->with('titulo','Te cogí!');
});

Route::post('buscar', function()
{
	$cadena = Input::get('q');
	$cursos = Curso::where('nombre','LIKE','%'.$cadena.'%')
					->or_where('resumen','LIKE','%'.$cadena.'%')
					->or_where('objetivo','LIKE','%'.$cadena.'%')
					->or_where('justificacion','LIKE','%'.$cadena.'%')
					->or_where('contenido','LIKE','%'.$cadena.'%')
					->or_where('ambito','LIKE','%'.$cadena.'%')
					->get();
	$conferencistas = array();
	foreach ($cursos as $curso) {
		$conferencistas[$curso->id] = Curso::find($curso->id)->conferencista()->get();
	}
	return View::make('busqueda')
				->with('resultados',$cursos)
				->with('titulo','Resultados de la búsqueda para '.$cadena)
				->with('conferencista',$conferencistas)
				->with('cadena',$cadena);
});

Route::get('mapap', function()
{
	$datos = array(
		'tipo' => 'public',
		'titulo' => 'Mapa del Sitio',
		'activo' => 'mapa'
		);
	return View::make('msitio', $datos);	
});


/**
 * Carga la vista del mapa del sitio
 */
Route::get('mapac',array('before' => 'cliente', 'do' => function()
{
	$usuario = Cliente::find(@Auth::user()->id_cliente);
	$datos = array(
		'tipo' => 'cliente',
		'titulo' => 'Mapa del Sitio',
		'usuario' => $usuario
		);
	return View::make('msitio', $datos);	
}));

// Carga la información institucional para usuarios no logueados.
Route::get('acercap', function()
{
	$informacion = InfoEmpresa::all();
	return View::make('acerca')->with('informacion',$informacion)->with('titulo','Acerca')->with('activo','acerca')->with('tipo', 'public');
});

Route::get('acercac', array('before' => 'cliente', 'do' => function()
{
	
	$usuario = Cliente::find(@Auth::user()->id_cliente);
	$informacion = InfoEmpresa::all();
	return View::make('acerca')->with('informacion',$informacion)
			->with('titulo','Acerca')
			->with('activo','acerca')
			->with('tipo', 'cliente')
			->with('usuario', $usuario);
}));


//Registro de rutas para los controladores.
Route::controller('user');
Route::controller('curso');
Route::controller('registro');
Route::controller('contactar');
Route::controller('conferencistas');

Route::controller('admin.infoempresa');
Route::controller('admin.inicio');
Route::controller('admin.depuracion');
Route::controller('admin.curso');
Route::controller('admin.reportes.inicio');

Route::controller('cliente.inicio');
Route::controller('cliente.cursos');
Route::controller('cliente.individual');
Route::controller('cliente.empresarial');

Route::get('recordar/(:all)',array('do'=>function($codigo)
{
	$usuario = User::where('recordar','=',$codigo)->get();
	if($usuario == null)
	{
		return Redirect::to('hack');
	}
	else
	{
		return View::make('recordar_contrasena')
					->with('usuario',$usuario)
					->with('titulo','Restablecer contraseña')
					->with('codigo',$codigo);
	}
}));

Route::get('notify',function()
{
	Laravel\CLI\Command::run(array('notify'));
});

Route::get('sesion',function()
{
	dd(Session::age());
});
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('/');
});

Route::filter('logueado', function()
{
	if (@Auth::check())
	{
		if(@Auth::user()->id_tipo_usuario == 1) 
		{
			return Redirect::to('admin/inicio');
		}
		else
		{
			return Redirect::to('cliente/inicio');
		}
	}
});

Route::filter('cliente',function()
{
	if(!(@Auth::user()->id_tipo_usuario == 2 || @Auth::user()->id_tipo_usuario == 3)) return Redirect::to('hack');
});

Route::filter('individual', function()
{
	if(!(@Auth::check() && (@Auth::user()->id_tipo_usuario == 2))) return Redirect::to('hack');
});

Route::filter('empresarial', function()
{
	if(!(@Auth::check() && (@Auth::user()->id_tipo_usuario == 3))) return Redirect::to('hack');
});

Route::filter('administrador',function()
{
	if(!(@Auth::check() && (@Auth::user()->id_tipo_usuario == 1))) return Redirect::to('hack');
});