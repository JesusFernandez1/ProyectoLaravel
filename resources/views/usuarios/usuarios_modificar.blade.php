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
  <form action="{{ route('usuarios.update', $usuario) }}" class="row g-3" method="POST">
    @method('put')
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">DNI</label>
    <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $usuario->DNI) }}">
    @error('DNI')
          <small style="color: red">{{ $message }}</small>
      @enderror
  </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="name" value="{{ old("name", $usuario->name) }}">
      @error('name')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="email" value="{{ old("email", $usuario->email) }}">
      @error('email')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="telefono" value="{{ old("telefono", $usuario->telefono) }}">
      @error('telefono')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Direccion</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="direccion" value="{{ old("direccion", $usuario->direccion )}}">
      @error('direccion')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de alta</label>
      <input readonly type="datetime-local" class="form-control" id="inputZip" name="fecha_alta" value="{{ old("fecha_alta", $usuario->fecha_alta->format('Y-m-d\TH:i')) }}">
      @error('fecha_alta')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Tipo</label>
      <select id="inputState" class="form-select" name="tipo">
        <option selected>{{ old("tipo", $usuario->tipo) }}</option>
        <option>Admin</option>
        <option>Operario</option>
      </select>
      @error('tipo')
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