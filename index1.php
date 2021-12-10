<!DOCTYPE html>
<?php
include 'funciones.php';

$error = false;
$config = include 'config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  if (isset($_POST['codigo'])) {
    $consultaSQL = "SELECT * FROM registro WHERE codigo LIKE '%" . $_POST['codigo'] . "%'";
  } else {
    $consultaSQL = "SELECT * FROM registro";
  }
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $registro = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error= $error->getMessage();
}
?>

<?php include "templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear alumno</a>
      <hr>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>


<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
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
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="codigp" name="codigo" placeholder="Buscar codigo" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Ver resultados</button>
      </form>
    </div>
  </div>
</div>


<html lang="en">
    <head>
        <title>hospital xxx</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
    </head>
    <body>
    <div class="parent">
        <div class="div1">
             
            <div class="chatbox">
                    <div class="header">
                        <h4> <img src='img/perfil.jpg' class='imgRedonda'/> Asistente Virtual </h4>
                                    
                    </div>
                    
                        <div class="body" id="chatbody">
                        <p class="alicia">Hola! soy Max, Estoy para responder preguntas y ayudarte a gestionar los procesos que requieras.
                            selecciona: 1. Solicitar Cita.
                            2. Ver tramite
                        </p>
                            <div class="scroller"></div>
                        </div>

                    <form class="chat" method="post" autocomplete="off">
                    
                                <div>
                                    <input type="text" name="chat" id="chat" placeholder="Preguntale algo" style=" font-family: cursive; font-size: 20px;">
                                </div>
                                <div>
                                    <input type="submit" value="Enviar" id="btn">
                                </div>
                    </form>

            <input type=button class="creador" value="Creadores" onClick="mi_alerta()">
        </div>

        </div>
        <div class="div2"> nombre</div>
        <div class="div3">
        <table>
         <thead>
         <tr>
             <th>nombre</th>
             <th>apellido</th>
             <th>identificacion</th>
             <th>entidad</th>
             <th>remision</th>
             <th>codigo</th>
             <th>acciones</th>

         </tr>
         </thead>
         
         <tbody>
          <?php
          if ($registro && $sentencia->rowCount() > 0) {
            foreach ($registro as $fila) {
              ?>
              <tr>
                <td><?php echo escapar($fila["nombre"]); ?></td>
                <td><?php echo escapar($fila["apellido"]); ?></td>
                <td><?php echo escapar($fila["identificacion"]); ?></td>
                <td><?php echo escapar($fila["entidad"]); ?></td>
                <td><?php echo escapar($fila["url_remision"]); ?></td>
                <td><?php echo escapar($fila["codigo"]); ?></td>
                <td>
                   
                    <a href="http://localhost/bot/asignar.php">Asignar citas</a>
                   
                </td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
        </table>
        </div>
       
</div>
    <script src="app.js"></script>
    
            <SCRIPT LANGUAGE="JavaScript">
        function mi_alerta () {
        alert ("Genny Alejandra Holguin Peralta"+
               "\n"+
               "\nAutomatización");
        }
        </SCRIPT>
    </body>
</html>
