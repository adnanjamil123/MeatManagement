
$(document).ready(function(){

    var items_print = new Array();
    var invoice_data = new Array();
    var invoice_number = 0;
    var user_data = new Array();

    var old_order_html = $(".invoice-header").html();
    var old_table_html = $("#tbody").html();

    function print()
    {
        $.post("printer/index2.php",{
            itemsprint:items_print,
            invoice_data:invoice_data,
            inv_no:invoice_number,
            user:user_data
        },function(data){
            
            // alert (data);
            
        })
    }
    $(".save, .print, .clear").prop("disabled",true);

    $(".new").click(function(){
        invoice_data=[];
        user_data=[];
        items_print=[];
        $(".item-buttons").prop("disabled", false);
        $("div .invoice-header").css("display","block");
        $("div #tbody").css("visibility","visible");
        $(".save").prop("disabled",false);
        $(".print").prop("disabled",true);
        $(".invoice-header").html(old_order_html);
        $("#tbody").html(old_table_html);
        $(".clear").prop("disabled",false);
        $(".invoice-status").text("Open");

        $(".new").prop("disabled",true);
        

        
    })
    $(".print").click(function(){

        print();

        
    })

    $(".clear").click(function(){

        var lang = $('html').attr('lang');
        var clear_items=lang=="en"?"Are you sure to clear all items?":"هل أنت متأكد من مسح كافة العناصر؟";
        if(confirm(clear_items))
        {
            $(".item-buttons").prop("disabled", true);
        $("div .invoice-header").css("display","none");
        $("div #tbody").css("visibility","hidden");
        $(".print").prop("disabled",true);
        $(".invoice-header").html(old_order_html);
        $("#tbody").html(old_table_html);
        $(".new").prop("disabled",false);
        $(".save").prop("disabled",true);
        $(".clear").prop("disabled",true);
        }
        
        
    })

    $(".save").click(function(){
       
        $payment_method = $("input[name='payment-opt']:checked").val(); // atm or cash
        $invoice_total = parseFloat($(".invoice-tv").text());//invoice total vat in decimals
        var lang = $('html').attr('lang');
        var save_text = lang=="en"?"Are you sure you want to save this invoice?":"هل أنت متأكد أنك تريد حفظ هذه الفاتورة؟";
        var entet_items = lang=="en"?"Please enter Items":"الرجاء إدخال العناصر.";
        var cash_received;
        var balance;

        var tbody = $("#tbody tbody");

        if(navigator.onLine){

        }else
        {
            alert("No internet Connection");
            return;
        }
        
        if (tbody.children().length == 0) {
            alert(entet_items);
            return;
        }

        if (confirm(save_text)) {
            // Save it!
            
          } else {
            // Do nothing!
            return;
          }

          if($payment_method == "cash")
          {
             
            cash_received = prompt("المبلغ المستلم");
            if(cash_received==null)
            {
                return;
            }

              
              balance=cash_received-$invoice_total;
          }
          if($payment_method == "atm")
          {
              cash_received = 0;
              balance = 0;
          }
         
          $(".print").prop("disabled",false);
        
        $user = $("#user-data").attr("data-uid");
        $branch = $("#user-data").attr("data-branch");
        $username = $("#user-data").attr("data-username");

        user_data[0] = $branch;
        user_data[1] = $username;
        

     $("div ul .order-no").load('load_data.php',{
            user:$user,
            branch:$branch
     },function(){
         
        save_items(balance,cash_received);
        $(".btn-remove").prop("disabled", true); 
        $(".invoice-status").text("Invoice-Closed");
        $(".save").prop("disabled",true);
        $(".item-buttons").prop("disabled", true);
        $(".new").prop("disabled",false);
     });

        
        
      });


    function save_items(bal,received)
    {
        var cash_received = received;
        var balance = bal;
        var invoice_values = new Array();

        
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
            
            var items_values = {name:$item_text, qty:$item_qty, price:$item_total};
           
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
           
        })

        invoice_values = {wvat:$invoice_wv, vat:$invoice_vat, total:$invoice_total, cash:cash_received, bal:balance};


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
                invoice_number = data;
            }
            
        })
        
            invoice_data.push(invoice_values);
       
    }

})