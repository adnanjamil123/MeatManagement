<?php

date_default_timezone_set ("Asia/Riyadh");
	//phpinfo();
	 
	function addSpaces($string = '', $valid_string_length = 0) {
		
		
		
			$spaces = $valid_string_length - mb_strlen($string, 'UTF-8');
			for ($index1 = 1; $index1 <= $spaces; $index1++) {
				$string = $string . ' ';
			}
		
		
		
	

		return $string;
	}
	
	
	function addSpacesToCompleteString($string) {

			$spaces = 58 - mb_strlen($string, 'UTF-8');
			for ($index1 = 1; $index1 <= $spaces; $index1++) {
				$string = $string . '';
			}

		return $string;
	}
	
/*
 * This example shows Arabic image-based output on the EPOS TEP 220m.
 *
 * Because escpos-php is not yet able to render Arabic correctly
 * on thermal line printers, small images are generated and sent
 * instead. This is a bit slower, and only limited formatting
 * is currently available in this mode.
 * 
 * Requirements are:
 *  - imagick extension (For the ImagePrintBuffer, which does not
 *      support gd at the time of writing)
 *  - ArPHP 4.0 (release date: Jan 8, 2016), available from SourceForge, for
 *      handling the layout for this example.
 */
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
//use Mike42\Escpos\CapabilityProfiles\EposTepCapabilityProfile;

/*
 * Drop Ar-php into the folder listed below:
 */
require_once(dirname(__FILE__) . "/I18N/Arabic.php");
$fontPath = dirname(__FILE__) . "/I18N/Arabic/Examples/GD/ae_AlHor.ttf";

mb_internal_encoding("UTF-8");
$Arabic = new I18N_Arabic('Glyphs');

/*
 * Inputs are some text, line wrapping options, and a font size. 
 */

$Cashier = $Arabic -> utf8Glyphs("علي ج");
	$Date = date("d/m/Y H:i A");
	$InvoiceNo = "1704";
	
$maxChars = 50;
$fontSize = 28;

/*
 * First, convert the text into LTR byte order with line wrapping,
 * Using the Ar-PHP library.
 * 
 * The Ar-PHP library uses the default internal encoding, and can print
 * a lot of errors depending on the input, so be prepared to debug
 * the next four lines.
 * 
 * Note that this output shows that numerals are converted to placeholder
 * characters, indicating that western numerals (123) have to be used instead.
 */


/*
 * Set up and use an image print buffer with a suitable font
 */
 

$buffer = new ImagePrintBuffer();
//$buffer -> setFont($fontPath);
$buffer -> setFontSize($fontSize);


//$profile = EposTepCapabilityProfile::getInstance();
$connector /* = new FilePrintConnector("php://output")*/
         = new WindowsPrintConnector("Receipt Printer");
        // Windows LPT2 was used in the bug tracker

