<?php
    include "../Libs/Header.php";
?>

<style>
input[type="checkbox"]
     {
       position: relative;
       width: 60px;
       height: 30px;
       -webkit-appearance: none;
       background: #c6c6c6;
       outline: none;
       border-radius: 20px;
       box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
       transition: .5s;
     }



input:checked[type="checkbox"]
   {
    background: #03a9f4;
   }


input[type="checkbox"]:before
   {
    content: '';
    position: absolute;
    width: 30px;
    height: 30px;
    border-radius: 20px;
    top: 0;
    left: 0;
    background: #fff;
    transform: scale(1.1);
    box-shadow: 0 2px 5px rgba(0,0,0,.2);
    transition: .5s;
   }

input:checked[type="checkbox"]:before
     {
       left:30px;
     }

</style>


<?php

    if(!empty($_GET["iId"])) {
        $iIdCategoria=$_GET["iId"];
    }
    else
    {
        if (!empty($_POST))
        {
            $iIdCategoria=$_POST["iIdCategoria"];
            $sqld="delete from Producto_Categoria where iIdCategoria=?";
            $cmdd=preparar_query($Conexion,$sqld,[$iIdCategoria]);

            $sql="insert into Producto_Categoria (iIdProducto,iIdCategoria) values (?,?)";
           
            foreach ($_POST['Ids'] as $IId) 
            {
            $cmd=preparar_query($Conexion,$sql,[$IId,$iIdCategoria]);

            }

        }
            
    }

    $sql="select iIdProducto,sNombre,sDescripcion,fPrecio from Productos";
    $cmd= preparar_select($Conexion,$sql);
    $titulos=$cmd->fetch_fields();



?>
<div style="padding-top:30px !important; margin-bottom:40px">
        <a href="Index.php" class="btn btn-success btn-sm p-2"><i class="fas fa-arrow-circle-left mr-2"></i>Volver Atras</a>
</div>

<form id="ProductoCategoria" action="Productos.php" method='POST'>  
<input type="hidden" name="iIdCategoria" value="<?php echo $iIdCategoria;?>">

<div class="table-responsive" style="text-align:center !important;">
    <table class="table">
                <tread>            
                       <?php
                                echo "<th style='padding-top:34px; padding-bottom:34px; text-align:center'>Seleccion</th>";      
                             foreach($titulos as $titulo)
                                {
                                 echo "<th style='padding-top:34px; padding-bottom:34px; text-align:center !important;'>".substr($titulo->name,1)."</th>";                              
                                }  
   
                        ?>
                </tread>


                <tbody style="background-color:#F7F7F7 ;">

                            <?php
                                  if ($cmd->num_rows>0)
                                  {

                                       foreach($cmd as $fila)
                                          {
                                          $Producto=$fila["iIdProducto"];
                                          echo "<tr>";
                                          $sqlk="select count(*) as Cantidad from producto_categoria pc where pc.iIdCategoria=? and pc.iIdProducto=?";
                                          $cmdk=preparar_select($Conexion,$sqlk,[$iIdCategoria,$Producto]);
                                          $fak=$cmdk->fetch_assoc();

                                          if ($fak['Cantidad']==0)
                                            {
                                             echo "<td class='text-center' style='padding-top:27px !important; padding-bottom:22px !important'><input type='checkbox' name='Ids[]' value='".$fila['iIdProducto']."'></td>";
                                            }
                                          else 
                                            {
                                                echo "<td class='text-center' style='padding-top:27px !important; padding-bottom:22px !important'><input type='checkbox' name='Ids[]' value='".$fila['iIdProducto']."' checked></td>";          
                                            }
                                               foreach($titulos as $titulo)
                                                  {
                                                   echo "<td style='text-align:center !important; padding-top:32px !important;'>".$fila[$titulo->name]."</td>";
                                                  }                                    

                                        echo "</tr>";

                                          }

                                  }

                            ?>                          

                </tbody>
         
    </table>

</div>

<div class="ml-4 text-center mt-5">
<input type="submit" class="btn btn-primary btn-sm p-3 text-center" value="Agregar / Actualizar">
</div><br><br>
<!-- cerrar el DIV (el Profe no lo cerro nose porque) QUITAR PARTE DEL CODIGO DE LA TABLA (MINUTO 13 de la Videoclase 02/06/2020). --> 



</form>


<?php
    include "../Libs/Footer.php"
?>