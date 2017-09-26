<?php
  require_once '/Modelo/personales.php';
  require_once '/Modelo/educacion.php';
  require_once '/Modelo/experiencia.php';
  require_once '/seguridad/seguridad.php';

  $personal= new Personales();
  $educacion= new Educacion();
  $experiencia= new Experiencia();
  $seguridad= new Seguridad();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mi CV.RE</title>
  </head>
  <body>
    <nav>
      <?php
        if (isset($_SESSION['usuario']) && $_SESSION['usuario']==1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href='logout.php'>       Cerrar sesion</a>";
        }elseif (isset($_SESSION['usuario']) && $_SESSION['usuario']!=1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href=''>Contacto</a>";
        }else {
          echo "<a href='index.php'>Inicio</a>";
        }
      ?>
    </nav>
    <h2>Datos personales.</h2>
    <?php
      $datospersonales=$personal->datosCv();
      foreach ($datospersonales as $personal) {
        echo "<img src='".$personal["foto"]."' alt=''> <br><br>";
        echo "<ul><li>Nombre: ".$personal['nombre']."</li>";
        echo "<li>Apellidos: ".$personal['apellidos']."</li>";
        echo "<li>Direccion: ".$personal['direccion']."</li>";
        echo "<li>Telefono: ".$personal['telefono']."</li>";
        echo "<li>Correo: ".$personal['correo']."</li>";
        echo "<li>Facebok: ".$personal['redes_sociales']."</li></ul>";
        if (isset($_SESSION['usuario'])) {
          if ($_SESSION['usuario']==1) {
            echo "<a href='actualizarpersonales.php?id_personal=".$personal['id_personal']."&foto=".$personal['foto']."&nombre=".$personal['nombre']."&apellidos=".$personal['apellidos']."&direccion=".$personal['direccion']."&telefono=".$personal['telefono']."&correo=".$personal['correo']."&redes=".$personal['redes_sociales']."'>Actualizar datos personales.</a>";
          }
        }

      }


      ?>
      <h2>Experiencia laboral</h2>
      <?php
      $experiencialaboral=$experiencia->experienciaCV();
      foreach ($experiencialaboral as $experiencia) {
        echo "<ul><li><b>".$experiencia['anyoinicio']."-".$experiencia['anyofinal'].": </b>" .$experiencia['empresa'].": ".$experiencia['texto']."</li></ul>";
        if (isset($_SESSION['usuario'])) {
          if ($_SESSION['usuario']==1) {
            echo " <a href='eliminarexperiencia.php?id=".$experiencia['id_experiencia']."'>Eliminar experiencia</a>";
          }
        }
      }
     ?>

     <h2>Educación</h2>
     <?php
      $educacionusuario=$educacion->mostrarEducacion();
      foreach ($educacionusuario as $educacion) {
        echo "<ul><li><b>".$educacion['año_inicio']."-".$educacion['año_finalizacion'].": </b>".$educacion['empresa'].": ".$educacion['texto']."</li></ul>";
        if (isset($_SESSION['usuario'])) {
          if ($_SESSION['usuario']==1) {
            echo "<a href='actualizareducacion.php?id_estudios=".$educacion['id_estudios']."&año_inicio=".$educacion['año_inicio']."&año_finalizacion=".$educacion['año_finalizacion']."&empresa=".$educacion['empresa']."&texto=".$educacion['texto']."'>Actualizar educacion.</a>";
            echo "      <a href='eliminareducacion.php?id=".$educacion['id_estudios']."'>Eliminar estudio.</a>";
          }
        }
      }
      ?>

  </body>
</html>
