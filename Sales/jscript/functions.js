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
        $payment_method = $("input[name='payment-opt']:checked").val(); // atm or cash
        $order_no = parseInt($(".order-no").text(),10);   // integer

        $invoice_wv = parseFloat($(".invoice-twv").text());//invoice without vat in decimals
        $invoice_vat = parseFloat($(".invoice-v").text());//invoice  vat in decimals
        $invoice_total = parseFloat($(".invoice-tv").text());//invoice total vat in decimals

        
        $("#tbody tr:not(:first)").each(function(){

            $order_no = parseInt($(".order-no").text(),10);   // integer
            $item_id = parseInt($(this).find(".item-id").text(),10); // integer
            $item_qty = parseInt($(this).find('.item-qty').text(),10); // integer
            $item_uom = $(this).find('.item-uom').text(); // text
            $item_size = $(this).find('.item-size').text(); // text
            $item_price = parseFloat($(this).find('.item-price').text());// decimal
            $item_vat = parseFloat($(this).find('.item-vat').text());// decimal
            $item_text = $(this).find('.item-text').text(); //text
            $item_without_vat = parseFloat($(this).find('.item-without-vat').text());// decimal
            $item_total = parseFloat($(this).find('.item-total').text());// decimal
            

            $.post("load_data.php",{
                order_no: $order_no,
                item_id: $item_id,
                item_qty: $item_qty,
                item_uom: $item_uom,
                item_size: $item_size,
                item_price: $item_price,
                item_vat: $item_vat,
                item_text: $item_text,
                item_wv: $item_without_vat,
                item_total: $item_total,
                // payment_method: $payment_method 
            }
               
             )           
                
            

           
        })

        $.post("load_data.php",{
            order_no: $order_no,
            payment_method: $payment_method 
        })
            
        debugger;
        $.post("load_data.php",{
            order_no: $order_no,
            invoice_wv:$invoice_wv,
            invoice_v:$invoice_vat,
            invoice_total:$invoice_total
        },function(data){
            alert(data);
        })
    }

})