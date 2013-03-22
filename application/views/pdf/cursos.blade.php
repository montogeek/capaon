<html>
<head>
	<title>Resumen Cursos Abiertos</title>
</head>
<body>
	<div class="row-fluid marketing">
      <h1>Cursos Abiertos</h1>
            @foreach($cursos as $curso)
                    <h2>{{ $curso->nombre }}</h2>
                    <p>Resumen: {{ $curso->resumen }}</p>
                      <hr>
            @endforeach
        </div>
</body>
</html>
      
      