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
@extends('base')

@section('mostrarExtension')
  <form action="" class="row g-3" method="POST">
  @foreach ($tareas as $tarea)
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="{{$tarea['nombre']}}">{!!$error->ErrorFormateado("nombre")!!}
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="{{$tarea['apellido']}}">{!!$error->ErrorFormateado("apellido")!!}
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="telefono" value="{{$tarea['telefono']}}">{!!$error->ErrorFormateado("telefono")!!}
    </div>
    <div class="col-3">
      <label for="inputAddress2" class="form-label">Descripcion</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="descripcion" value="{{$tarea['descripcion']}}">{!!$error->ErrorFormateado("descripcion")!!}
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="{{$tarea['correo']}}">{!!$error->ErrorFormateado("correo")!!}
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input type="text" class="form-control" name="direccion" value="{{$tarea['direccion']}}">{!!$error->ErrorFormateado("direccion")!!}
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Poblacion</label>
      <input type="text" class="form-control" name="poblacion" value="{{$tarea['poblacion']}}">{!!$error->ErrorFormateado("poblacion")!!}
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Codigo Postal</label>
      <input type="text" class="form-control" name="codigo" value="{{$tarea['codigo_postal']}}">{!!$error->ErrorFormateado("codigo")!!}
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Provincia</label>
      <select id="inputState" class="form-select" name="provincia">
        <option selected>{{$tarea['provincia']}}</option>
        @foreach ($provincias as $provincia)
        <option>{{$provincia["nombre"]}}</option>
        @endforeach
      </select>
      {!!$error->ErrorFormateado("provincia")!!}
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
      <select id="inputState" class="form-select" name="estado">
        <option selected>{{$tarea['estado_tarea']}}</option>
        <option>P</option>
        <option>R</option>
        <option>C</option>
        <option>B</option>
      </select>
      {!!$error->ErrorFormateado("estado")!!}
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de creacion</label>
      <input readonly type="date" class="form-control" id="inputZip" name="inicio" value="{{$tarea['fecha_creacion']}}">{!!$error->ErrorFormateado("inicio")!!}
    </div>
    <div class="col-md-1">
      <label for="inputCity" class="form-label">Fecha de finalizacion</label>
      <input type="date" class="form-control" id="inputCity" name="final" value="{{$tarea['fecha_final']}}">{!!$error->ErrorFormateado("final")!!}
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion inicio</label>
      <textarea type="text" class="form-control" id="inputCity" name="anterior">{{$tarea['anotacion_inicio']}}</textarea>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion final</label>
      <textarea type="text" class="form-control" id="inputCity" name="posterior">{{$tarea['anotacion_final']}}</textarea>
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Cliente</label>
      <select id="inputState" class="form-select" name="cliente">
        <option selected>{{$tarea['cliente_id']}}</option>
        @foreach ($clientes as $cliente)
        <option>{{$cliente["nombre"]}}</option>
        @endforeach
      </select>
      {!!$error->ErrorFormateado("cliente")!!}
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Empleado</label>
      <select id="inputState" class="form-select" name="empleado">
        <option selected>{{$tarea['empleado_id']}}</option>
        @foreach ($empleados as $empleado)
        <option>{{$empleado["nombre"]}}</option>
        @endforeach
      </select>
      {!!$error->ErrorFormateado("empleado")!!}
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
    @endforeach
  </form>
  @endsection
</body>
</html>