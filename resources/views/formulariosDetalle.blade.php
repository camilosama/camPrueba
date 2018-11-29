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
                    <h3>LISTA DE FORMATOS ACTIVOS</h3>
                    <hr class="my-4">
                    <form method="post" name="frmRrgistrarRes" action="{{ url("/registroRespuesta") }}">
                        {{ csrf_field() }}
                        @php
                            $i=0;
                        @endphp
                        @foreach ($preguntas as $data)
                        @php
                            $i++;
                        @endphp
                
                            <label>{{ $data->pregunta }}</label>
                            <input type="hidden" name="idPregunta{{ $data->idPregunta}}" value="{{ $data->idPregunta }}" class="form-control">
                            <input type="hidden" name="idFormato" value="{{ $data->idFormato }}" class="form-control">
                            <input type="text" name="respuesta{{ $data->idPregunta}}" class="form-control">
                            
                        @endforeach
                         <input type="hidden" name="recorrido" value="{{ $i }}" class="form-control">
     
                        <br>
                        <input type="submit" name="enviar registro">
                    </form>
                    
                    <hr class="my-4">
                    <a href="{{url('/')}}">Regresar al menu de formatos </a>
                </div>
            </p>
        </div>
    </body>
</html>
