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

<h3>Cliente al se añade la cuota: {{$cliente->nombre}}</h3>

  <form action="{{ route('cuotas.store') }}" class="row g-3" method="POST">
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Concepto</label>
      <input type="text" class="form-control" name="concepto" value="{{ old("concepto") }}">
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Fecha</label>
      <input type="text" class="form-control" name="nombre" value="{{ old("nombre") }}">
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Importe</label>
      <input type="number" class="form-control" placeholder="1234 Main St" name="importe" value="{{ old("importe") }}">
    </div>
    <div class="col-md-3">
        <label for="inputState" class="form-label">Pagada</label>
        <select id="inputState" class="form-select" name="pagada">
          <option selected>{{ old("pagada") }}</option>
          <option>Si</option>
          <option>No</option>
        </select>
      </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Fecha de Pago</label>
      <input type="datetime-local" class="form-control" name="fecha_pago" value="{{ old("fecha_pago") }}">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Nota</label>
      <input type="text" class="form-control" name="nota" value="{{ old("nota") }}">
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Tarea correspondiente</label>
      <select id="inputState" class="form-select" name="task_id">
        <option selected>{{ old("task_id") }}</option>
        @foreach ($tareas as $tarea)
        <option>{{$tarea->task_id}}</option>
        @endforeach
      </select>
      @error('task_id')
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