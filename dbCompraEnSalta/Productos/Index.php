<?php
       include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Header.php";

       $sql="select iIdProducto,sCodigo,sNombre,sDescripcion,fPrecio,iStock,iStockMinimo,bEliminado from productos";

       $cmd=preparar_select($Conexion,$sql);
 
       $titulos=$cmd->fetch_fields();

?>

<html>

        <head>
            <title>Productos</title>
        </head>


        <body>


      <br><br><br><br><br><br><br><br><h1 style="text-align:center;">Productos</h1><br><br><br><br>


<div class="ml-4">
      <a href="Create.php" class="btn btn-success btn-sm p-3"><i class="fas fa-plus-circle mr-2"></i>Agregar</a>
</div>

<br><br>


<div class="table-responsive" style="text-align:center !important;">
    <table class="table">
                <tread>            
                       <?php
                                      
                             foreach($titulos as $titulo)
                                {
                                   echo "<th style='padding-top:34px; padding-bottom:34px; text-align:center !important;'>".substr($titulo->name,1)."</th>";                              
                                }  

                                echo "<th style='padding-top:34px; padding-bottom:34px; text-align:center !important;'>Acciones</th>";
                           
                        ?>
                </tread>


                <tbody style="background-color:#F7F7F7 ;">

                            <?php
                                  if ($cmd->num_rows>0)
                                  {

                                       foreach($cmd as $fila)
                                          {

                                          echo "<tr>";
                
                                               foreach($titulos as $titulo)
                                                  {
                                                   echo "<td style='text-align:center !important; padding-top:32px !important;'>".$fila[$titulo->name]."</td>";
                                                  }

                    
                                        echo '<td><div class="d-flex flex-row" style="justify-content:center;">';

                                          
                                              echo '<div class="p-1"><a href="Update.php?iId='.$fila["iIdProducto"].'" class="btn btn-primary btn-sm p-3"><i class="far fa-edit mr-2"></i>Modificar</a></div>'; 
                                              
                                             if ($fila['bEliminado']==0) 
                                                {
                                                 echo '<div class="p-1"><a href="Delete.php?iId='.$fila["iIdProducto"].'" class="btn btn-danger btn-sm p-3"><i class="far fa-trash-alt mr-2"></i>Eliminar</a></div>';
                                                }
                                            else 
                                               {
                                                echo '<div class="p-1"><a href="Recuperar.php?iId='.$fila["iIdProducto"].'" class="btn btn-secondary btn-sm p-3" style="color:#fff"><i class="fas fa-trash-restore-alt mr-2"></i>Restore</a></div>';
                                               }
                                              
                                              echo '<div class="p-1"><a href="Categorias.php?iId='.$fila["iIdProducto"].'" class="btn btn-info btn-sm p-3"><i class="fas fa-file-alt mr-2"></i>Categoria</a></div>';
                                              echo '<div class="p-1"><a href="../Producto_Imagen/Imagenes.php?iId='.$fila["iIdProducto"].'" class="btn btn-warning btn-sm p-3" style="color:#fff"><i class="far fa-images mr-2"></i>Imagenes</a></div>'; 


                                        echo "</div>";
                                        echo '</td>';

                                        echo "</tr>";

                                          }

                                  }

                            ?>                          

                </tbody>
         
    </table>

</div>


<br><br><br><br><br><br><br><br><br>


<?php
        include "C:/xampp/htdocs/dbCompraEnSalta/Libs/Footer.php";
?>