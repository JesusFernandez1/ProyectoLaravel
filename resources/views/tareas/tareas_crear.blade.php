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
      <label for="inputEmail4" class="form-label">NIF/CIF</label>
      <input type="text" class="form-control" name="identificacion" value="<?= isset($_POST['identificacion']) ? $_POST['identificacion'] : '' ?>">{!!$error->ErrorFormateado("identificacion")!!}
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">{!!$error->ErrorFormateado("nombre")!!}
    </div>
    <div class="col-3">
      <label for="inputAddress" class="form-label">Apellido</label>
      <input type="text" class="form-control" placeholder="1234 Main St" name="apellido" value="<?= isset($_POST['apellido']) ? $_POST['apellido'] : '' ?>">{!!$error->ErrorFormateado("apellido")!!}
    </div>
    <div class="col-2">
      <label for="inputAddress2" class="form-label">Telefono</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="telefono" value="<?= isset($_POST['telefono']) ? $_POST['telefono'] : '' ?>">{!!$error->ErrorFormateado("telefono")!!}
    </div>
    <div class="col-3">
      <label for="inputAddress2" class="form-label">Descripcion</label>
      <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="descripcion" value="<?= isset($_POST['descripcion']) ? $_POST['descripcion'] : '' ?>">{!!$error->ErrorFormateado("descripcion")!!}
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Correo</label>
      <input type="text" class="form-control" name="correo" value="<?= isset($_POST['correo']) ? $_POST['correo'] : '' ?>">{!!$error->ErrorFormateado("correo")!!}
    </div>
    <div class="col-md-3">
      <label for="inputCity" class="form-label">Direccion</label>
      <input type="text" class="form-control" name="direccion" value="<?= isset($_POST['direccion']) ? $_POST['direccion'] : '' ?>">{!!$error->ErrorFormateado("direccion")!!}
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Poblacion</label>
      <input type="text" class="form-control" name="poblacion" value="<?= isset($_POST['poblacion']) ? $_POST['poblacion'] : '' ?>">{!!$error->ErrorFormateado("poblacion")!!}
    </div>
    <div class="col-md-2">
      <label for="inputCity" class="form-label">Codigo Postal</label>
      <input type="text" class="form-control" name="codigo" value="<?= isset($_POST['codigo']) ? $_POST['codigo'] : '' ?>">{!!$error->ErrorFormateado("codigo")!!}
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Provincia</label>
      <select id="inputState" class="form-select" name="provincia" value="<?= isset($_POST['provincia']) ? $_POST['provincia'] : '' ?>">
        <option disabled selected hidden>Provincia</option>
        @foreach ($provincias as $provincia)
        <option>{{$provincia["nombre"]}}</option>
        @endforeach
      </select>
      {!!$error->ErrorFormateado("provincia")!!}
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
      <select id="inputState" class="form-select" name="estado" value="<?= isset($_POST['estado']) ? $_POST['estado'] : '' ?>">
        <option disabled selected hidden>Estado tarea</option>
        <option>P</option>
        <option>R</option>
        <option>C</option>
        <option>B</option>
      </select>
      {!!$error->ErrorFormateado("estado")!!}
    </div>
    <div class="col-md-1">
      <label for="inputZip" class="form-label">Fecha de creacion</label>
      <input type="date" class="form-control" id="inputZip" name="inicio" value="<?php echo date("Y-m-d") ?>">{!!$error->ErrorFormateado("inicio")!!}
    </div>
    <div class="col-md-2">
      <label for="inputState" class="form-label">Operarios</label>
      <select id="inputState" class="form-select" name="operario" value="<?= isset($_POST['operario']) ? $_POST['operario'] : '' ?>">
        <option disabled selected hidden>Operario</option>
        <option>Mark</option>
        <option>David</option>
        <option>Kike</option>
        <option>Jesus</option>
        <option>Mar</option>
      </select>
      {!!$error->ErrorFormateado("operario")!!}
    </div>
    <div class="col-md-1">
      <label for="inputCity" class="form-label">Fecha de finalizacion</label>
      <input type="date" class="form-control" id="inputCity" name="final" value="<?= isset($_POST['final']) ? $_POST['final'] : '' ?>">{!!$error->ErrorFormateado("final")!!}
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion inicio</label>
      <textarea type="text" class="form-control" id="inputCity" name="anterior" value="<?= isset($_POST['anterior']) ? $_POST['anterior'] : '' ?>"></textarea>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Anotacion final</label>
      <textarea type="text" class="form-control" id="inputCity" name="posterior" value="<?= isset($_POST['posterior']) ? $_POST['posterior'] : '' ?>"></textarea>
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" value="Insert">
    </div>
  </form>
  @endsection
</body>
</html>