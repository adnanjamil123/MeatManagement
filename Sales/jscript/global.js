var items = [ "عجل كامل" ,
              "نص عجل",
              "عجل ربع",
               "ثمن",
             "لحم عجل بلدي",
             "لحم عجل وسط",
             "لحم عجل وسط",
             "لحم صافي",
            "كامل خروف" ,
            "نص خروف",
            "خروف ربع"];


$(document).ready(function(){


// this is for data to be transferred from button to modal
  
    $('#itemsModal').on('show.bs.modal', function (e) {

      

    var $button = e.relatedTarget;
      
    $name = $($button).attr('name');
    $uom = $($button).attr('data-uom');
    $price = $($button).val();
   
    $('#itemsModal .modal-title').text($name);

    $('.modal-uom').text($uom);  

    $('#fprice').val($price);  

    $('#fqty').val(1);

    });
  
    $('#itemsModal').on('shown.bs.modal', function (e) {

      var $button = e.relatedTarget;
      
      
     
      $show_sizes = $($button).attr('data-size');
      $qty_disabled = $($button).attr('data-qty-disable');
      $price = $($button).val();
   
      if($price > 0 )
      {
        
        $( "#fprice" ).prop( "disabled", true );
        $('#fqty').focus();
        $('#fqty').select();
        
      }else
      {
        $( "#fprice" ).prop( "disabled", false );
        $('#fprice').focus();
        $('#fprice').select();
      }
      
      if($show_sizes == "FALSE")
      {
        
        $('div .item-sizes').hide();
        
      }else
      {
        $('div .item-sizes').show();
      }

      if($qty_disabled == "FALSE")
      {
        
        $( ".fqty" ).prop( "disabled", false );
        
      }else
      {
        $( ".fqty" ).prop( "disabled", true );
      }
  
    })
    var rowIdx = 0; 
    $(".btn-confirm").click(function(){

      $price_with_vat= $('#fprice').val();  
      $qty = $('#fqty').val();

      if( $price_with_vat < 1)
      {
        
        $('#fprice').focus();
        $('#fprice').select();
        
        return;
      }

      if( $qty < 1)
      {
        
        $('#fqty').focus();
        $('#fqty').select();
        
        return;
      }

     $desc = $('#itemsModal .modal-title').text();
     $qty = $('#fqty').val();
     $uom =$('.modal-uom').text(); 
     $size = $('div .item-sizes').is(':visible') ? $("input[name='optradio']:checked").val() :" ";
     $vat = $("#item_clicked").attr('data-vat');
    //  $price_with_vat= $('#fprice').val();  
     $price_without_vat= ($('#fprice').val())*(1-$vat);  
     $total = $qty * $price_with_vat;
     $total_without_vat = $qty * $price_without_vat;
     
     $('#tbody').append(`<tr id="R${++rowIdx}"> 
      <td class="text-center"> 
       <button class="btn btn-danger remove" 
           type="button">Remove</button> 
       </td> 
       <td class="row-index text-center"> 
           <p>${rowIdx}</p></td> 

           <td class="row-index text-center"> 
            ${$desc}</td>

            <td class="row-index text-center"> 
            ${$qty}</td>

            <td class="row-index text-center"> 
            ${$uom}</td>

            <td class="row-index text-center"> 
            ${$size}</td>

            <td class="row-index text-center"> 
            ${$price_with_vat}</td>
            
            <td class="row-index text-center"> 
            ${$vat}</td>
            <td class="row-index text-center"> 
            ${$total_without_vat}</td>

            <td class="row-index text-center"> 
            ${$total}</td>
      </tr>`); 
    })
    
  
});


