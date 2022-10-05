
<?php include '../Libs/Header.php';?>

<?php

 if (!empty($_SESSION['iIdUsuario'])) { 
 $iIdUsuario=$_SESSION['iIdUsuario'];
 $sqlv="SELECT p.sNombre, dc.iCantidad,dc.fSubtotal FROM Productos p INNER JOIN Det_carrito dc INNER JOIN Carritoscompra c ON p.iIdProducto=dc.iIdProducto AND dc.iIdCarritoCompra=c.iIdCarritoCompra WHERE c.iIdUsuario=?";
 $cmdv=preparar_select($Conexion,$sqlv,[$iIdUsuario]);
 }
 else {
  header('Location:/dbCompraEnSalta/');
 }
?>

<style><?php include 'css/Shipping.css';?></style>

    <!-- PRIMERA PARTE - DATOS PERSONALES   -->

<h1 class="Principal-Title">Finalizar Compra</h1>
<form action="" method="post">
<div class="Cont-gen">
 <div class="Cont-Ship">
  <div class="Cont-Izq">
   <h2 class="Titul">1- Datos personales</h2>
   <div class="Padd">
   <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" name="Email"  class="form-control px-2" id="Email" placeholder="Email" required>
    </div>
    <div class="form-group">
     <label for="Nombre">Nombre</label>
     <input type="text" name="Nombre" class="form-control px-2" id="Nombre" placeholder="Nombre" required>
    </div>
    <div class="form-group">
     <label for="Apellido">Apellido</label>
     <input type="text" name="Apellido" class="form-control px-2" id="Apellido" placeholder="Apellido" required>
    </div>
    <div class="form-group">
    <label for="DNI">DNI</label>
    <input type="number" name="DNI" class="form-control px-2" id="DNI"placeholder="DNI" required>
    </div>
    
   <!--
   <div class="form-group">
    <label for="Pais">Selecciona un país</label>
    <select class="form-control px-2" id="Pais" required>
      <option value="1" select>Argentina</option>
      
    </select>  
   </div> 
        -->
   <div class="form-group">
    <label for="Teléfono o Celular">Teléfono o Celular</label>
    <input type="number" name="Teléfono o Celular" class="form-control px-2" id="Teléfono o Celular" placeholder="Teléfono o Celular" required>
   </div>
   <!--
   <div class="Envio">
    <h4 class="Tipo-Env">Método de envío</h4>
    <p>Retiro por Sucursal</p>
   </div>-->
   </div>
   
        <!--- SEGUNDA PARTE - ENTREGA/RETIRO -->

   <h2 class="Titul mt-5">2- Entrega/Retiro</h2>
   <div class="Padd">
     
     <div>

    </div>

    <div class="form-group"> 
    <label for="Domicilio">Domicilio</label>
    <input type="text" name="Domicilio" class="form-control px-2" id="Domicilio" placeholder="Domicilio" required>
   </div>
    <div class="form-group">
    <label for="Ciudad">Ciudad</label>
    <input type="text" name="Ciudad" class="form-control px-2" id="Ciudad" placeholder="Ciudad" required>
   </div>
   <div class="form-group">
    <label for="Código_Postal">Código postal</label>
    <input type="number" name="Código_Postal" class="form-control px-2" id="Código_Postal" placeholder="Código Postal" required>
  </div>

   </div>

      <!--- TERCERA Y ULTIMA PARTE - PAGOS(AGREGAR) -->

      <div class="Cont-Pagos">
   <h2 class="Titulo3">3- PAGOS</h2>
   <div class="form-group">
    <label for="Tarjeta">Seleccione una tarjeta</label>
    <select class="form-control px-2" id="Tarjeta" required>
      <option value="1" select>Visa</option>
      <option value="2" select>Mastercard</option>
      <option value="3" select>Naranja</option>
      <option value="4" select>Nativa</option>
    </select>  
   </div> 
   
   
   <div class="form-group">
     <label for="Num-Tarjeta">Número de Tarjeta</label>
     <input type="number" name="Num-Tarjeta" class="form-control px-2" id="Num-Tarjeta" placeholder="Número de Tarjeta" required>
    </div>
    <div class="form-group">
     <label for="Fecha">Fecha de vencimiento</label>
     <input type="month" name="Fecha"class="form-control px-2" id="Fecha" placeholder="Fecha" required>
    </div>
    <div class="form-group">
     <label for="Nombre-Titular">Nombre del titular</label>
     <input type="text" name="Nombre-Titular" class="form-control px-2" id="Nombre-Titular" placeholder="Nombre del titular" required>
    </div>
    <div class="form-group mb-5">
     <label for="Código-Seguridad">Código de Seguridad</label>
     <input type="number" name="Código-Seguridad" class="form-control px-2" id="Código-Seguridad" placeholder="Código de Seguridad" required>
    </div>
    
    
  </div>
  </div>
   
        <!-- RESUMEN DE PRODUCTOS -->

   <div class="Cart-Der">
    <div class="Card-Detalle">
     <h3 class="card-title text-left mt-5">Resumen</h3>
     <div class="dropdown-divider"></div><br>
     <?php $sub=0; ?>
     <?php foreach ($cmdv as $Productos) { ?>
     <div class="p mt-2" style="height:30px">
      <span class="card-text float-left"><?php echo $Productos['sNombre'].' X'.$Productos['iCantidad']; ?></span>
      <span class="card-text float-right fResultado">$ <?php echo $Productos['fSubtotal']; ?></span>
     </div>
     <?php 
     $sub=$sub+$Productos['fSubtotal'];
     } 
     ?>
     <br><div class="dropdown-divider"></div>
     <div class="pi mt-3" style="height:30px">
      <b><span class="card-text float-left">SUBTOTAL</span>
      <span class="card-text float-right fResultado">$ <?php echo $sub; ?></span></b>
     </div>
     <div class="dropdown-divider"></div>
     <div class="pi mt-3" style="height:30px">
      <b><span class="card-text float-left">TOTAL</span>
      <span class="card-text float-right fResultado mb-1">$ <?php echo $sub; ?></span></b>
     </div>
     <div class="dropdown-divider mb-4"></div>
    </div>
   </div>
 </div>
 
 <div class="ContBotones">
  <button type="submit" class="btn btn-primary mr-3">Pagar</button>  <!--Aqui reemplazo "enviar al foro" por PAGAR  -->
  <a href="/dbCompraEnSalta/Carrito/" class="btn btn-warning text-white">Volver atrás</a>
 </div>
</form>
</div>

<?php include '../Libs/Footer.php';?>

