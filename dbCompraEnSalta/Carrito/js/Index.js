function Subtotal(id)
    {
     var precio=document.getElementById('PrecioN'+id).value; 
     var aux=document.getElementById('CantidadN'+id).value;
     if (aux<=0)  //Evita que el usuario ingrese un numero negativo... 
      {
         var cantidad=document.getElementById('CantidadN'+id).value=1;
      }
      var cantidad=document.getElementById('CantidadN'+id).value;

     var calculo=(precio*cantidad);
     document.getElementById('SubtotalN'+id).innerHTML='$ '+calculo.toFixed(2);

     $.ajax({
        url: 'Update.php',
        data: 'Action=Cambiar&Producto_id='+id+'&Cantidad='+cantidad+'&Subtotal='+calculo,
        type: 'post',
        dataType: 'json',
        success: function(data) 
        {  
           var Total= data.Total;
           $('.fTotal').html(Total);
            
        }
      });


    }

