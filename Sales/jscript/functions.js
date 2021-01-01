$(document).ready(function(){

    var old_order_html = $(".invoice-header").html();
    var old_table_html = $("#tbody").html();

    $(".save, .print, .save-print, .clear").prop("disabled",true);

    $(".new").click(function(){

        
        $(".item-buttons").prop("disabled", false);
        $("div .invoice-header").css("display","block");
        $("div #tbody").css("visibility","visible");
        $(".save").prop("disabled",false);
        $(".invoice-header").html(old_order_html);
        $("#tbody").html(old_table_html);
        $(".clear").prop("disabled",false);
        $(".invoice-status").text("Open");

        $(".new").prop("disabled",true);
        

        
    })

    $(".clear").click(function(){

        if(confirm("Are you sure to clear all items?"))
        {
            $(".item-buttons").prop("disabled", true);
        $("div .invoice-header").css("display","none");
        $("div #tbody").css("visibility","hidden");

        $(".invoice-header").html(old_order_html);
        $("#tbody").html(old_table_html);
        $(".new").prop("disabled",false);
        $(".save").prop("disabled",true);
        $(".clear").prop("disabled",true);
        }
        
        
    })

    $(".save").click(function(){

        

        var tbody = $("#tbody tbody");

        
        if (tbody.children().length == 0) {
            alert("Please enter items.");
            return;
        }

        if (confirm('Are you sure you want to save this invoice?')) {
            // Save it!
            
          } else {
            // Do nothing!
            return;
          }
        
            $user = $("#user-data").attr("data-username");
        $branch = $("#user-data").attr("data-branch");

        

     $("div ul .order-no").load('load_data.php',{
            user:$user,
            branch:$branch
     },function(){
         
        save_items();
        $(".btn-remove").prop("disabled", true); 
        $(".invoice-status").text("Invoice-Closed");
        $(".save").prop("disabled",true);
        $(".item-buttons").prop("disabled", true);
        $(".new").prop("disabled",false);
     });

        
        
      });


    function save_items()
    {
        $payment_method = $("input[name='payment-opt']:checked").val(); // atm or cash
        $order_no = parseInt($(".order-no").text(),10);   // integer

        $invoice_wv = parseFloat($(".invoice-twv").text());//invoice without vat in decimals
        $invoice_vat = parseFloat($(".invoice-v").text());//invoice  vat in decimals
        $invoice_total = parseFloat($(".invoice-tv").text());//invoice total vat in decimals

        var items_print = new Array();
        
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
            
            var items_values = {name:"123", qty:$item_qty, price:$item_total};
           
            items_print.push(items_values);

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
               
            }
               
             )           
           
             
           
        }
       
        )

        console.log(items_print);
        
        $.post("printer/index.php",{
            itemsprint:items_print
             
        },function(data){
            
            alert (data);
            
        })


        $.post("load_data.php",{
            order_no: $order_no,
            payment_method: $payment_method 
        })
            
        
        $.post("load_data.php",{
            order_no: $order_no,
            invoice_wv:$invoice_wv,
            invoice_v:$invoice_vat,
            invoice_total:$invoice_total
        },function(data){
            if(data){
                
                $("div .invoice-number").text(data); 
            }
            
        })
    }

})