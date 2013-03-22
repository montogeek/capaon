@layout('templates.'.$tipo)
@section('contenido')
     <div class="span7 well">
          <div class="hero">
             <h1>Mapa del sitio</h1>
         </div>
          <div class = 'well'>
               <ul>
                    <li>{{ HTML::link('/', 'Inicio') }}</li>
                    <ul>
                         <li>
                              @if($tipo == 'public')
                              {{ HTML::link('cursos', 'Cursos') }}
                              @endif
                              @if($tipo == 'cliente')
                              {{ HTML::link('cliente/cursos', 'Cursos') }}
                              @endif
                         </li>
                         <li>{{ HTML::link('login', 'Entrar') }}</li>
                         <li>{{ HTML::link('registro', 'Registro') }}</li>
                    </ul>        
                    <li>
                         @if($tipo == 'public')
                         {{ HTML::link('acercap', 'Acerca') }}
                         @endif
                         @if($tipo == 'cliente')
                         {{ HTML::link('acercac', 'Acerca') }}
                         @endif
                    </li>
                    <li>{{ HTML::link('contactar', 'Contactenos') }}</li>
               </ul>
          </div>
     </div>
          </div><!--row-fluid-->
     </dic><!--container-fluid-->
@endsection