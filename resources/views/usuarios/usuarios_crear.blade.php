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
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">DNI</label>
      <input type="text" class="form-control" name="DNI">
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Pass</label>
      <input type="text" class="form-control" name="pass">
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="telefono">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input type="text" class="form-control" name="direccion">
    <div class="col-md-6">
      <label for="inputCity" class="form-label">Fecha de alta</label>
      <input type="text" class="form-control" name="fecha_alta">
    </div>
    <div class="col-md-6">
      <label for="inputState" class="form-label">Tipo</label>
      <select id="inputState" class="form-select" name="tipo">
        <option disabled selected></option>
        <option>Admin</option>
        <option>Operario</option>
      </select>
    </div>
      <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
  </form>
  @endsection
</body>
</html>