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
  <form action="{{ route(cuotas.store)}}" class="row g-3" method="POST">
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Concepto</label>
      <input type="text" class="form-control" name="concepto">
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Fecha</label>
      <input type="text" class="form-control" name="nombre">
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Importe</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="importe">
    </div>
    <div class="col-md-3">
        <label for="inputState" class="form-label">Pagada</label>
        <select id="inputState" class="form-select" name="pagada">
          <option disabled selected></option>
          <option>Si</option>
          <option>No</option>
        </select>
      </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Fecha de Pago</label>
      <input type="text" class="form-control" name="fecha_pago">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Nota</label>
      <input type="text" class="form-control" name="nota">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Tarea correspondiente</label>
      <input type="text" class="form-control" name="tasks_id">
    </div>
      <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
  </form>
  @endsection
</body>
</html>