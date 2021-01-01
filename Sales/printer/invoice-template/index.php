<?php

 date_default_timezone_set ("Asia/Riyadh");
 
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>POS Receipt Template Html Css</title>
  
  
  
      <link rel="stylesheet" href="style.css">

  
</head>

<body>

  
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Meet Invoice</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
	  <center>
        <p > 
            <b>Main Street, Branch 1 </b><br/> <br/>
            Al Kandara, Saudia Arabia<br/>
			Phone No. 1123567890<br/>
			VAT Reg No. 00170200000056454636<br/>
       
        </p>
		</center>
		<p> 
			
            <b><center> Invoice#1704 </center> </b>
        </p>
		
		<p> 
			
			
			<p style="float:left"> Cashier: Ali J  </p>
			<p style="float:right"> <?php echo date("d/m/Y H:m:s");?></p>
			
        </p>
		
      </div>
    </div><!--End Invoice Mid-->
    <br/>

    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h2>Item</h2></td>
								<td class="Hours"><h2>Qty</h2></td>
								<td class="Rate"><h2>Price</h2></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Communication</p></td>
								<td class="tableitem"><p class="itemtext">5</p></td>
								<td class="tableitem"><p class="itemtext">SAR 375.00</p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Asset Gathering</p></td>
								<td class="tableitem"><p class="itemtext">3</p></td>
								<td class="tableitem"><p class="itemtext">SAR 225.00</p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Design Development</p></td>
								<td class="tableitem"><p class="itemtext">5</p></td>
								<td class="tableitem"><p class="itemtext">SAR 375.00</p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Animation</p></td>
								<td class="tableitem"><p class="itemtext">20</p></td>
								<td class="tableitem"><p class="itemtext">SAR 1500.00</p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Animation Revisions</p></td>
								<td class="tableitem"><p class="itemtext">10</p></td>
								<td class="tableitem"><p class="itemtext">SAR 750.00</p></td>
							</tr>
							
							
							<tr class="tableFooter">
								<td></td>
								<td class="Rate"><h2>Total</h2></td>
								<td class="payment"><h2>SAR 3,644.25</h2></td></b>
							</tr>
							
							
							<tr class="tableFooter">
								<td></td>
								<td class="Rate"><h2>Cash</h2></td>
								<td class="payment"><h2>SAR 5,000.00</h2></td>
							</tr>
							
							<tr class="tableFooter">
								<td></td>
								<td class="Rate"><h2>Balance</h2></td>
								<td class="payment"><h2>SAR 1,355.75</h2></td>
							</tr>

						</table>
					</div><!--End Table-->
	
					<div id="legalcopy">
						<center> <p class="legal">VAT 15% is inclusive  </p> </center><br/>
						<center> <p class="legal"><strong>Thank You for your purchase <br/> Rate your experience with us today.</strong>  </p> </center>
					</div>
			
				</div><!--End InvoiceBot-->
				
				<br/>
				<br/>
				<br/>
				<br/>
				
  </div><!--End Invoice-->
  
  

</body>

</html>