<?php
    require_once "../Libs/Conexion.php";
    require "../Libs/Funciones.php";
    session_start();
?>

<?php

    if ($_POST['Action']=='Cambiar')
        {
        $iIdProducto=$_POST['Producto_id'];
        $Cantidad=$_POST['Cantidad'];
        $Subtotal=$_POST['Subtotal'];

        $Usuario=$_SESSION['iIdUsuario'];
        $sqlid="select iIdCarritoCompra from carritoscompra cc where cc.sEstado='En Curso' and cc.iIdUsuario=?";
        $cmdid=preparar_select($Conexion,$sqlid,[$Usuario]);
        $rid=$cmdid->fetch_assoc();
        $iIdCarritoCompra=$rid['iIdCarritoCompra'];   
        
        $sqlb="update det_carrito set iCantidad=?,fSubtotal=? where iIdProducto=?";
        $cmdb=preparar_query($Conexion,$sqlb,[$Cantidad,$Subtotal,$iIdProducto]);

        $sqlTotal="SELECT SUM(fSubtotal) as Total FROM det_carrito WHERE iIdCarritoCompra=?";
        $cmdTotal=preparar_select($Conexion,$sqlTotal,[$iIdCarritoCompra]);
        $resTotal=$cmdTotal->fetch_assoc();
        
        $sqlTotal="update carritoscompra set fTotal=? where iIdCarritoCompra=?";
        $cmd_Total=preparar_query($Conexion,$sqlTotal,[$resTotal['Total'],$iIdCarritoCompra]);
        echo json_encode($resTotal);

        }
        

?>


