<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>
   @extends('base')

   @section('mostrarExtension')

   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Poblacion</th>
            <th scope="col">Codigo postal</th>
            <th scope="col">Provincia</th>
            <th scope="col">Creacion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Estado</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($tareas as $tarea)
         <tr>
            <td>{{$tarea->nombre}}</td>
            <td>{{$tarea->apellido}}</td>
            <td>{{$tarea->poblacion}}</td>
            <td>{{$tarea->codigo_postal}}</td>
            <td>{{$tarea->provincia}}</td>
            <td>{{$tarea->fecha_creacion}}</td>
            <td>{{$tarea->telefono}}</td>
            <td>{{$tarea->estado_tarea}}</td>
            <td><a href="{{ route('tareas.edit',$tarea) }}" class="btn btn-outline-primary" role="button">Modificar</a> <a href="{{ route('tareas.show',$tarea) }}" class="btn btn-outline-danger" role="button">Eliminar</a>
               <a href="{{ route('tareas.completarTarea',$tarea) }}" class="btn btn-outline-success" role="button">Completar</a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
   {!! $tareas->links() !!}
   @endsection
</body>
</html>