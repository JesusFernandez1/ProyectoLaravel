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
  <form action="{{ route('clientes.update', $cliente) }}" class="row g-3" method="POST">
    @method('put')
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">DNI</label>
    <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $cliente->DNI) }}">
    @error('DNI')
          <small style="color: red">{{ $message }}</small>
      @enderror
  </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $cliente->nombre) }}">
      @error('nombre')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="telefono" value="{{ old("telefono", $cliente->telefono) }}">
      @error('telefono')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="{{ old("correo", $cliente->correo) }}">
      @error('correo')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Cuenta</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="cuenta" value="{{ old("cuenta", $cliente->cuenta) }}">
      @error('cuenta')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Pais</label>
      <select id="inputState" class="form-select" name="pais">
        <option selected>{{ old("pais", $cliente->pais)}}</option>
        @foreach ($paises as $pais)
        <option>{{$pais->iso3}}</option>
        @endforeach
      </select>
      @error('pais')
          <small style="color: red">{{ $message }}</small>
      @enderror
    </div>
    <div hidden class="col-md-3">
      <label for="inputCity" class="form-label">moneda</label>
      <input type="text" class="form-control" name="moneda" value="Prueba">
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Importe</label>
      <input type="number" class="form-control" id="inputZip" name="importe_mensual" value="{{ old("importe_mensual", $cliente->importe_mensual) }}">
      @error('importe_mensual')
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