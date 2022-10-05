<nav class="navbar navbar-expand-lg navbar-light bg-warning">  
  <a class="navbar-brand" href="/dbCompraEnSalta"><div class="d-none d-sm-block">Ahora podes comprar aqui en Compra en Salta</div><div class="d-block d-sm-none">Compra en Salta</div></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav navbar-right text-center">

     <?php if (isset($_SESSION['iIdUsuario'])) { ?>        
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle mr-2"></i><?php echo $_SESSION['sLogin'] ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="far fa-user mr-2"></i>Mi Cuenta</a>
          <a class="dropdown-item" href="/dbCompraEnSalta/Carrito/"><i class="fas fa-shopping-cart mr-2"></i>Carrito de Compras</a>
          <a class="dropdown-item" href="#"><i class="fas fa-file-alt mr-2"></i>Mis Ordenes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/dbCompraEnSalta/Acceso/Logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesion</a>
        </div>
     
      
            
     <?php } else {   ?>     
      <li class="nav-item active"> 
               <a class="nav-link" href="/dbCompraEnSalta/Acceso/Login.php"><i class="far fa-user mr-1"></i>Iniciar sesion</a>
            </li>           

            <li class="nav-item active"> 
               <a class="nav-link" href="/dbCompraEnSalta/Acceso/CreateUsuario.php"><i class="far fa-user mr-1"></i>Crear una cuenta</a>
            </li>
      

     
     <?php } ?> 

      


  </div>
</nav>