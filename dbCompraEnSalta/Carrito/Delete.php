<?php
    include '../Libs/Header.php';
?>

<?php

    if(!empty($_GET['iIdProducto']) and ($_GET['iIdCarritoCompra']))
    {
     $iIdProducto=$_GET['iIdProducto'];
     $iIdCarritoCompra=$_GET['iIdCarritoCompra'];
     $sql="delete from det_carrito where iIdProducto=? and iIdCarritoCompra=?";
     $cmd=preparar_select($Conexion,$sql,[$iIdProducto,$iIdCarritoCompra]);

     $tt= "SELECT SUM(fSubtotal) AS Total from det_carrito where iIdCarritoCompra=?";
     $ctt= preparar_select($Conexion,$tt,[$iIdCarritoCompra]);
     $ftt= $ctt->fetch_assoc();
     $sqltot="update carritoscompra set fTotal=? where iIdCarritoCompra=?";

     if ($ftt['Total']==0){
        $ctot= preparar_select($Conexion,$sqltot,[0,$iIdCarritoCompra]);
     }
     
       else {
        $ctot= preparar_select($Conexion,$sqltot,[$ftt['Total'],$iIdCarritoCompra]);
       }

       if ($cmd=true) {
        header("Location:Index.php");
       }
    }


?>



<?php

    include '../Libs/Footer.php';

?>