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
  <form action="{{ route('tareas.completarTarea', $tarea) }}" class="row g-3" method="POST">
    @method('put')
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input disabled type="text" class="form-control" name="nombre" value="{{$tarea->nombre}}">
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input disabled type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="{{$tarea->apellido}}">
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Telefono</label>
      <input disabled type="text" class="form-control" placeholder="Apartment, studio, or floor" name="telefono" value="{{$tarea->telefono}}">
    </div>
    <div class="col-3">
      <label for="inputAddress2" class="form-label">Descripcion</label>
      <input disabled type="text" class="form-control" placeholder="Apartment, studio, or floor" name="descripcion" value="{{$tarea->descripcion}}">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input disabled type="text" class="form-control" name="correo" value="{{$tarea->correo}}">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input disabled type="text" class="form-control" name="direccion" value="{{$tarea->direccion}}">
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Poblacion</label>
      <input disabled type="text" class="form-control" name="poblacion" value="{{$tarea->poblacion}}">
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Codigo Postal</label>
      <input disabled type="text" class="form-control" name="codigo_postal" value="{{$tarea->codigo}}">
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Provincia</label>
      <select disabled id="inputState" class="form-select" name="provincia">
        <option>{{$tarea->provincia}}</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
      <select id="inputState" class="form-select" name="estado_tarea">
        <option selected>R</option>
      </select>
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de creacion</label>
      <input disabled type="datetime-local" class="form-control" id="inputZip" name="fecha_inicio" value="{{$tarea->fecha_creacion}}">
    </div>
    <div class="col-md-1">
      <label for="inputCity" class="form-label">Fecha de finalizacion</label>
      <input type="datetime-local" class="form-control" id="inputCity" name="fecha_final" value="{{ old("fecha_final", $tarea->fecha_final)}}">
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion inicio</label>
      <textarea type="text" class="form-control" id="inputCity" name="anotacion_anterior">{{ old("anotacion_anterior", $tarea->anotacion_anterior)}}</textarea>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion final</label>
      <textarea type="text" class="form-control" id="inputCity" name="anotacion_posterior">{{ old("anotacion_posterior", $tarea->anotacion_posterior)}}</textarea>
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Cliente</label>
      <select disabled id="inputState" class="form-select" name="customers_id">
        @foreach ($clientes as $cliente)
        <option value="{{$cliente->id}}" @selected(old("customers_id", $tarea->customers_id)==$cliente->id)>{{$cliente->nombre}}</option>
        @endforeach
      </select>
      @error('customers_id')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Empleado</label>
      <select disabled id="inputState" class="form-select" name="users_id">
        @foreach ($empleados as $empleado)
        <option value="{{$empleado->id}}" @selected(old("users_id", $tarea->users_id)==$empleado->id)>{{$empleado->name}}</option>
        @endforeach
      </select>
      @error('users_id')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
  </form>
  @endsection
</body>
</html>