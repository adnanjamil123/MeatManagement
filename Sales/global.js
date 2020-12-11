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

    debugger;

    });
  

  
});


