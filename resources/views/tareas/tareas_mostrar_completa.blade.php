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
            <th scope="col">ID</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Correo</th>
            <th scope="col">Direccion</th>
            <th scope="col">Poblacion</th>
            <th scope="col">Codigo postal</th>
            <th scope="col">Provincia</th>
            <th scope="col">Estado</th>
            <th scope="col">Creacion</th>
            <th scope="col">Operario</th>
            <th scope="col">Finalizacion</th>
            <th scope="col">Anotacion inicial</th>
            <th scope="col">Anotacion inicial</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($tareas as $tarea)
         <tr>
            <td>{{$tarea['tarea_id']}}</td>
            <td>{{$tarea['DNI']}}</td>
            <td>{{$tarea['nombre']}}</td>
            <td>{{$tarea['apellido']}}</td>
            <td>{{$tarea['telefono']}}</td>
            <td>{{$tarea['descripcion']}}</td>
            <td>{{$tarea['correo']}}</td>
            <td>{{$tarea['direccion']}}</td>
            <td>{{$tarea['poblacion']}}</td>
            <td>{{$tarea['codigo_postal']}}</td>
            <td>{{$tarea['provincia']}}</td>
            <td>{{$tarea['estado_tarea']}}</td>
            <td>{{$tarea['fecha_creacion']}}</td>
            <td>{{$tarea['operario_id']}}</td>
            <td>{{$tarea['fecha_final']}}</td>
            <td>{{$tarea['anotacion_inicio']}}</td>
            <td>{{$tarea['anotacion_final']}}</td>
            
            <td><a href="index.php?controller=tareas&action=ModificarUnaTarea&id={{$tarea['tarea_id']}}" class="btn btn-outline-primary" role="button">Modificar</a> <a href="index.php?controller=tareas&action=delete&id={{$tarea['tarea_id']}}" class="btn btn-outline-danger" role="button">Eliminar</a>
            <a href="index.php?controller=tareas&action=completar&id={{$tarea['tarea_id']}}" class="btn btn-outline-success" role="button">Completar</a></td>
         </tr>
         @endforeach
      </tbody>
   </table>
   <style>
      nav {
         position: absolute;
         left: -20;
      }
   </style>
   <nav aria-label="Page navigation example">
      <ul class="pagination">
         <li class="page-item"><a class="page-link" href="index.php?controller=tareas&action=verCompletaPaginacion&pagina={{$pagina-1}}">Anterior</a></li>
         @for ($i = 1; $i <= $paginas; $i++) <li class="page-item"><a class="page-link" href="index.php?controller=tareas&action=verCompletaPaginacion&pagina={{$i}}">{{$i}}</a></li>
            @endfor
            <li class="page-item"><a class="page-link" href="index.php?controller=tareas&action=verCompletaPaginacion&pagina={{$pagina+1}}">Siguiente</a></li>
      </ul>
   </nav>
   @endsection
</body>
</html>