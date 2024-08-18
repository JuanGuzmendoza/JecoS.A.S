<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 text-center">
                <h1>Bienvenidaa!</h1>
                <p>Este es un ejemplo de página</p>
                <?php
                $mes = date('m');
                $año = date('Y');
                ?>
                {{$mes}}
                {{{$año}}}
                <a href="{{route('ver_año',['mes'=>1,'año'=>$año=2024])}}" class="btn btn-secondary">Empezar</a>
            </div>
        </div>
    </div>
</body>
</html>
