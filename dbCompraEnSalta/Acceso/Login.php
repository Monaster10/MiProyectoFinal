<?php
     // Elegir una:
    //session_destroy();
      //session_unset();
	include '../Libs/Header.php';
	if (isset($_SESSION['iIdUsuario']))
	{ 
		echo "entre 1";
	  	header("Location: ../Index.php");
	}
    $mje="";
    $_SESSION['iIdUsuario'] = "";
    if (isset($_POST["submit"]))
    {    
      	if (isset($_POST['txtUsuario']))
        {        
        	$Usuario=$_POST['txtUsuario'];
			$Clave=$_POST['txtClave'];
			  
          	$sql="select * from usuarios where sLogin=?";
          	$Datos=preparar_select($Conexion,$sql,[$Usuario]);
			  //$fila=$Datos->fetch_assoc();   
          	if ($Datos->num_rows>0)
            {
              	$fila=$Datos->fetch_assoc();   
                if ($Clave === $fila['sClave'])
                {                 
                    $_SESSION['iIdUsuario']=$fila['iIdUsuario'];
                    $_SESSION['sLogin']=$fila['sLogin'];
                    $_SESSION['sNombre']=$fila['sNombre'];
                    $_SESSION['sApellido']=$fila['sApellido'];                  
                    header('Location: /dbCompraEnSalta/Index.php');
                }
                else
                {
                    $mje="La contraseña es incorrecta";
                }
            }
            else 
            {
                $mje="El usuario es incorrecto";
            }
        }      
	}
?>

<html>

    <title>Iniciar sesion</title>
   

    </head>
    <body>

    <div class="container">

    <br><br><h1 class="text-center">Iniciar Sesion</h1><br><br>
<form method='POST' action='Login.php' style="padding-left:35%; padding-right:35%">

      <?php
        
        if (!empty($mje))
        {
          echo "<p class='container' style='color:red;padding-left:80px'>".$mje."</p>";
        }

      ?>

  <div class="form-group text-center">
    <label for="NombredeUsuario">Nombre de Usuario</label>
    <input type="text" name="txtUsuario" class="form-control" id="NombredeUsuario" required>
  </div>

  <div class="form-group text-center">
    <label for="Contraseña">Contraseña</label>
    <input type="password" name="txtClave" class="form-control" id="Contraseña" required>
  </div>


  <div class="form-group form-check text-center">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
  </div>

  <button type="submit" value="login" class="btn btn-outline-primary" name="submit" style="margin-left:38%">Ingresar</button>
</form>
</div>


</body>
</html>



<?php
        //Reemplazar de esta manera a las demas rutas segun el profe Alberto Saleh
include '../Libs/Footer.php';

?>