<?php
    include "Libs/Header.php";
?>
<style> .card {color:#000} .card:hover{text-decoration:none; color:#000} </style>
<?php
  
    include "libs/MenuBuscar.php";
    include "libs/MenuCategoria.php";
?> 

<?php

    if (!empty($_POST['iIdProductoAñadido']))
    {
      $Usuario=$_SESSION['iIdUsuario'];
      $iIdProductoAñadido=$_POST['iIdProductoAñadido'];
      $iQuantity=$_POST['iQuantity'];
      
      $sqlPrecio="select fPrecio from Productos where iIdProducto=?";
      $cmdPrecio=preparar_select($Conexion,$sqlPrecio,[$iIdProductoAñadido]);
      $precio_p=$cmdPrecio->fetch_assoc();
      $precio_Producto=$precio_p['fPrecio'];
      //Comparamos si el carrito esta en curso o no.
      $sql="select count(*) as total from carritoscompra cc where cc.sEstado='En curso' and iIdUsuario=?";
      $cmd=preparar_select($Conexion,$sql,[$Usuario]);
      $r=$cmd->fetch_assoc();  
      
          if($r['total']==0)
        {
          $sqla='insert into carritoscompra(iIdUsuario,dFecha,sEstado,fTotal) values(?,now(),"En curso",0)';
          $cmda=preparar_query($Conexion,$sqla,[$Usuario]);

        }
          $sqld="select iIdCarritoCompra from carritoscompra cc where cc.sEstado='En curso' and cc.iIdUsuario=?";
          $cmdid=preparar_select($Conexion,$sqld,[$Usuario]);
          $far=$cmdid->fetch_assoc();
          $iIdCarritoCompra=$far['iIdCarritoCompra'];
          
          $sComp="select iIdProducto,iCantidad,fSubtotal from det_carrito where iIdCarritoCompra=?";
          $cmdComp=preparar_select($Conexion,$sComp,[$iIdCarritoCompra]);
          $co=0;
          foreach ($cmdComp as $Comparacion)
            {
              if ($Comparacion['iIdProducto']==$iIdProductoAñadido)
                {
                  $sqlUpdate="update det_carrito set iCantidad=?,fSubtotal=? where iIdProducto=?";
                  $suma=($iQuantity+$Comparacion['iCantidad']);
                  $subtotal=($suma*$precio_Producto);
                  $cmdUpdate=preparar_query($Conexion,$sqlUpdate,[$suma,$subtotal,$iIdProductoAñadido]); 
                  $co++;
                }              


            }
            if($co==0)
            {
             $sqlInsert="insert into det_carrito(iIdProducto,iIdCarritoCompra,iCantidad,fPrecio,fSubtotal) values (?,?,?,?,?)";
             $sub=($iQuantity*$precio_Producto);
             $cmdInsert=preparar_query($Conexion,$sqlInsert,[$iIdProductoAñadido,$iIdCarritoCompra,$iQuantity,$precio_Producto,$sub]);
            }

            
            $tt = "select SUM(fSubtotal) AS Total from det_carrito where iIdCarritoCompra=?";
            $ctt = preparar_select($Conexion,$tt,[$iIdCarritoCompra]);
            $ftt = $ctt->fetch_assoc();

            $sqltot="update carritoscompra set fTotal=? where iIdCarritoCompra=?";
            $ctot = preparar_select($Conexion,$sqltot,[$ftt['Total'],$iIdCarritoCompra]);

    }


?>

<br><h1 class="text-center">Productos</h1><br><br>

<div class="card-deck w-100 px-5">
<div class="row row-cols-1 row-cols-md-4 w-100 h-100">

<?php
if (!empty($_GET['iId']))
{
  $iIdCategoria=$_GET["iId"];
  $sqlc="select p.*,i.sNombreArchivo,i.sPath from Productos p inner join producto_imagen pi inner join Imagenes i inner join producto_categoria pc on p.iIdProducto=pi.iIdProducto and pi.iIdImagen=i.iIdImagen and pc.iIdProducto=p.iIdProducto where p.bEliminado=0 and i.bEliminado=0 and pc.iIdCategoria=?";
  $productos=preparar_select($Conexion,$sqlc,[$iIdCategoria]);

}else{
    $sql="select p.*,i.sNombreArchivo,i.sPath from Productos p inner join Producto_Imagen pi inner join Imagenes i on p.iIdProducto=pi.iIdProducto and pi.iIdImagen=i.iIdImagen where p.bEliminado=0 and i.bEliminado=0";
    $productos=preparar_select($Conexion,$sql);
}    
    foreach($productos as $producto) { 
?>
    
<br><br><br><br>

<div class="col mb-4">
  <div class="card h-100 w-100">
  <?php echo '<a href="/dbCompraEnSalta/Productos/Individual.php?iIdIndividual='. $producto["iIdProducto"].'" style="text-decoration:none;cursor: default; color: #000;">'; ?>
    <img src="/dbCompraEnSalta/Imagenes/<?php echo $producto["sNombreArchivo"];?>" class="card-img-top mr-auto ml-auto my-3" alt="..." style="margin: 0; padding: 0; height:150px;width:150px;display:block;">
    <div class="card-body"> 
      <h5 class="card-title"><?php echo $producto ["sNombre"];?></h5>
      <p class="card-text"><?php echo $producto ["sDescripcion"];?></p>
      <p class="card-text"></p>
    </div>
  </a>
    
    <div class="card-footer">
    <form name="insertar" action="Index.php" method="POST">
    <input type="hidden" name="iIdProductoAñadido" value=<?php echo $producto['iIdProducto'] ?>>
        <p class="text-center"><?php echo "$ ".$producto["fPrecio"];?></p>
        <div class="input-group mb-0">
         <input class="form-control form control-sm" type="number" min="1" name="iQuantity" value="1">
        <div class="input-group-prepend">
         <input type="submit" value="añadir" class="btn btn-outline-dark btn-small">     
        </div>
      </div>
    </form>
    </div>   
    </div>
</div>

<?php
    //Fijarse como concatenar correctamente
    }
?> 
  </div>
</div>
<br><br>
<?php
    include "Libs/Footer.php";
?>