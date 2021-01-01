<?php


header('Content-type: text/html; charset=utf-8');
	// if(isset($_POST['text']))
	// {
	// 	echo "ok";
	// }
	 	

		date_default_timezone_set ("Asia/Riyadh");
	//phpinfo();
	 
	function addSpaces($string = '', $valid_string_length = 0) {
		if (strlen($string) < $valid_string_length) {
			$spaces = $valid_string_length - strlen($string);
			for ($index1 = 1; $index1 <= $spaces; $index1++) {
				$string = $string . ' ';
			}
		}

		return $string;
	}

	require __DIR__ . '/vendor/autoload.php';

	use Mike42\Escpos\Printer;
	use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

	$Cashier = "Ali J";
	$Date = date("d/m/Y H:i A");
	$InvoiceNo = "1704";

	try {
		
		// Enter the share name for your USB printer here
		$connector = new WindowsPrintConnector("Receipt Printer");
		$printer = new Printer($connector);
		// $printer->setFont("library/fonts/arialbd.ttf");
		$printer->setPrintLeftMargin(10);
		$printer->setJustification(Printer::JUSTIFY_CENTER);


		$printer->setEmphasis(true);
		$printer->setTextSize(3, 3);
		$printer->text("Meat Invoice\n\n");
		$printer->setEmphasis(false);
		
		
		$printer->setTextSize(1, 1);
		$printer->text("Main Street, Branch 1\n\n");
		$printer->text("Al Kandara, Saudia Arabia\n");
		$printer->text("Phone No. 0504675794\n");
		$printer->text("VAT Reg No. 300302088600003\n\n");
		
		
		$printer->setTextSize(2, 2);
		$printer->text("Invoice#" .$InvoiceNo. "\n\n");
		$printer->setTextSize(1, 1);


		$printer->text(addSpaces("Cashier: " . substr($Cashier, 0, 18) , 26) . " " . addSpaces($Date , 22) . "\n\n");


		$printer->setEmphasis(true);
		$printer->text(addSpaces('Item', 25) . addSpaces('Qty', 7) . addSpaces('Price', 16) . "\n\n");
		$printer->setEmphasis(false);

		$items = $_POST['itemsprint'];
		
		// $items[] = [
		// 	'name' => 'Communication',
		// 	'qty' => '5',
		// 	'price' => 'SAR 3,575.00'

		// ];
		
		
		
		// $items[] = [
		// 	'name' => 'Asset Gathering',
		// 	'qty' => '3',
		// 	'price' => 'SAR 225.00'

		// ];
		
		
		// $items[] = [
		// 	'name' => 'Design Development',
		// 	'qty' => '5',
		// 	'price' => 'SAR 375.00'

		// ];
		
		
		// $items[] = [
		// 	'name' => 'Animation',
		// 	'qty' => '20',
		// 	'price' => 'SAR 1500.00'

		// ];
		
		
		// $items[] = [
		// 	'name' => 'Animation Revisions',
		// 	'qty' => '10',
		// 	'price' => 'SAR 750.00'

		// ];
		
		
		
		foreach ($items as $item) {
		   $printer->text(addSpaces(substr($item['name'], 0 , 22), 25) . addSpaces($item['qty'], 7) . addSpaces($item['price'], 16) . "\n");
		   
		}
	
	
		$printer->setEmphasis(true);
		$printer->text("\n");
		$printer->text(addSpaces('', 22) . addSpaces('Total', 10) . addSpaces('SAR 3,644.25', 16) . "\n\n");
		$printer->text(addSpaces('', 22) . addSpaces('Cash', 10) . addSpaces('SAR 5,000.00', 16) . "\n\n");
		$printer->text(addSpaces('', 22) . addSpaces('Balance', 10) . addSpaces('SAR 1,355.75', 16) . "\n\n\n");
		$printer->setEmphasis(false);
		
		
		$printer->text("VAT 15% is inclusive\n\n\n");
		$printer->text("Thank You for your purchase\n");
		$printer->text("Rate your experience with us today.\n\n\n\n\n\n");
		
		
		$printer->cut();
		
		/* Close printer */
		$printer->close();
		
	} catch(Exception $e) {
		echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
	}

	
	


