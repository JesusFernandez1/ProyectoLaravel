<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>

   @extends('base_usuarios')

   @section('mostrarUsuarios')

   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($usuarios as $usuario)
         <tr>
            <td>{{$usuario['usuario_id']}}</td>
            <td>{{$usuario['nombre']}}</td>
            <td>{{$usuario['apellido']}}</td>
            <td>{{$usuario['correo']}}</td>
            <td>{{$usuario['tipo']}}</td>
            <td><a href="index.php?controller=login&action=verOneUsuario&id={{$usuario['usuario_id']}}" class="btn btn-outline-primary" role="button">Modificar</a> <a href="index.php?controller=login&action=verBorrarUsuario&id={{$usuario['usuario_id']}}" class="btn btn-outline-danger" role="button">Eliminar</a></td>
         </tr>
         @endforeach
      </tbody>
   </table>
   @endsection
</body>
</html>