<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <?php
    $sql="select * from Categorias";
    $Categorias=preparar_select($Conexion,$sql);  //Reemplazar como hizo el profe German $productos por $categorias.
    foreach($Categorias as $Categoria){ 
    ?>
      <li class="nav-item active">
        <a class="nav-link" href="/dbCompraEnSalta/Index.php?iId=<?php echo $Categoria['iIdCategoria'];?>"><?php echo $Categoria['sNombre'];?></a>
      </li>

     <?php }  ?>

    </ul>
  </div>
</nav>