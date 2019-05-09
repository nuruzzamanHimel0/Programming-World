<?php 
	
	require("fpdf/fpdf.php");


	class requization_PDF extends FPDF
	{
		// public $trans;

		public function __construct($orientation='P', $unit='pt', $format='Letter',$margin=40)
		{
			parent::__construct($orientation, $unit, $format);
    //$this->FPDF($orientation, $unit, $format);
    // $this->SetTopMargin($margin);
    // $this->SetLeftMargin($margin);
    // $this->SetRightMargin($margin);
    // $this->SetAutoPageBreak(true, $margin);
			
			//
		}
		
		//CURRENT CODE JUST HIDDEN FOR DEBUG.....
		public function Header()
		{
			$this->Image('images/logo.png',60,30,150,0,'PNG','https://www.mylighthost.com');

			$this->Ln(70);

			$this->SetFont("Arial",'B',16);
			$this->SetFillColor(255);
			$this->SetTextColor(0);
			// $this->SetLeftMargin(150);
			// $this->SetX(30);
			$this->Cell(550,20,'Materials/Goods/Service Requisition Form For Purches',0,1,'C',false);
			// Line break
			$this->Ln(15);

			$this->SetFont("Arial",'',12);
			$this->SetX(60);
			$this->Cell(100,20," Slip No: MLH/ Requisition/003 ",0,1);
			$this->SetX(60);
			$this->Cell(100,20," Date Of Requisition: ",0,0);

			$this->SetFont("Arial",'B',12);
			$this->Cell(15);
			$this->Cell(0,20,date(' j F,Y'),0,1);
			
			$this->Ln(15);
		

		}


		Public function Footer()
		{
			
		    
            $this->Image('images/barcode.png',20,725,55,0,'PNG');
            // Position at 1.5 cm from bottom
		   

            $this->SetFont('Arial','B',12);
            $this->SetFillColor(255);
            //$this->SetLineWidth(1);
             $this->SetXY(100,-66);
            $this->Cell(90,15,'MyLightHost','BR',0,'L',true);
            $this->Cell(400,15,'Corporate Office','B',1,'L',true);

            $this->SetXY(100,-58);
            $this->SetLineWidth(1); // border
            $this->Cell(490,10,'','B',1);
            $this->Ln(15);

            $this->SetFont("Arial",'B',9);
            $this->SetFillColor(255);
             $this->SetXY(100,-46);
            $this->Cell(200,13,'Sheikh Hasina Software Technology Park.',0,0,'L',true);
            $this->Cell(150,13,'0421-68302',0,0,'L',true);
            $this->Cell(140,13,'admin@mylighthost.com',0,0,'L',true);

            $this->Ln();

             $this->SetFont("Arial",'B',9);
            $this->SetFillColor(255);
             $this->SetX(100);
            $this->Cell(200,13,'Sheikh Hasina Software Technology Park.','B',0,'L',true);
            $this->Cell(150,13,'01735457483 or 01622819929','B',0,'L',true);
            $this->Cell(140,13,'admin@mylighthost.com','B',0,'L',true);
		}

		public function requisition_sub()
		{
			

		$this->SetFont('Arial','',14);
		$this->SetX(60);
		$this->Cell(0,20,'To',0,1,'L');
		$this->SetX(60);
		$this->Cell(0,20,'Rakibul Rahman',0,1,'L');
		$this->SetX(60);
		$this->Cell(0,20,'Ream Leader',0,1,'L');
		$this->SetX(60);
		$this->Cell(0,20,'MyLightHost',0,1,'L');

		$this->Ln(15);

		$this->SetFont('Arial','',14);
		$this->SetX(60);
		$this->Cell(0,20,'Dear Sir,',0,1,'L');
		$this->SetX(60);
		$pag_w = $this->GetPageWidth();
		$this->MultiCell($pag_w,20,'For following purpose you are requested to allow for purchasing the materials');

		$this->Ln(7); // Break line

		$this->SetFont("Arial",'U','15');
		$this->SetX(60);
		$this->Cell(0,20,'Purpose:',0,1,'L');
		$this->Ln(15);

		}

		public function requisition_table($header,$rtype ,$product, $quentity)
		{
			 $w = array(80,150,150,80);
			 $sl = 0;
			 //Emty Cell
			 $this->Cell(35);
			 // Table Header print......................
			 $this->SetFont('Arial','B',13);
			 $this->SetFillColor(224,224,224);
			 $this->SetTextColor(0);
			 $this->SetLineWidth(1);
			for ($i=0; $i <count($header) ; $i++) { 
				$this->Cell($w[$i],25,ucwords($header[$i]),1,0,'C',true);
			}
			$this->Ln();
			
			//Table Body Print...................
			$this->SetFont('Arial','',12);
			 $this->SetFillColor(224,224,224);
			 $this->SetTextColor(0);
			 $this->SetLineWidth(1);

			for ($i=0; $i < count($product) ; $i++) { 
				$sl++;
				//Emty Cell
			 $this->Cell(35);
				$this->Cell($w[0],25,"00".$sl,1,0,'C');
				$this->Cell($w[1],25,ucwords($rtype),1,0,'C');
				$this->Cell($w[2],25,ucwords($product),1,0,'C');
				$this->Cell($w[3],25,ucwords($quentity)." P",1,0,'C');
				$this->Ln();
			}

			$this->Ln(15);
		}

		public function requisition_note($note)
		{
			$w = array(80,150,150,80);

			$this->SetFont("Arial",'B',13);
			$this->SetFillColor(224,224,224);
			$this->SetTextColor(0);
			$this->SetLineWidth(1);
			// Left side space
			$this->Cell(35);

			$this->Cell(array_sum($w),25,'Note : ',1,0,'L',true);
			$this->Ln();
			$this->SetFont('Arial','',12);
			$this->SetFillColor(255);
			$this->SetLineWidth(1);
			$this->SetTextColor(0);
			// Right side space
			$this->Cell(35);
			//Empty Border with width and height.....
			$this->Cell(array_sum($w),130,'',1,1);

			//Note data set Horizantal and vertical size in manually
			$this->SetXY(73,465);
			$this->MultiCell(array_sum($w)-50,15,$note,0,1);

			$this->Ln(100);
		}

		public function Signature()
		{
			$pageWidth = $this->GetPageWidth();
			$pageheight = $this->GetPageHeight();

			 // $this->Cell(50,20,"Page Height:".$pageheight,0,1);
			 // $this->Cell(50,20,"Page width:".$pageWidth);

			// SUBMITTED BY STRAT...................................
			$this->Cell(55);
			$this->Image('Signature/signature.png',null,null,60,0,'PNG');

			$this->Ln(6);
			// Left Space...
			$this->Cell(35);
			$this->SetLineWidth(0.5);
			$this->Cell(($pageWidth/3)-80,0,'',1,1);

			$this->Cell(35);
			$this->SetFont('Arial','B',12);
			$this->Cell(($pageWidth/3)-80,20,'Submitted By',0,1,'C');
			$this->Ln(5);

			$this->SetFont("Arial","",12);

			$this->Cell(30);
			$this->MultiCell(($pageWidth/3),15,'Name: Md. Nuruzzaman',0,1,"L");
			$this->Cell(30);
			$this->MultiCell(($pageWidth/3),15,'PIN: 01010',0,1,"L");
			$this->Cell(30);
			$this->MultiCell(($pageWidth/3),15,'Designation: Web Developer',0,1,"L");

			$this->SetLineWidth(0.5);
			 $this->SetXY(($pageWidth/3)+30,$pageheight-200);
			 // Right Border...................
			$this->Cell(10,120,'','L',0);

			// SUBMITTED BY END........................

			// RECOMMENDED BY START....................

			$this->Cell(20);
			$this->Image('Signature/signature.png',null,null,100,0,'PNG');
			$this->Ln(8);
			
			$this->SetX(($pageWidth/3)+50);
			$this->SetLineWidth(1);
			$this->Cell(($pageWidth/3)-60,0,'',1,1);

			$this->Cell(20);
			$this->SetX(($pageWidth/3)+60);
			$this->SetFont('Arial','B',12);
			$this->Cell(($pageWidth/3)-80,20,'Recommended By',0,1,'C');

			$this->SetLineWidth(0.5);
			 $this->SetXY(($pageWidth/3)*2,$pageheight-200);
			 // Right Border...................
			$this->Cell(10,120,'','L',0);

			// RECOMMENDED BY END....................

			// APPROVED BY START....................

			$this->Cell(20);
			$this->Image('Signature/signature.png',null,null,100,0,'PNG');
			$this->Ln(8);
			
			$this->SetX((($pageWidth/3)*2)+15);
			$this->SetLineWidth(1);
			$this->Cell(($pageWidth/3)-80,0,'',1,1);

			$this->Cell(20);
			$this->SetX((($pageWidth/3)*2)+10);
			$this->SetFont('Arial','B',12);
			$this->Cell(($pageWidth/3)-80,20,'Approved By',0,1,'C');

			// $this->SetLineWidth(0.5);
			//  $this->SetXY(($pageWidth/3)*2,$pageheight-200);
			//  // Right Border...................
			// $this->Cell(10,120,'','L',0);
			
			// APPROVED BY END....................

		}

		
		
	}

	if(isset($_POST) AND isset($_POST['submit']) AND !empty($_POST))
	{
		$note = $_POST['note'];
		$rtype = $_POST['rtype'];
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];

		if($rtype  == 'Requisition Type' AND $product[0] == 'Requisition' AND empty($product[1])  AND empty($quantity[0]) AND empty($quantity[1]))
		{
			echo "Field Cant empty";
		}
		else if($rtype  != 'Requisition Type' AND $product[0] != 'Requisition' AND !empty($quantity[0]))
		{
			// echo "Product 1 And Quentity 1";

			$pdf = new requization_PDF();

				$header = array('S.N','Requisition Type','Name of Materials','Quantity');

				$pdf->AddPage();
				$pdf->requisition_sub();
				 $pdf->requisition_table($header,$rtype,$product[0],$quantity[0]);
				 $pdf->requisition_note($note);
				 // $pdf->Output('requisition.pdf',"I");
				 $pdf->Signature();
		}
		else if($rtype  != 'Requisition Type' AND $product[0] == 'Requisition' AND !empty($product[1]) AND !empty($quantity[1]))
		{
			// echo "Product 2 and Quentity 2";

			$pdf = new requization_PDF();

				$header = array('S.N','Requisition Type','Name of Materials','Quantity');

				$pdf->AddPage();
				$pdf->requisition_sub();
				 $pdf->requisition_table($header,$rtype,$product[1],$quantity[1]);
				 $pdf->requisition_note($note);
				  $pdf->Signature();
				
		}




		 $pdf->Output('requisition.pdf',"I");
	
		


		