$printer = new Printer($connector);
$printer -> setPrintBuffer($buffer);


		$printer->setPrintLeftMargin(10);
		$printer->setJustification(Printer::JUSTIFY_CENTER);


		$printer->setEmphasis(true);
		$buffer -> setFontSize(50);
		
		$printer->text($Arabic -> utf8Glyphs("فاتورة اللحوم")."\n\n");
		$printer->setEmphasis(false);
		$printer->feed(1);
		
		$buffer -> setFontSize(55);
		//$printer->text($Arabic -> utf8Glyphs("Main Street, Branch 1"));
		$printer->text($Arabic -> utf8Glyphs("الشارع الرئيسي ، فرع 1"));
		$printer->feed(1);
		//$printer->text($Arabic -> utf8Glyphs("Al Kandara, Saudia Arabia"));
		//$printer->text($Arabic -> utf8Glyphs("الكندرة ، المملكة العربية السعودية"));
		//$printer->text("Phone No. 0504675794");
		$buffer -> setFontSize(30);
		$printer->text( "0504675794 " . $Arabic -> utf8Glyphs("رقم الهات"));
		$printer->text( "30030208860003 " . $Arabic -> utf8Glyphs("ظريبه الشراء"));
		$printer->feed(2);
		
		$buffer -> setFontSize(45);
		//$printer->text($Arabic -> utf8Glyphs("Invoice#") .$InvoiceNo);
		$printer->text( $Arabic -> utf8Glyphs($InvoiceNo) . $Arabic -> utf8Glyphs("فاتورة#"));
		$printer->feed(1);
		$buffer -> setFontSize(28);
		//$printer->text(addSpaces("Cashier: " . substr($Cashier, 0, 18) , 26) . " " . addSpaces($Date , 22));
		$printer->text(addSpaces( substr($Cashier, 0, 18) . $Arabic -> utf8Glyphs("أمين الصندوق : ")   , 26) . " " . addSpaces($Date , 22));
		$printer->feed(2);
		$buffer -> setFontSize(35);
		$printer->setJustification(Printer::JUSTIFY_LEFT);
		$printer->setEmphasis(true);
		//$printer->text(addSpaces('Item', 40) . addSpaces('Qty', 20) . addSpaces('Price', 30));
		$printer->text(addSpaces($Arabic -> utf8Glyphs('بند'), 30) . addSpaces($Arabic -> utf8Glyphs('الكمية'), 15) . addSpaces($Arabic -> utf8Glyphs('السعر'), 30));
		$printer->feed(1);
		$printer->setEmphasis(false);
		
		$items = $_POST['itemsprint'];
		
		// $items[] = [
		// 	'name' => addSpacesToCompleteString($Arabic -> utf8Glyphs('Ali علي')),
		// 	'qty' => '5',
		// 	'price' => 'SAR 3,575.00'

		// ];
		
		
		// $items[] = [
		// 	'name' => 'Web Design Development JS',
		// 	'qty' => '3',
		// 	'price' => 'SAR 225.00'

		// ];
		
		
		// $items[] = [
		// 	'name' => 'Web Design Development JS C++ PHP',
		// 	'qty' => '5',
		// 	'price' => 'SAR 375.00'

		// ];
		
		
		// $items[] = [
		// 	'name' => 'Web  Development JS',
		// 	'qty' => '20',
		// 	'price' => 'SAR 1500.00'

		// ];
		
		
		// $items[] = [
		// 	'name' => addSpacesToCompleteString('Web Design'),
		// 	'qty' => '10',
		// 	'price' => 'SAR 750.00'

		// ];
		
		
		$buffer -> setFontSize(25);
		
		foreach ($items as $item) {
		   $printer->text(addSpaces(substr($item['name'], 0 , 18), 40) . addSpaces($Arabic -> utf8Glyphs($item['qty']), 10) . addSpaces($Arabic -> utf8Glyphs($item['price']), 30));
		   $printer->feed(1);
		   
		}
		
		/*
		$printer->feed(2);
		$printer->setEmphasis(true);
		$printer->text(addSpaces('', 35) . addSpaces('Total', 14) . addSpaces('SAR 3,644.25', 30));
		$printer->feed(1);
		$printer->text(addSpaces('', 35) . addSpaces('Cash', 12) . addSpaces('SAR 5,000.00', 30));
		$printer->feed(1);
		$printer->text(addSpaces('', 35) . addSpaces('Balance', 10) . addSpaces('SAR 1,355.75', 30));
		$printer->feed(2);
		$printer->setEmphasis(false);
		*/
		$buffer -> setFontSize(30);
		$printer->feed(2);
		$printer->setEmphasis(true);
		$printer->text(addSpaces('', 20) .  addSpaces(substr('SAR 100.00',0,17), 17) . addSpaces($Arabic -> utf8Glyphs('مجموع : '), 14) );
		$printer->feed(1);
		$printer->text(addSpaces('', 20) . addSpaces(substr('SAR 5,000.00',0,17), 17) . addSpaces($Arabic -> utf8Glyphs('السيولة النقدية : '), 14) );
		$printer->feed(1);
		$printer->text(addSpaces('', 20) .  addSpaces(substr('SAR 1,355.75',0,17), 17) . addSpaces($Arabic -> utf8Glyphs('توازن : '), 14) );
		$printer->feed(2);
		$printer->setEmphasis(false);
		
		$printer->setJustification(Printer::JUSTIFY_CENTER);
		
		//$printer->text("VAT 15% is inclusive");
		$printer->text($Arabic -> utf8Glyphs("ضريبة القيمة المضافة 15٪ شاملة"));
		$printer->feed(2);
		$buffer -> setFontSize(40);
		//$printer->text("Thank You for your purchase");
		$printer->text($Arabic -> utf8Glyphs("شكرا لك على الشراء"));
		//$printer->text("Rate your experience with us today.");
		$printer->feed(1);
		$buffer -> setFontSize(50);
		$printer->text($Arabic -> utf8Glyphs("قيم تجربتك معنا اليوم"));
		$printer->feed(7);


$printer -> cut();
$printer -> close();