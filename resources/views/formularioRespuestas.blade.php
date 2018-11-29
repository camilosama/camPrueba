<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- { { remplaza echo }} -->
        <title>{{ $title }}  </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="jumbotron">
            <p class="lead">
                <div class="container">
                    <h3>LISTA DE RESPUESTAS EN LOS FORMATOS ACTIVOS</h3>
                    <hr class="my-4">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Nombre_Formato</th>
                                <th scope="col">Fecha_Respuesta</th>
                                <th scope="col">Funcionario_Responde</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($respuestas as $data)
                            <tr>
                                <th scope="row">{{ $data->nombreFormato }}</th>
                                <td>{{ $data->fechaRespuesta }}</td>
                                <td>{{ $data->funcionarioResponde }}</td>
                                <td>{{ $data->pregunta }}</td>
                                <td>{{ $data->respuesta }}</td>
                            </tr>     
                        @endforeach
                        </tbody>
                    </table>
                    <hr class="my-4">
                    <a href="{{url('/')}}">Regresar al menu de formatos </a>
                </div>
            </p>
        </div>
    </body>
</html>
