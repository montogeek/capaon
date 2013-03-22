@layout('templates.cliente')

@section('contenido')

	        <div class="span6 well">

		        <div class="row-fluid">

		            <h2>Bienvenido {{ $usuario->nombre; }}! </h2>
		            <p>
		            	Esta es tu página de inicio en nuestra plataforma.<br/>
		            	Acá puedes ver tus cursos inscritos o descubrir nuevos y disfrutar de ellos.<br/>
		            	¡Diviértete! :)
		            </p>
		              @if (Session::has('correcto'))

		                {{ Alert::success("¡Curso agregado correctamente!.") }}

		              @endif

		              @if(Session::has('correctos'))

		              	{ Alert::success("¡".Session::get('valor')." agregado acorrectamente!.")}}

		              @endif

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