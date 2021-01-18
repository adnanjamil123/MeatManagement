// var items = [ "عجل كامل" ,
//               "نص عجل",
//               "عجل ربع",
//                "ثمن",
//              "لحم عجل بلدي",
//              "لحم عجل وسط",
//              "لحم عجل وسط",
//              "لحم صافي",
//             "كامل خروف" ,
//             "نص خروف",
//             "خروف ربع"];

 
function lang_change(lng)
 {
 $.post("includes/language.inc.php",{
   language:lng
 },function(){
  
 })

}

$(document).ready(function(){

  $lang = $("html").attr("lang");
  $('a').removeClass("lang-selected");
  $('.'+$lang).addClass("lang-selected");
       
 
})

$(document).ready(function(){
  $("div .internet-status").text("Connected");

  // this is for checking internet connection.
  function handleConnectionChange(event){
    
    if(event.type == "offline"){
        $("div .internet-status").text("Disconnected");
    }
    if(event.type == "online"){
     
      $("div .internet-status").text("Connected");
    }
    
    console.log(new Date(event.timeStamp));
}
  
window.addEventListener('online', handleConnectionChange);
window.addEventListener('offline', handleConnectionChange);


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
    var theLanguage = $('html').attr("lang");
    $uom = $($button).attr('data-uom');

    if($uom == "2")
    {
      if(theLanguage == "en")
      {
        $uom = "piece";
      }else
      {
        $uom = "قطعة"
      }
    }else if($uom == "1")
    {
      if(theLanguage == "en")
      {
        $uom = "Kg";
      }else
      {
        $uom = "كيلو"
      }
    }else{
      $uom = "";
    }

    $name = $($button).attr('name');
    $id = $($button).attr('data-id');
    $price = parseFloat($($button).val());
   
    $('#itemsModal .modal-title').text($name);
    $('#itemsModal .modal-title').attr('data-id-item', $id);
    $('.modal-uom').text($uom);  

    $('#fprice').val($price.toFixed(2));  

    $('#fqty').val(1);

    });
  
    $('#itemsModal').on('shown.bs.modal', function (e) {

      var $button = e.relatedTarget;
      var theLanguage = $('html').attr("lang");
             
     
      $show_sizes = $($button).attr('data-size');
      $qty_disabled = $($button).attr('data-qty-disable');
      $price = $($button).val();
      
      if($('#fqty').focus())
      {
        $('#fqty').select();
      }
      if($('#fprice').focus())
      {
        $('#fprice').select();
      }
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
      
      if($show_sizes == 0)
      {
        
        $('div .item-sizes').hide();
        
      }else if($show_sizes == 1)
      {
        $('div .item-sizes').show();
        if(theLanguage == "en")
        {
          
          $('div .item-sizes').html(
            `<label class="col form-check-label text-success">
                <input type="radio" class="form-check-input" name="optradio" value="SMALL" checked>SMALL
            </label>
            
            <label class="col form-check-label text-primary">
                <input type="radio" class="form-check-input" name="optradio" value="MEDIUM">MEDIUM
            </label>
            
            <label class="col form-check-label text-info">
                <input type="radio" class="form-check-input" name="optradio" value="LARGE">LARGE
            </label>`
          );
        }else if(theLanguage == "ar")
        {
           
          $('div .item-sizes').html(
            `<label class="col form-check-label text-success">
                <input type="radio" class="form-check-input" name="optradio" value="SMALL" checked>صغير
            </label>
            
            <label class="col form-check-label text-primary">
            <input type="radio" class="form-check-input" name="optradio" value="MEDIUM">متوسط
            </label>
            
            <label class="col form-check-label text-info">
            <input type="radio" class="form-check-input" name="optradio" value="LARGE">كبير
            </label>`
          );
        }

      }else if($show_sizes == 2)
      {
        $('div .item-sizes').show();
        if(theLanguage == "en")
        {
          
          $('div .item-sizes').html(
            `<label class="col form-check-label text-danger">
                <input type="radio" class="form-check-input" name="optradio" value="FULL" checked>FULL
            </label>
            
            <label class="col form-check-label  text-primary">
                <input type="radio" class="form-check-input" name="optradio" value="HALF">HALF
            </label>
            
            <label class="col form-check-label  text-success">
                <input type="radio" class="form-check-input" name="optradio" value="QUARTER">QUARTER
            </label>`
          );
        }else if(theLanguage == "ar")
        {
           
          $('div .item-sizes').html(
            `<label class="col form-check-label text-danger">
                <input type="radio" class="form-check-input" name="optradio" value="FULL" checked>كامل
            </label>
            
            <label class="col form-check-label  text-primary">
            <input type="radio" class="form-check-input" name="optradio" value="HALF">نصف
            </label>
            
            <label class="col form-check-label  text-success">
            <input type="radio" class="form-check-input" name="optradio" value="QUARTER">ربع
            </label>`
          );
        }

        
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

      $price_w = parseFloat($('#fprice').val());  
      $price_with_vat= ($price_w).toFixed(2);  
      $qty = $('#fqty').val();

      if( $price_with_vat <= 0)
      {
        
        $('#fprice').focus();
        $('#fprice').val(0);
        $('#fprice').select();
        
        return;
      }

      if( $qty <= 0)
      {
        
        $('#fqty').focus();
        $('#fqty').val(0);
        $('#fqty').select();
        
        return;
      }

     $desc = $('#itemsModal .modal-title').text();
     $qty2 = $('#fqty').val();
     $qty = (parseFloat($qty2)).toFixed(2);
     $uom =$('.modal-uom').text(); 
     $size = $('div .item-sizes').is(':visible') ? $("input[name='optradio']:checked").val() :" ";
     $vat = $("#item_clicked").attr('data-vat');
     $item_id = $("#itemsModal .modal-title").attr('data-id-item');
     $price_without_vat= ($('#fprice').val())*(1-$vat).toFixed(2);  
     $total = ($qty * $price_with_vat).toFixed(2);
     $total_without_vat = ($qty * $price_without_vat).toFixed(2);
     $vat2 = ($total-$total_without_vat).toFixed(2);

     $('#tbody').append(`<tr id="Row"> 
      <td class="text-center noprint"> 
       <button class="btn btn-remove text-light" style="background:#204b6d"
           type="button" onclick='$(this).parent().parent().remove()'> <i class="fa fa-trash"></i></button> 
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

      $('.modal').modal('hide');
      
    })

    $("#tbody").bind("DOMSubtreeModified", function() {
      update_totals();
  });  

  

    
});


