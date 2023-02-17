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
  <form action="{{ route('tareas.operarioAsignado',$tarea) }}" class="row g-3" method="POST">
    @method('put')
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input readonly type="text" class="form-control" name="nombre" value="{{ old("nombre", $tarea->nombre)}}">
      @error('nombre')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input readonly type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="{{ old("apellido", $tarea->apellido)}}">
      @error('apellido')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Telefono</label>
      <input readonly type="text" class="form-control" placeholder="Apartment, studio, or floor" name="telefono" value="{{ old("telefono", $tarea->telefono)}}">
      @error('telefono')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-3">
      <label for="inputAddress2" class="form-label">Descripcion</label>
      <input readonly type="text" class="form-control" placeholder="Apartment, studio, or floor" name="descripcion" value="{{ old("descripcion", $tarea->descripcion)}}">
      @error('descripcion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input readonly type="text" class="form-control" name="correo" value="{{ old("correo", $tarea->correo)}}">
      @error('correo')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input readonly type="text" class="form-control" name="direccion" value="{{ old("direccion", $tarea->direccion)}}">
      @error('direccion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Poblacion</label>
      <input readonly type="text" class="form-control" name="poblacion" value="{{ old("poblacion", $tarea->poblacion)}}">
      @error('poblacion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Codigo Postal</label>
      <input readonly type="text" class="form-control" name="codigo_postal" value="{{ old("codigo_postal", $tarea->codigo_postal)}}">
      @error('codigo_postal')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-1">
        <label for="inputZip" class="form-label">Provincia</label>
        <input readonly type="text" class="form-control" id="inputZip" name="provincia" value="{{ old("provincia", $tarea->provincia)}}">
        @error('provincia')
            <small style="color: red">{{ $message }}</small>
        @enderror
      </div>
    <div class="col-md-1">
        <label for="inputZip" class="form-label">Estado</label>
        <input readonly type="text" class="form-control" id="inputZip" name="estado_tarea" value="{{ old("estado_tarea", $tarea->estado_tarea)}}">
        @error('estado_tarea')
            <small style="color: red">{{ $message }}</small>
        @enderror
      </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de creacion</label>
      <input readonly type="datetime-local" class="form-control" id="inputZip" name="fecha_creacion" value="{{ old("fecha_creacion", $tarea->fecha_creacion)}}">
      @error('fecha_creacion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-1">
      <label for="inputCity" class="form-label">Fecha de finalizacion</label>
      <input readonly type="datetime-local" class="form-control" id="inputCity" name="fecha_final" value="{{ old("fecha_final", $tarea->fecha_final)}}">
      @error('fecha_final')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion inicio</label>
      <textarea readonly type="text" class="form-control" id="inputCity" name="anotacion_anterior">{{ old("anotacion_anterior", $tarea->anotacion_anterior)}}</textarea>
      @error('anotacion_anterior')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion final</label>
      <textarea readonly type="text" class="form-control" id="inputCity" name="anotacion_posterior">{{ old("anotacion_posterior", $tarea->anotacion_posterior)}}</textarea>
      @error('anotacion_posterior')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Cliente</label>
      <select disabled id="inputState" class="form-select" name="customers_id">
        <option value="{{$cliente->id}}" @selected(old("customers_id", $tarea->customers_id)==$cliente->id)>{{$cliente->nombre}}</option>
      </select>
      @error('customers_id')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Empleado</label>
      <select id="inputState" class="form-select" name="users_id">
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