$(document).ready(function(){

    $(".new").click(function(){

        $user = $("#user-data").attr("data-username");
        $branch = $("#user-data").attr("data-branch");

        

     $("div .invoice-header").load('load_data.php',{
            user:$user,
            branch:$branch
     },function(){
         
         
     });
        
    })

    $(".save").click(function(){
        
        

        save_items();
        
      });


    function save_items()
    {
        $("#tbody tr:not(:first)").each(function(){

            $order_no = $(".order-no").text();   
            $item_id = $(this).find(".item-id").text();
            $item_qty = $(this).find('.item-qty').text();
            $item_uom = $(this).find('.item-uom').text();
            $item_size = $(this).find('.item-size').text();
            $item_price = $(this).find('.item-price').text();
            $item_vat = $(this).find('.item-vat').text();
            $item_text = $(this).find('.item-text').text();
            $item_without_vat = $(this).find('.item-without-vat').text();
            $item_total = $(this).find('.item-total').text();


            // $.post( "insert_data.php" , function(data){
            //     alert (data);
            // });

            $.post("insert_data.php",{
                order_no: $order_no,
                item_id: $item_id,
                item_qty: $item_qty,
                item_uom: $item_uom,
                item_size: $item_size,
                item_price: $item_price,
                item_vat: $item_vat,
                item_text: $item_text,
                item_wv: $item_without_vat,
                item_total: $item_total
            },function(data){
                alert(data);
            });

           
        })
    }

})