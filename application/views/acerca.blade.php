@layout('templates.'.$tipo)
@section('contenido')
    <div class='span7'>
      <div class="row-fluid marketing">
        @foreach ($informacion as $info)
          <div class="well">
            <h2 class="muted">¿Quiénes somos?</h2>
            <hr>
            <p style="text-align: justify">{{ $info->quien }}</p>
            <hr>
          </div>
        
          <div class="well">
            <h2 class="text-warning">Misión</h2>
            <hr>
            <p style="text-align: justify">{{ $info->mision }}</p>
            <hr>
          </div>
        
          <div class="well">
            <h2 class="text-info">Visión</h2>
            <hr>
            <p style="text-align: justify">{{ $info->vision }}</p>
            <hr>
          </div>
        @endforeach  
      </div>
    </div>
@endsection