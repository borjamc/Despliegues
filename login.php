<!DOCTYPE html>
<html>
<?php
include 'seguridad/seguridad.php';
$sesion=new Seguridad();

include '\Modelo\usuario.php';
$usuario=new Usuario();
 ?>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form class="login" action="login.php" method="post">
      Correo: <input type="text" name="correo" value=""><br><br>
      Contraseña: <input type="password" name="pass" value=""><br><br>
      <input type="submit" name="login" value="Login">
    </form>
    <?php
      if (isset($_POST['correo']) && isset($_POST['pass'])) {

         $registrado=$usuario->LoginUsuario($_POST['correo']);
         if ($registrado!=null) {

           if ($registrado['pass']==sha1($_POST['pass'])) {
             echo "Usuario logueado";
             $sesion->addUsuario($registrado['id_user']);
             header('Location: index.php');
           }else {
             echo "Las contraseñas no coinciden";
           }
         }else {
           echo "Usuario no encontrado.";
         }
      }
     ?>
  </body>
</html>
