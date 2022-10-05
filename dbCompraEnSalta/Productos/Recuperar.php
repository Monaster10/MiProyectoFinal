<?php
       include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Header.php";      
?>

<?php 
    if (!empty($_GET['iId']))
    {
        $iIdProducto=$_GET['iId'];

        $sql='update Productos set bEliminado=0 where iIdProducto=?';
        $cmd=preparar_query($Conexion,$sql,[$iIdProducto]);

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
