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
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Cuenta</th>
            <th scope="col">Pais</th>
            <th scope="col">Moneda</th>
            <th scope="col">Importe</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($clientes as $cliente)
         <tr>
            <td>{{$cliente->DNI}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->correo}}</td>
            <td>{{$cliente->cuenta}}</td>
            <td>{{$cliente->pais}}</td>
            <td>{{$cliente->moneda}}</td>
            <td>{{$cliente->importe_mensual}}</td>
            <td><a href="{{ route('cuotas.show',$cliente) }}" class="btn btn-outline-success" role="button">Ver cuotas</a> 
               <a href="{{ route('clientes.edit',$cliente)}}" class="btn btn-outline-primary" role="button">Modificar</a> 
               <a href="{{ route('clientes.show',$cliente)}}" class="btn btn-outline-danger" role="button">Eliminar</a></td>
         </tr>
         @endforeach
      </tbody>
   </table>
   {!! $clientes->links() !!}
   @endsection
</body>
</html>