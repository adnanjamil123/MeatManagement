
$(document).ready(function(){

    var items_print = new Array();
    var invoice_data = new Array();
    var invoice_number = 0;
    var user_data = new Array();

    var old_order_html = $(".invoice-header").html();
    var old_table_html = $("#tbody").html();

    function DisplayCurrentTime() {
		
        var currentdate = new Date();
		currentdate.toLocaleString('en-US', { timeZone: 'America/New_York' })
		
		var date = ('0' + currentdate.getDate()).slice(-2);
		
		var month = ('0' + currentdate.getMonth()+1).slice(-2);
		
		var year = currentdate.getFullYear();
		
        var hours = currentdate.getHours() > 12 ? currentdate.getHours() - 12 : currentdate.getHours();
		
        var am_pm = currentdate.getHours() >= 12 ? "PM" : "AM";
		
        hours = hours < 10 ? "0" + hours : hours;
		
        var minutes = currentdate.getMinutes() < 10 ? "0" + currentdate.getMinutes() : currentdate.getMinutes();
		
        time = date + "/" + month + "/" + year + " " + hours + " " + minutes + " " + " " + am_pm;
		
		return time;
        
    };
    $("#received").keyup(function(event) {
        if (event.keyCode === 13) {
            $("#btn-add").click();
        }
    });

    $("#fprice, #fqty").keyup(function(event){
        if (event.keyCode === 13) {
            $(".btn-confirm").click();
        }
    })


    $('#cash-collect').on('shown.bs.modal', function () {
        $("#checkbox").prop("checked",false);
        $("#received").prop("disabled",false);
        $("#received").val(0);
        $("#received").focus();
        $("#received").select();

    })
    

    function print()
    {   
        var currentdate = DisplayCurrentTime();
	    var current_date =  currentdate   /*"15/01/2021 18 35 PM"*/;

        $(".print-branch-name").text(user_data[1]);
        $(".print-branch-number").text(user_data[0]);
        $(".print-invoice-number").text(invoice_number);
        $(".print-username").text(user_data[2]);
        $(".print-invoice-total").text(invoice_data[0]['total']);
        $(".print-cash-received").text(invoice_data[0]['cash']);
        $(".print-cash-balance").text(invoice_data[0]['bal']);
        $(".print-date").text(current_date);

    
      
            $.each(items_print,function(key, value){
                var number = key +1;

                $("#tbody-print").append(
               ` <tr>
                <td class="serial">${number}</td>
                <td class="description">${value['name']}</td>
                <td class="quantity">${value['qty']}</td>
                <td class="price">${value['price']}</td>
                    </tr>`
                )
            })
        
        

        $('#print-div').load(window.location.href +  ' #print-div');
       
        window.print();
    }
    $(".save, .print, .clear").prop("disabled",true);

    $(".new").click(function(){
        invoice_data=[];
        user_data=[];
        items_print=[];
        $('.invoice-balance').text("0.00");
        $('.invoice-cr').text("0.00");
        $(".balance-data").css("display","none");
        $("#mb-invoice").text("");

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
        invoice_data=[];
        user_data=[];
        items_print=[];
        $('.invoice-balance').text("0.00");
        $('.invoice-cr').text("0.00");
        $(".balance-data").css("display","none");
        $("#mb-invoice").text("");
        
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
    $(".btn-add ").click(function(){

        var cash = $("#received").val();
        var checked = $("#checkbox").prop("checked");

        if(cash <= 0)
        {
            $("#received").focus();
            $("#received").select();
        }else if(cash > 0)
        {
            save_invoice(cash);
            $('#cash-collect').modal('hide');
        }
        
        if(cash <=0 && checked)
        {
            save_invoice(0);
            $('#cash-collect').modal('hide');
            $('.form-check-input').prop('checked',true);
        }
    })

    $(".btn-cancel").click(function(){
        $('#cash-collect').modal('hide');
    })

    $(".save").click(function (){


        $payment_method = $("input[name='payment-opt']:checked").val(); // atm or cash

        if(check_items_entered())
        {

            if($payment_method == "cash")
            {
                $('#cash-collect').modal('show');
                return;
            }else
            {
                save_invoice(0);
            }
        }


    })
    function check_items_entered()
    {
        var tbody = $("#tbody tbody");
        var lang = $('html').attr('lang');

        var entet_items = lang=="en"?"Please enter Items":"الرجاء إدخال العناصر.";

        if (tbody.children().length == 0) {
            alert(entet_items);
            return 0;
        }else
        {
            return 1;
        }

    }
     function save_invoice(cash_received){
       
        
        $invoice_total = parseFloat($("#total-inv").text()).toFixed(2);//invoice total vat in decimals
        var lang = $('html').attr('lang');
        var save_text = lang=="en"?"Are you sure you want to save this invoice?":"هل أنت متأكد أنك تريد حفظ هذه الفاتورة؟";
        var entet_items = lang=="en"?"Please enter Items":"الرجاء إدخال العناصر.";
        var cash_received;
        var balance = 0;
       
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
        if(cash_received <= 0)
        {
            if (confirm(save_text)) {
                // Save it!
                
              } else {
                // Do nothing!
                return;
              }
        }
        

          if(cash_received>0)
          {
              
              balance=cash_received-$invoice_total;

          }
          
         
          
        
        $user = $("#user-data").attr("data-uid");
        $branch = $("#user-data").attr("data-branch");
        $username = $("#user-data").attr("data-username");
        $branch_name=$("#branch-name").text()
        

        user_data[0] = $branch;
        user_data[1] = $branch_name;
        user_data[2] = $username;
        

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

        
        
      };


    function save_items(bal,received)
    {
        $("#overlay").css("display","block");
        var cash_received = parseFloat(received).toFixed(2);
        var balance = parseFloat(bal).toFixed(2);
        var invoice_values = new Array();
        $payment_method = $("input[name='payment-opt']:checked").val();
        
        $order_no = parseInt($(".order-no").text(),10);   // integer

        $invoice_wv = parseFloat($(".invoice-twv").text()).toFixed(2);//invoice without vat in decimals
        $invoice_vat = parseFloat($(".invoice-v").text()).toFixed(2);//invoice  vat in decimals
        $invoice_total = parseFloat($("#total-inv").text()).toFixed(2);//invoice total vat in decimals
        
       

       
        $("#tbody tr:not(:first)").each(function(){

            $order_no = parseInt($(".order-no").text(),10);   // integer
            $item_id = parseInt($(this).find(".item-id").text(),10); // integer
            $item_qty = parseFloat($(this).find('.item-qty').text()).toFixed(2); // integer
            $item_uom = $(this).find('.item-uom').text().trim(); // text
            $item_size = $(this).find('.item-size').text().trim(); // text
            $item_price = parseFloat($(this).find('.item-price').text());// decimal
            $item_vat = parseFloat($(this).find('.item-vat').text());// decimal
            $item_text = $(this).find('.item-text').text().trim(); //text
            $item_without_vat = parseFloat($(this).find('.item-without-vat').text()).toFixed(2);// decimal
            $item_total = parseFloat($(this).find('.item-total').text()).toFixed(2);// decimal
            
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
                $("#overlay").css("display","none");
                print();
                $(".print").prop("disabled",false);
            }
            
        })
       
            $('.invoice-balance').text(balance);
            $('.invoice-cr').text(cash_received);
            $(".balance-data").css("display","block");
            invoice_data.push(invoice_values);
       
    }

})