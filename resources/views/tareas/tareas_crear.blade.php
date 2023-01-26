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
  <form action="{{ route('tareas.store') }}" class="row g-3" method="POST">
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
      @error('nombre')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="{{ old('apellido') }}">
      @error('apellido')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="telefono" value="{{ old('telefono') }}">
      @error('telefono')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-3">
      <label for="inputAddress2" class="form-label">Descripcion</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="descripcion" value="{{ old('descripcion') }}">
      @error('descripcion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="{{ old('correo') }}">
      @error('correo')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
      @error('direccion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Poblacion</label>
      <input type="text" class="form-control" name="poblacion" value="{{ old('poblacion') }}">
      @error('poblacion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Codigo Postal</label>
      <input type="text" class="form-control" name="codigo_postal" value="{{ old('codigo_postal') }}">
      @error('codigo_postal')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Provincia</label>
      <select id="inputState" class="form-select" name="provincia">
        <option selected>{{ old('provincia') }}</option>
        @foreach ($provincias as $provincia)
        <option>{{$provincia->nombre}}</option>
        @endforeach
      </select>
      @error('provincia')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
      <select id="inputState" class="form-select" name="estado_tarea">
        <option selected>{{ old('estado_tarea') }}</option>
        <option>P</option>
        <option>R</option>
        <option>C</option>
        <option>B</option>
      </select>
      @error('estado_tarea')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de creacion</label>
      <input type="datetime-local" class="form-control" id="inputZip" name="fecha_inicio" value="<?php echo date("Y-m-d H:i:s") ?>">
      @error('inicio')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-1">
      <label for="inputCity" class="form-label">Fecha de finalizacion</label>
      <input type="datetime-local" class="form-control" id="inputCity" name="fehca_final" value="{{ old('fehca_final') }}">
      @error('final')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion inicio</label>
      <textarea type="text" class="form-control" id="inputCity" name="anotacion_anterior" value="{{ old('anotacion_anterior') }}"></textarea>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion final</label>
      <textarea type="text" class="form-control" id="inputCity" name="anotacion_posterior" value="{{ old('anotacion_posterior') }}"></textarea>
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Cliente</label>
      <select id="inputState" class="form-select" name="customers_id">
        <option selected>{{ old('customers_id') }}</option>
        @foreach ($clientes as $cliente)
        <option>{{$cliente->nombre}}</option>
        @endforeach
      </select>
      @error('customer_id')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Empleado</label>
      <select id="inputState" class="form-select" name="users_id">
        <option selected>{{ old('users_id') }}</option>
        @foreach ($empleados as $empleado)
        <option>{{$empleado->name}}</option>
        @endforeach
      </select>
      @error('user_id')
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