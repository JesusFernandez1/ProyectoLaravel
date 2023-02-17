<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Base de Datos</title>
</head>

<body>

   @extends('base')

   @section('mostrarExtension')

   <table class="table">
      <thead class="thead-dark">
         <tr>
            <th scope="col">Concepto</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Importe</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($clientes as $cliente)
         <tr>
            <td>{{date("Y-m-d")}}</td>
            <td>{{date("Y-m-d")}}</td>
            <td>{{$cliente->importe_mensual}} {{$cliente->moneda}}</td>
         @endforeach
      </tbody>
   </table>
   <form action="{{ route('cuotas.crearRemesaMensual') }}">
    <div class="col-md-3">
        <label for="inputCity" class="form-label">Nota</label>
        <textarea class="form-control" name="notas" value="{{ old("notas") }}"></textarea>
        @error('notas')
        <small style="color: red">{{ $message }}</small>
    @enderror
      </div>
    </div>
    <div class="col-12">
    <input type="submit" class="btn btn-primary" value="Insert">
  </div>
   </form>
   {!! $clientes->links() !!}
   @endsection
</body>
</html>