// 		if(isset($_POST['product']) AND isset($_POST['quantity']))
// {
// 	echo "<pre>";
// 	print_r($rtype);
// 	print_r($product);
// 		print_r($quantity);
// }

		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="wrap">
		<div>
		<form action="" method="post">


			<fieldset>
				<legend>Purchases</legend>
				<table>
					<tr>
						<td><b>Requisition Type: </b></td>
						<td>
							<select name="rtype"style="width: 300px; padding: 18px; border-radius: 5px; font-size:15px;">
									<option value="Requisition Type">Requisition Type</option>
									  <option value="Fixed Asset">Fixed Asset</option>
									  <option value="Non Asset">Non Asset</option>
									  <option value="Others">Others</option>
									  
								</select>
						</td>
					</tr>
				</table>
				<table>
		
					<thead>
						<tr>
							<td>Product</td>
							<td>Quantity</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								
								<select name="product[]"style="width: 300px; padding: 18px; border-radius: 5px; font-size:15px;">
									<option value="Requisition">Requisition</option>
									  <option value="Headphone">Headphone</option>
									  <option value="Chair">Chair</option>
									  <option value="Table">Table</option>
									  <option value="Computer">Computer</option>
								</select>
							</td>
							<td>
								<input type="text" name="quantity[]">
							</td>
							
						</tr>
						<tr>
							<td>
								
								<input type="text" name="product[]">
							</td>
							<td>
								<input type="text"  name="quantity[]">
							</td>
							
						</tr>
						
						
						
						
					</tbody>
				</table>
			</fieldset>

			<fieldset>
				<legend>Note</legend>
				<textarea cols="80" rows="25" name="note" maxlength="400">
					
				</textarea>
			</fieldset>
			<button type="submit" name="submit">Submit</button>
			

		</form>
		
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- 
<script type="text/javascript">
	
	$('button').click(function(){
		$('div#wrap div').fadeOut(function(){
			$(this).empty().html("<h2> Thank You </h2><p> Thank You for order. Please <a href='abc.pdf'> Download This</a></p>").fadeIn();
		});
	});
</script> -->
	
</body>
</html>