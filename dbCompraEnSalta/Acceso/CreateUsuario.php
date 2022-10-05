<?php


    require_once '../Libs/Conexion.php';
    require '../Libs/Funciones.php';
    
    if (isset($_POST['txtUsuario']))
       {

   $Usuario=$_POST['txtUsuario'];
   $Clave=$_POST['txtClave'];
   $Nombre=$_POST['txtNombre'];
   $Apellido=$_POST['txtApellido'];
   $Email=$_POST['txtEmail'];

         $sql="insert into usuarios (sLogin,sClave,sNombre,sApellido,sEmail) values (?,?,?,?,?)";
         $Datos=preparar_query($Conexion,$sql,[$Usuario,$Clave,$Nombre,$Apellido,$Email]);
         

          if ($Datos==true)
              {
                echo "Usuario insertado correctamente";
              }
              else
              {
                echo "Usuario no insertado";
              }

       }

?>


<html>
    <head>

    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    </head>
    <body>

    <br><br><h1 class="text-center">Crear Usuario</h1><br><br>
<form method='POST' action="CreateUsuario.php" style="padding-left:35%; padding-right:35%">

  <div class="form-group text-center">
    <label for="NombredeUsuario">Nombre de Usuario</label>
    <input type="text" name="txtUsuario" class="form-control" id="NombredeUsuario" required>
  </div>

  <div class="form-group text-center">
    <label for="Contraseña">Contraseña</label>
    <input type="password" name="txtClave" class="form-control" id="Contraseña" required>
  </div>

  <div class="form-group text-center">
    <label for="Nombre">Nombre</label>
    <input type="text" name="txtNombre" class="form-control" id="Nombre" required>
  </div>

  <div class="form-group text-center">
    <label for="Apellido">Apellido</label>
    <input type="text" name="txtApellido" class="form-control" id="Apellido" required>
  </div>

  <div class="form-group text-center">
    <label for="Email">Email</label>
    <input type="email" name="txtEmail" class="form-control" id="Email" required>
  </div>

  <div class="form-group form-check text-center">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
  </div>

  <button type="submit" class="btn btn-outline-primary" style="margin-left:38%">Registrarse</button>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>