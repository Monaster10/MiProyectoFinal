<?php 
  include '../Libs/Header.php';
?>

<?php
  $Usuario=$_SESSION['iIdUsuario'];
  $sql="select iIdCarritoCompra from carritoscompra where iIdUsuario=?";
  $cmd=preparar_select($Conexion,$sql,[$Usuario]);
  $rcmd=$cmd->fetch_assoc();
  $iIdCarritoCompra=$rcmd['iIdCarritoCompra'];
    //
  $sqlDetalle="select iIdDet_Carrito,p.sNombre,dc.iIdProducto,iIdCarritoCompra,iCantidad,iStock,dc.fPrecio,fSubtotal,i.sNombreArchivo from det_carrito dc inner join productos p inner join Producto_Imagen pi on p.iIdProducto=pi.iIdProducto inner join Imagenes i on pi.iIdImagen=i.iIdImagen where pi.iOrden=1 and p.bEliminado=0 and i.bEliminado=0 and dc.iIdCarritoCompra=? and dc.iIdProducto=p.iIdProducto order by iIdDet_Carrito";
  $cmdDetalle=preparar_select($Conexion,$sqlDetalle,[$iIdCarritoCompra]);
?>

<style> <?php include 'style.css' ?> </style>
<body> 
<br><br>

<h1 class="w-100 text-center">Carrito de Compras</h1><br><br><br>
<table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php
    $total=0;
    if($cmdDetalle->num_rows>0) { ?>
     
    <?php  foreach($cmdDetalle as $titulo)
      {
    ?>

    <tr>
      <th scope="row">
      <img src="../Imagenes/<?php echo $titulo['sNombreArchivo'];?>" width='60px' height='60px' alt="..." style="border: 1px solid #D7E0EA">
      </th>
      <td><?php echo $titulo['sNombre'] ?></td>
      <td>$ <?php echo $titulo['fPrecio'] ?></td>
      <input type="hidden" id="PrecioN<?php echo $titulo['iIdProducto'] ?>" value="<?php echo $titulo['fPrecio'] ?>">    
      <td class="m-auto"><input class="form-control form-control-sm w-25 m-auto" name="Qc[]" id="CantidadN<?php echo $titulo['iIdProducto']?>" type="number" min="1" value="<?php echo $titulo['iCantidad']?>" onblur="Subtotal(<?php echo $titulo['iIdProducto']; ?>)"></td>
      <td id="SubtotalN<?php echo $titulo['iIdProducto'] ?>">$ <?php echo $titulo['fSubtotal'] ?></td> 
      <?php
        $total=($total+$titulo['fSubtotal']);

      ?>
      <td class="d-flex justify-content-center"> 
       <?php  
        echo '<div class="p-1"><a href="Delete.php?iIdCarritoCompra='.$iIdCarritoCompra.'&iIdProducto='.$titulo['iIdProducto'].'" class="btn btn-danger btn-sm p-1"><i class="far fa-trash-alt mr-2"></i>Eliminar</a></div>';
       ?>
      </td>
    </tr>
  <?php 
     }
    }
  ?>
  </tbody>
</table>
<div class="w-100 text-right text-white bg-secondary py-3 pr-5"><b>TOTAL : $ <span class="fTotal"> <?php echo $total?></span></b></div>

<div class="float-left ml-4">
 <div class="d-flex">
 <div class="mr-3 mt-5"><button type="submit" class="bs btn btn-info btn-sm p-3" style="color:#fff">ACTUALIZAR CARRITO</button></div>
  <div class="mt-5"><a href="../Index.php" class="bs btn btn-outline-info btn-sm p-3">SEGUIR COMPRANDO</a></div>
 </div>
</div>

<br><br><br><br><br><br><br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
<?php
include 'js/Index.js';
?>
</script>

<?php
include '../Libs/Footer.php';
?>
</body>
</html>