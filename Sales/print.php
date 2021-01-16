<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


<script>
    let user_data =localStorage.getItem("meat_userdata");
    let lines_data =  localStorage.getItem("line_data");
    let meat_invoice_no =  localStorage.getItem("meat_invoice_no");
    let meat_invoicedata =  localStorage.getItem("meat_invoicedata");
    let items_data = JSON.parse(lines_data);
    let userdata = JSON.parse(user_data);
    let meat_invoice = JSON.parse(meat_invoicedata);
    
    

	
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
	
	
	var currentdate = DisplayCurrentTime();



	var branch_name = userdata[1];
	var branch_no = userdata[0];
	var invoice_no = meat_invoice_no;
	var cashir_name = userdata[2];
	var current_date =  currentdate   /*"15/01/2021 18 35 PM"*/;
	var invoice_total = meat_invoice[0]['total'];
	var balance = meat_invoice[0]['cash'];
	var return_amount = meat_invoice[0]['bal'];
	

</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="style2.css"> -->
        <title>Receipt example</title>
        
        <style>
            
          
            * {
    font-size: 22px;
    font-family: 'Times New Roman';
	margin:0px;
	padding:0px;
}



#itemsTables td,
 th,
 tr,
 table {
    border-top: 1px solid black;
    border-collapse: collapse;
	text-align:center;
padding:10px;
	
}

#itemsTables th{
    font-size: 28px;
    
}
#itemsTables td.description,
#itemsTable th.description {
    width: 250px;
    max-width: 250px;
     word-break: break-all;
}

#itemsTables td.quantity,
#itemsTable th.quantity {
    width: 75px;
    max-width: 75px;
    word-break: break-all;
}

#itemsTables td.price,
#itemsTable th.price {
    width: 150px;
    max-width: 150px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 425px; /* 155 */
    max-width: 425px;
}


@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}

#totalAmountTable td {
	
	padding:10px;
	border: 2px solid black;
	
}


        </style>
    </head>
    <body>

    

        <div class="ticket">
            
            <p class="centered">
              <b>   <span style="font-size: 28px;" >فاتورة اللحوم   </span> </b>  <br/><br/> 

                     <span > <script> document.write(branch_name); </script> -  فرع -  <script> document.write(branch_no); </script> </span> <br/><br/>
                     <span> (0504675794) - رقم الهاتف </span> <br/><br/>
                     <span> (30030208860003) - الرقم الضريبي </span> <br/><br/> 
                 <b> <span style="font-size: 28px; border:2px solid black; padding:5px;">  <script> document.write(invoice_no); </script> رقم الفاتورة   </span> </b>  <br/><br/>
					 <span>  أمين الصندوق : <script> document.write(cashir_name); </script> </span>  <br/><br/>
					 <span>  أمين الصندوق :</span><span class="print-user-data"></span> <br/><br/>
					<span> <script> document.write(current_date); </script> : تاريخ  </span>  
				 
			</p> <br/><br/> 
				
            <table id="itemsTables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="description">الصنف</th>
                        <th class="quantity">الكمية</th>
                        <th class="price">السعر</th>
                    </tr>
                </thead>
                <tbody id="tbody-print">
                    <script>
                        
                        $.each(items_data,function(key, value){
                            var number = key +1;

                            $("#tbody-print").append(
                            `<tr>
                            <td class="description">${number}</td>
                            <td class="description">${value['name']}</td>
                            <td class="quantity">${value['qty']}</td>
                            <td class="price">${value['price']}</td>
                             </tr>`
                            )
                        })
                    </script>
                </tbody>
            </table>
			
			
			<br/><br/>
			
			<center>
			
			<table id="totalAmountTable">
			
				<tbody>
					<tr>
						<td> <span> ريال <script> document.write(invoice_total); </script>  </span> </td>
						<td> <b> <span>  مجموع </span> </b> </td>
					</tr>
					
					<tr>
						<td> <span> ريال <script> document.write(balance); </script>  </span> </td>
						<td> <b> <span>  المبلغ المستلم </span> </b> </td>
					</tr>
					
					<tr>

						<td> <span> ريال <script> document.write(return_amount); </script> </span>  </td>
						<td> <b> <span> المتبقية </span> </b>  </td>
					</tr>
				</tbody>
				
			</table>
				
			</center>
			
			<br/><br/>
			
            <p class="centered">
				
				<span style="font-size: 28px;">  15% ضريبة القيمة المضافة </span>   <br/><br/>
				<span style="font-size: 24px;"> شكرا لك على الشراء </span>  <br/><br/>
				<span style="font-size: 22px;"> قيم تجربتك معنا اليوم </span>  <br/><br/>
			
			
			</p>
			
			
        </div>
        
        <br/><br/><br/><br/>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="jscript/script.js"></script>
    </body>
</html>