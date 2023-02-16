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
  <form action="{{ route('cuotas.update') }}" class="row g-3" method="POST">
    @method('put')
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Concepto</label>
      <input type="text" class="form-control" name="concepto" value="{{ old("concepto", $cuota->concepto) }}">
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Fecha</label>
      <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $cuota->nombre) }}">
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Importe</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="importe" value="{{ old("importe", $cuota->importe) }}">
    </div>
    <div class="col-md-3">
        <label for="inputState" class="form-label">Pagada</label>
        <select id="inputState" class="form-select" name="pagada">
          <option disabled selected>value="{{ old("pagada", $cuota->pagada) }}"</option>
          <option>Si</option>
          <option>No</option>
        </select>
      </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Fecha de Pago</label>
      <input type="text" class="form-control" name="fecha_pago" value="{{ old("fecha_pago", $cuota->fecha_pago) }}">
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Nota</label>
      <input type="text" class="form-control" name="nota" value="{{ old("nota", $cuota->nota) }}">
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Cliente correspondiente</label>
      <select id="inputState" class="form-select" name="customers_id">
        <option selected>{{ old("customers_id", $cuota->customers_id) }}</option>
        @foreach ($customers as $customer)
        <option>{{$customer->customers_id}}</option>
        @endforeach
      </select>
      @error('customers_id')
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