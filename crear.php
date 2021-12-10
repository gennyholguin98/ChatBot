<?php

include 'funciones.php';

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'Solicitud a nombre de ' . escapar($_POST['nombre']) . ' ha sido agregado con éxito'
  ];

  $config = include 'config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $registro = array(
      "nombre"   => $_POST['nombre'],
      "apellido" => $_POST['apellido'],
      "identificacion"    => $_POST['identificacion'],
      "entidad"     => $_POST['entidad'],
      "url_remision"     => $_POST['url_remision'],
      "estado"     => 'EN TRAMITE',
      
    );

    $consultaSQL = "INSERT INTO registro (nombre, apellido, identificacion,entidad, url_remision,estado) values (:" . implode(", :", array_keys($registro)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($registro);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>

<?php include 'templates/header.php'; ?>

<?php
if (isset($resultado)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Datos para crear solicitud</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="identificacion">Identificación</label>
          <input type="identificacion" name="identificacion" id="identificacion" class="form-control">
        </div>
        <div class="form-group">
          <label for="entidad">Entidad</label>
          <input type="text" name="entidad" id="entidad" class="form-control">
        </div>
        <div class="form-group">
          <label for="url_remision">URL remision</label>
          <input type="text" name="url_remision" id="url_remision" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar"  onSubmit= "window.close();">
          <a class="btn btn-primary" href="index1.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'templates/footer.php'; ?>