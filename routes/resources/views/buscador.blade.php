<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<!-- vista donde ponemos los buscadores para encontrar una tarea con una serie de filtros -->

<body>
    @extends('base')
    @section('mostrarExtension')
    <form action="" method="POST">
        <label for="inputState" class="form-label">Nombre:</label>
        <input type="text" class="form-control form-control-dark" placeholder="Search..." name="nombre">
        <label for="inputState" class="form-label">Estado:</label>
        <input type="text" class="form-control form-control-dark" placeholder="Search..." name="estado">
        <label for="inputState" class="form-label">Operario:</label>
        <input type="text" class="form-control form-control-dark" placeholder="Search..." name="operario">
        <input type="submit" class="btn btn-primary" value="Insert">
    </form>
    <p>{!!$error->ErrorFormateado("tarea")!!}</p> <!-- si el usuario o pass son incorrectos, sale un mensaje de error -->
    @endsection
</body>

</html>