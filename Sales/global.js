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

    debugger;
   
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


    
  
});


