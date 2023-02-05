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
  <form action="{{ route('tareas.update',$tarea) }}" class="row g-3" method="POST">
    @method('put')
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $tarea->nombre)}}">
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="{{ old("apellido", $tarea->apellido)}}">
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="telefono" value="{{ old("telefono", $tarea->telefono)}}">
    </div>
    <div class="col-3">
      <label for="inputAddress2" class="form-label">Descripcion</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="descripcion" value="{{ old("descripcion", $tarea->descripcion)}}">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="{{ old("correo", $tarea->correo)}}">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input type="text" class="form-control" name="direccion" value="{{ old("direccion", $tarea->direccion)}}">
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Poblacion</label>
      <input type="text" class="form-control" name="poblacion" value="{{ old("poblacion", $tarea->poblacion)}}">
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Codigo Postal</label>
      <input type="text" class="form-control" name="codigo_postal" value="{{ old("codigo_postal", $tarea->codigo_postal)}}">
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Provincia</label>
      <select id="inputState" class="form-select" name="provincia">
        <option selected>{{ old("provincia", $tarea->provincia)}}</option>
        @foreach ($provincias as $provincia)
        <option>{{$tarea->provincia}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
      <select id="inputState" class="form-select" name="estado_tarea">
        <option selected>{{ old("estado_tarea", $tarea->estado_tarea)}}</option>
        <option>P</option>
        <option>R</option>
        <option>C</option>
        <option>B</option>
      </select>
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de creacion</label>
      <input readonly type="datetime-local" class="form-control" id="inputZip" name="inicio" value="{{ old("fecha_creacion", $tarea->fecha_creacion)}}">
    </div>
    <div class="col-md-1">
      <label for="inputCity" class="form-label">Fecha de finalizacion</label>
      <input type="datetime-local" class="form-control" id="inputCity" name="final" value="{{ old("fecha_final", $tarea->fecha_final)}}">
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion inicio</label>
      <textarea type="text" class="form-control" id="inputCity" name="anterior">{{ old("anotacion_anterior", $tarea->anotacion_anterior)}}</textarea>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion final</label>
      <textarea type="text" class="form-control" id="inputCity" name="posterior">{{ old("anotacion_posterior", $tarea->anotacion_posterior)}}</textarea>
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Cliente</label>
      <select id="inputState" class="form-select" name="cliente">
        <option selected>{{ old("customer_id", $nombreCliente->nombre)}}</option>
        @foreach ($clientes as $cliente)
        <option>{{$cliente->nombre}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Empleado</label>
      <select id="inputState" class="form-select" name="empleado">
        <option selected>{{ old("users_id", $nombreEmpleado->name)}}</option>
        @foreach ($empleados as $empleado)
        <option>{{$empleado->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
  </form>
  @endsection
</body>
</html>