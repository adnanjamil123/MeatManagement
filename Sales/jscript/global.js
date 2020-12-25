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
function update_totals()
{

    var total = 0;
    
    var total_vat = 0;

    $("#tbody tr:not(:first)").each(function(){

        total += parseFloat($(this).find(".item-without-vat").text());
       
        total_vat += parseFloat($(this).find(".item-total").text());
                
        

        
    })

   $(".invoice-tv").text(total_vat.toFixed(2));
   
   $(".invoice-twv").text(total.toFixed(2));

   $(".invoice-v").text(($(".invoice-tv").text()-$(".invoice-twv").text()).toFixed(2));
}

   //show.bs.modal

    $('#itemsModal').on('show.bs.modal', function (e) {

    var $button = e.relatedTarget;
      
    $name = $($button).attr('name');
    $uom = $($button).attr('data-uom');
    $id = $($button).attr('data-id');
    $price = $($button).val();
   
    $('#itemsModal .modal-title').text($name);
    $('#itemsModal .modal-title').attr('data-id-item', $id);
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
    //var rowIdx = 0; 
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
     $item_id = $("#itemsModal .modal-title").attr('data-id-item');
     $price_without_vat= ($('#fprice').val())*(1-$vat);  
     $total = $qty * $price_with_vat;
     $total_without_vat = ($qty * $price_without_vat).toFixed(2);
     $vat2 = ($total-$total_without_vat).toFixed(2);

     $('#tbody').append(`<tr id="Row"> 
      <td class="text-center"> 
       <button class="btn btn-danger remove" 
           type="button" onclick='$(this).parent().parent().remove()'>Remove</button> 
       </td> 

            <td class="row-index text-center item-id"> 
            ${$item_id}</td>

           <td class="row-index text-center item-text"> 
            ${$desc}</td>

            <td class="row-index text-center item-qty"> 
            ${$qty}</td>

            <td class="row-index text-center item-uom"> 
            ${$uom}</td>

            <td class="row-index text-center item-size"> 
            ${$size}</td>

            <td class="row-index text-center item-price"> 
            ${$price_with_vat}</td>
            
            <td class="row-index text-center item-vat vat-display"> 
            ${$vat2}</td>

            <td class="row-index text-center item-without-vat vat-display"> 
            ${$total_without_vat}</td>

            <td class="row-index text-center item-total"> 
            ${$total}</td>
      </tr>`); 

      
    })

    $("#tbody").bind("DOMSubtreeModified", function() {
      update_totals();
  });  
    
  
});


