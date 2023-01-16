<html>
<head>
   <title>Base de Datos</title>
</head>
<body>
   <h1>Ver datos de las tareas</h1>
   <table border="1">
      <tr>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>NIF/CIF</th>
         <th>poblacion</th>
         <th>codigo_postal</th>
         <th>provincia</th>
         <th>fecha_creacion</th>
         <th>telefono</th>
         <th>Estado</th>
      </tr>
      <?php foreach ($tareas as $tarea) : ?>
         <tr>
            <td><?php echo $tarea['nombre'] ?></td>
            <td><?php echo $tarea['apellido'] ?></td>
            <td><?php echo $tarea['NIF/CIF'] ?></td>
            <td><?php echo $tarea['poblacion'] ?></td>
            <td><?php echo $tarea['codigo_postal'] ?></td>
            <td><?php echo $tarea['provincia'] ?></td>
            <td><?php echo $tarea['fecha_creacion'] ?></td>
            <td><?php echo $tarea['telefono'] ?></td>
            <td><?php echo $tarea['estado_tarea'] ?></td>
         </tr>
      <?php endforeach; ?>
   </table>
</body>
</html>