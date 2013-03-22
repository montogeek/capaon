@layout('templates.public')
@section('contenido')
     <div class="hero">
      <h1>Curso</h1>
    </div>
      <div class="row-fluid marketing">
        <div class="well">
          <div class="accordion" id="accordion2">
            @foreach($cursos as $curso)
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle collapsed btn-info" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{ $curso->id }}">
                    {{ $curso->nombre }}
                    </a>
                  </div>
                  <div id="collapse{{ $curso->id }}" class="accordion-body collapse" style="height: 0px; ">
                    <div class="accordion-inner">
                      {{ $curso->resumen }}
                      {{ HTML::link('curso/'.$curso->id,'Ver más') }}
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection
@section('cursos')
{{ HTML::script('js/bootstrap-collapse.js'); }}
@endsection