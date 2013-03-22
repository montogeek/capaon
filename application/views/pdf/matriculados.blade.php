<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="row-fluid marketing">
      <h1>Clientes Matriculados</h1>
            @foreach ($data as $elcurso)
                <h2>Curso - {{ $elcurso[0]->nombre }}</h2>
                <h3>Matriculados</h3>
                <table>
                @foreach($elcurso[1] as $matriculados)
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <th>Identificacion</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                        </tr>
                    @foreach($matriculados as $matriculado)
                        <tr>
                            <th>{{  $matriculado->nombre }} </th>
                            <th>{{  $matriculado->identificacion  }} </th>
                            <th>{{  $matriculado->direccion  }} </th>
                            <th>{{  $matriculado->telefono }} </th>
                        </tr>
                    @endforeach
                    <tbody>
                @endforeach
                </table>
            </br>
            @endforeach
        </div>
</body>
</html>
      