<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>f</title>
  </head>
  <body>
    <form class="" action="registro.php" method="post">
      Correo electronico: <input type="text" name="correo" value=""><br><br>
      Contraseña: <input type="password" name="pass" value=""><br><br>
      Repita la contraseña: <input type="password" name="pass2" value=""><br><br>
      <input type="submit" name="registrarse" value="Registrarse">
    </form>
    <?php
    if (isset($_POST['correo']) && isset($_POST['pass']) && isset($_POST['pass2'])) {
      if ($_POST['pass']==$_POST['pass2']) {
        //si el usuario rellena todos los campos, llamamos al archivo de la db y creamos el objeto.
        include '\Modelo\usuario.php';
        $usuarios=new Usuario();
        //llamada a la funcion de insertar usuario en la db
        $resultado=$usuarios->registroUsuario($_POST['pass'], $_POST['correo']);
        if ($resultado==null) {
          echo "Error";
        }else {
          //si se inserta con exito, sacamos un mensaje i lo llevamos a login.php
         ?>
         <script type="text/javascript">
           alert("Usuario registrado con exito.");
           window.location="login.php";
         </script>
         <?php
          }
      }else {
        ?>
        <script type="text/javascript">
          alert("Las contraseñas no coinciden.");
          window.location="registro.php";
        </script>
        <?php
      }
 }else {
   ?>
   <script type="text/javascript">
     alert("No has rellenado todos los campos.");
     window.location="registro.php";
   </script>
   <?php
 }
     ?>
  </body>
</html>
