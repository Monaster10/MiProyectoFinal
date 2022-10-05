<?php
    // session start ();
    include '../libs/header.php';
?>

<?php
    if(!empty($_GET["iId"])) {
        $iIdProducto=$_GET["iId"];
    }
    else {
    if (!empty($_POST)) {
        $iIdProducto=$_POST['iIdProducto'];
        $iOrden=$_POST['txtiOrden'];
        $sNombreArchivo=$_FILES['fileimagen']['name'];
        $sTIpoExtension=$_FILES['fileimagen']['type'];

        //mueve el archivo de lugar temporal al destino, sistema
        $sPath=$_SERVER["DOCUMENT_ROOT"]."/dbCompraEnSalta/Imagenes";
        //moverlo
        move_uploaded_file($_FILES["fileimagen"]["tmp_name"],$sPath.'/'.$sNombreArchivo); 

        $sql="insert into imagenes (sNombreArchivo,sTipoExtension,sPath) values(?,?,?)";
        $cmd=preparar_query($Conexion,$sql,[$sNombreArchivo,$sTIpoExtension,$sPath]);
        
        if($cmd) {

        $iIdImagen=$cmd->insert_id;
        $sql="insert into Producto_Imagen(iIdProducto,iIdImagen,iOrden) values(?,?,?)";
        $cmd=preparar_query($Conexion,$sql,[$iIdProducto,$iIdImagen,$iOrden]);

            }

        }
    }
    $sql="select pi.*,i.sNombreArchivo from Producto_Imagen pi inner join Imagenes i on i.iIdImagen=pi.iIdImagen where iIdProducto=?";
    $imagenes=preparar_select($Conexion,$sql, [$iIdProducto]);

?>
<br><h1>Selecciona Imagen</h1><br><br><br>
<form id="imageform" class="form-horizontal" action="Imagenes.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="iIdProducto" id="iIdProducto" value=<?php echo $iIdProducto; ?>>
<div class="form-group row w-100">
<label for="fileimagen" class="col-2">Imagen</label>
<input type="file" class="col" name="fileimagen" id="fileimagen" required>
</div>
<div class="form-group row w-100">
<label for="txtiOrden" class="col-2">Orden</label>
<input type="number" class="col-2" name="txtiOrden" id="txtiOrden" required>
</div>
<div class="form-group row w-100">
<button class="btn btn-primary ml-5" type="submit">Agregar imagen</button>
</div>
</form>
<br><br><br>
<div class="table-responsive w-100">

<div class="ml-4" style="padding-top:50px !important;"><a href="/dbCompraEnSalta/Productos/" class="btn btn-success btn-sm p-2"><i class="fas fa-arrow-circle-left mr-2"></i>Volver Atras</a></div> 
<br><br>
<table class="table table-striped w-100">
<thead class="text-center">
<th>Imagen</th>
<th>Nombre</th>
<th>Orden</th>
<th>Acciones</th>
</thead>
<tbody>
    <?php
    if($imagenes->num_rows>0){

    
        foreach($imagenes as $imagen) {
            echo "<tr style='text-align:center'>";

            echo "<td><img src='/dbCompraEnSalta/Imagenes/". $imagen['sNombreArchivo'] . "' width='50px' height='60px'></td>";
            echo "<td style='padding-top:32px !important;'>".$imagen["sNombreArchivo"]."</td>";
            echo "<td style='padding-top:32px !important;'>".$imagen["iOrden"]."</td>";

            echo '<td><div class="p-1"><a href="Delete.php?iIdProIm='.$imagen['iIdProducto_Imagen'].'&iIdIm='.$imagen['iIdImagen'].'&iId='.$imagen['iIdProducto'].'" class="btn btn-danger btn-sm p-3"><i class="far fa-trash-alt mr-2"></i>Eliminar</a></div></td>';
            echo "</tr>";
        }
        
     }   
    ?>
</tbody>
</table>
</div>
<?php
    include "../libs/footer.php";

?>