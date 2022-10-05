<?php

require_once ('Config.php');

$Conexion=new mysqli(HOST,USER,PASSWORD,DATABASE);

        if ($Conexion->connect_errno)        
        {
            echo "Error al conectar con la base de datos";
        }        
     

?>