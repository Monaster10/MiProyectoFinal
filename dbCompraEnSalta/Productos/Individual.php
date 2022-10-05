<?php 
  include '../Libs/Header.php';
?>

<?php

if (!empty($_GET['iIdIndividual']))
  {

    $iIdProducto=$_GET['iIdIndividual'];  //
    $sql="SELECT iIdProducto,sCodigo,sNombre,sDescripcion,fPrecio from productos where iIdProducto=?";
    $cmd=preparar_select($Conexion,$sql,[$iIdProducto]);
    $pro=$cmd->fetch_assoc(); 
    
    
  }

?>

<style> <?php include 'style.css' ?> </style>
<body> 
<div class="outer">
  <div class="center-wrapper">
    <div class="container-fluid content">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 shoe-slider">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"><img src="../Imagenes/Pelota.jpg" class="d-block w-100" alt="..."></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"><img src="../Imagenes/Papas 1.jpg" class="d-block w-100" alt="..."></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"><img src="../Imagenes/Fideos 1.jpg" class="d-block w-100" alt="..."></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../Imagenes/Pelota.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../Imagenes/Papas 1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../Imagenes/Fideos 1.jpg" class="d-block w-100" alt="...">
              </div> 
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a> 
            </div> 
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 shoe-content">
          <div class="text1">
            <span>KART GOODS</span>
            <span>SEA BLUE & WHITE</span>
          </div>
          <div class="text2">
            
    <!--- Realizar un fetch_assoc con los 5 campos puestos anteriormente -->
              
          </div>
          <div class="text3">   
            <?php echo $pro['sNombre'];   ?>
          </div> 
          <div class="text4">
          
          Nuestros productos son de primera calidad y 100% Recomendables. 

          </div> 
          <div class="text5">
          <?php echo $pro['sDescripcion'];   ?>
          </div> 
          <div class="btn-wrapper">
            <span class="btn">Comprar</span> 
            <span class="qantity">
              <div>
                <i class="fas fa-minus"></i>
                <span class="one">1</span>
                <i class="fas fa-plus"></i>
              </div>
              <div class="quantity-text">QUANTITY - Cantidad</div>
            </span> 

          </div> 
        </div>
      </div>
    </div>
  </div> 
</div>
<?php
include '../Libs/Footer.php';
?>
</body>
</html>