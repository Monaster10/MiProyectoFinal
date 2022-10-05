<?php
       include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Header.php";      
?>

<?php 
    if (!empty($_GET['iId']))
    {
        $iIdCategoria=$_GET['iId'];

        $sql='delete from Categorias where iIdCategoria=?';
        $cmd=preparar_query($Conexion,$sql,[$iIdCategoria]);

        if ($cmd=true)
            {
              header("Location:Index.php");
            }

    }

    else 
       {
         echo "Error";
       }

    
?>

<?php
       include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Footer.php";
?>