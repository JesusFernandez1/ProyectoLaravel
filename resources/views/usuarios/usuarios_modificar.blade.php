<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
@extends('base_usuarios')

@section('mostrarUsuarios')
  <form action="" class="row g-3" method="POST">
  @foreach ($usuarios as $usuario)
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">DNI</label>
    <input type="text" class="form-control" name="DNI" value="{{$usuario['DNI']}}">{!!$error->ErrorFormateado("DNI")!!}
  </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="{{$usuario['nombre']}}">{!!$error->ErrorFormateado("nombre")!!}
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="{{$usuario['correo']}}">{!!$error->ErrorFormateado("correo")!!}
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="telefono" value="{{$usuario['telefono']}}">{!!$error->ErrorFormateado("telefono")!!}
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Direccion</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="direccion" value="{{$usuario['direccion']}}">{!!$error->ErrorFormateado("direccion")!!}
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de alta</label>
      <input readonly type="date" class="form-control" id="inputZip" name="fecha_alta" value="{{$usuario['fecha_creacion']}}">{!!$error->ErrorFormateado("fecha_alta")!!}
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Tipo</label>
      <select id="inputState" class="form-select" name="tipo">
        <option selected>{{$usuario['tipo']}}</option>
        <option>Admin</option>
        <option>Operario</option>
      </select>
      {!!$error->ErrorFormateado("tipo")!!}
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
    @endforeach
  </form>
  @endsection
</body>
</html>