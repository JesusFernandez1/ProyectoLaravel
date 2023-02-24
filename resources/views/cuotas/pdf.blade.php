<!DOCTYPE html>
<html>
<head>
    <title>Cuota</title>
</head>
<body>
    <h1>Cuota {{ $cuota->id }}</h1>
    <p>Concepto: {{ $cuota->concepto }}</p>
    <p>Fecha de emision: {{ $cuota->fecha_emision }}</p>
    <p>Importe: {{ $cuota->importe }}</p>
    <p>Pagada: {{ $cuota->pagada }}</p>
    <p>Fecha del pago: {{ $cuota->fecha_pago }}</p>
    <p>Nota: {{ $cuota->notas }}</p>
    <p>Cliente correspondiente: {{ $cuota->customers_id }}</p>
</body>
</html>