<?php
     include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Header.php";  // '../libs/header.php;
?>
<?php 
if (!empty($_GET['iId'])) { //Llave de apertura 
        $iIdProductoActual=$_GET['iId'];
        $sql="select * from productos where iIdProducto=?";
        $datos=preparar_select($Conexion,$sql,[$iIdProductoActual]);
        
        if ($datos->num_rows>0)
                {
                  $fila=$datos->fetch_assoc();
                }

        else
                {
                echo "Error: ". $sql . "" . $cmd->error;
                }
    }
    
    else
        {
        if (!empty($_POST)) { 
            $iIdProducto=$_POST['iIdProducto'];
            $sCodigo=$_POST['txtsCodigo'];
            $sNombre=$_POST['txtsNombre'];
            $sDescripcion=$_POST["txtsDescripcion"];
            $fPrecio=$_POST['txtfPrecio'];
            $iStock=$_POST['txtiStock'];
            $iStockMinimo=$_POST['txtiStockMinimo'];
            $sql = "update productos set sCodigo=?, sNombre=?, sDescripcion=?, fPrecio=?, iStock=?, iStockMinimo=? where iIdProducto=?";
            $cmd = preparar_query($Conexion,$sql,[$sCodigo,$sNombre,$sDescripcion,$fPrecio,$iStock,$iStockMinimo,$iIdProducto]); //Continuara
            if($cmd)
                {
                  header("location: Index.php");
                }

                else
                {
                $mje="Error: " . $sql . "" . $cmd->error;
                }
            }
        }
                
?>

<br><br>

<div style="padding-top:30px !important; margin-bottom:40px">
        <a href="Index.php" class="btn btn-success btn-sm p-2"><i class="fas fa-arrow-circle-left mr-2"></i>Volver Atras</a>
</div>  

<form id="createform" class="form-horizontal" role="form" action="Update.php" method="POST" autocomplete="off">
   <input type="hidden" name="iIdProducto" value=<?php echo $iIdProductoActual;?> >
   <div class="form-group row w-100">
      <label for="txtsCodigo" class="col-2">Codigo</label>
      <div class="col-2">
            <input type="text" class="form-control form-control-sm" name="txtsCodigo" id="txtsCodigo" value=<?php echo $fila['sCodigo']?>>
         </div>
      </div>
      <div class="form-group row w-100">
           <label for="txtsNombre" class="col-2">Nombre</label>
           <div class="col-2">
            <input type="text" class="form-control form-control-sm" name="txtsNombre" id="txtsNombre" value="<?php echo $fila['sNombre']?>">
         </div>
      </div>
      <div class="form-group row w-100">
      <label for="txtsDescripcion" class="col-2">Descripcion</label>
      <div class="col-2">
      <textarea rows="4" class="form-control form-control-sm" cols="100" name="txtsDescripcion" required><?php echo $fila['sDescripcion'];?></textarea>
         </div>
      </div>
      <div class="form-group row w-100">
      <label for="txtfPrecio" class="col-2">Precio</label>
      <div class="col-2">
            <input type="text" class="form-control form-control-sm" name="txtfPrecio" id="txtfPrecio" value=<?php echo $fila['fPrecio']?>>
         </div>
      </div>
      <div class="form-group row w-100">
      <label for="txtiStock" class="col-2">Stock</label>
      <div class="col-2">
            <input type="text" class="form-control form-control-sm" name="txtiStock" id="txtiStock" value=<?php echo $fila['iStock']?>>
         </div>
      </div>    
      <div class="form-group row w-100">
      <label for="txtiStockMinimo" class="col-2">Stock Minimo</label>
      <div class="col-2">
            <input type="text" class="form-control form-control-sm" name="txtiStockMinimo" id="txtiStockMinimo" value=<?php echo $fila['iStockMinimo']?>>
         </div>
      </div>
      <br><br>
      <div class="form-group">
           <button type="submit" class="btn btn-primary">Grabar</button>
        </div>
        </form>

<br><br>

<?php
        include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Footer.php";     
?>
