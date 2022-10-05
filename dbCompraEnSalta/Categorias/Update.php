<?php
     include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Header.php";  // '../libs/header.php;
?>
<?php 
        if (!empty($_GET['iId'])) 
            {
               $iIdCategoria=$_GET['iId'];
               $sql="select * from Categorias where iIdCategoria=?";
               $datos=preparar_select($Conexion,$sql,[$iIdCategoria]);

               if ($datos->num_rows>0)
               {
                 $fila=$datos->fetch_assoc();
               }
            }

        if (!empty($_POST)) { 
           
            $iIdCategoria=$_POST['iIdCategoria'];
            $sNombre=$_POST['txtsNombre'];
            $sDescripcion=$_POST["txtsDescripcion"];
          
            
            $sql ="update categorias set sNombre=?, sDescripcion=?, dFechaAlta=now() where iIdCategoria=?";
            $cmd = preparar_query($Conexion,$sql,[$sNombre,$sDescripcion,$iIdCategoria]); 
            if($cmd)
                {
                  header("location: Index.php");
                }

                else
                {
                $mje="Error: " . $sql . "" . $cmd->error;
                }
            }
        
                

?>

<br><br>

<div style="padding-top:30px !important; margin-bottom:40px">
        <a href="Index.php" class="btn btn-success btn-sm p-2"><i class="fas fa-arrow-circle-left mr-2"></i>Volver Atras</a>
</div>  

<form id="createform" class="form-horizontal" role="form" action="Update.php" method="POST" autocomplete="off">
<input type="hidden" name="iIdCategoria" value=<?php echo $iIdCategoria;?>>
      <div class="form-group row w-100">
           <label for="txtsNombre" class="col-2">Nombre</label>
           <div class="col-2">
            <input type="text" class="form-control form-control-sm" name="txtsNombre" id="txtsNombre" value="<?php echo $fila['sNombre']?>">
         </div>
      </div>
      <div class="form-group row w-100">
      <label for="txtsDescripcion" class="col-2">Descripcion</label>
      <div class="col-2">
      <textarea rows="4" class="form-control form-control-sm" cols="100" name="txtsDescripcion" required><?php echo $fila['sDescripcion']?></textarea>
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
