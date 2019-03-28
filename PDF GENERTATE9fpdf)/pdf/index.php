<?php 
	
	require("fpdf/fpdf.php");

	class PDF_reciept extends FPDF
	{

		public function __construct($orientation='P', $unit='pt', $format='Letter',$margin=40)
		{
			parent::__construct($orientation, $unit, $format);
    //$this->FPDF($orientation, $unit, $format);
    $this->SetTopMargin($margin);
    $this->SetLeftMargin($margin);
    $this->SetRightMargin($margin);
    $this->SetAutoPageBreak(true, $margin);

			//
		}

		//CURRENT CODE JUST HIDDEN FOR DEBUG.....
		public function Header()
		{
			$this->SetFont("Arial","B",20);
			$this->SetFillColor(36,96,84); // BG
			$this->SetTextColor(255);

			$this->Cell(0,40,"Online Shopping",0,1,"C",true);
		}

		// public function Header()
		// {
		// 	$this->Image('images/php.png',10,6,30,0,"PNG");

		// 	$this->Cell(80);
		// 	$this->SetFont("Arial","B",20);
		// 	$this->SetFillColor(36,96,84);
		// 	$this->SetTextColor(255);

		// 	$this->Cell(50,40,"Online Shopping",0,1,"C",true);
		// }

		Public function Footer()
		{
			$this->SetFont("Arial",'',12);
			$this->SetTextColor(0);
			$this->SetXY(40,-60); // this code use for border
			$this->Cell(0,20,"Thanks You for shopping",'T',0,"C");
		}

		public function PriceTable($products,$prices)
		{
			$this->SetFont("Arial",'B',12);
			$this->SetFillColor(36,146,129); // bg color
			$this->SetTextColor(0); // text clor
			$this->SetLineWidth(1); //if set border

			$this->Cell(427,25,"Item Description","LRT",0,'C',true);
			$this->Cell(100,25,"Price","LRT",1,'C',true);

			$this->SetFont('Arial','',11);
			$this->SetFillColor(238); // BG SET
			$this->SetLineWidth(0.2); // when set border
			$fill = false;

			for ($i=0; $i <count($products) ; $i++) { 
				
				$this->Cell(427,25,$products[$i],1,0,'C',$fill);
				$this->Cell(100,25,"$".$prices[$i],1,1,'C',$fill);
				$fill = !$fill;
			}

			$this->SetX(367);
			$this->Cell(100,25,"Total",1,0,'C');
			$this->Cell(100,25,'$'.array_sum($prices),1,1,'C');
		}
	}

	if(isset($_POST) AND isset($_POST['submit']) AND !empty($_POST))
	{
		$pdf = new PDF_reciept();

	$pdf->AddPage();

	$pdf->SetFont("Arial",'B',12);
	$pdf->SetY(100);
	$pdf->Cell(80,13,"Order By:",0,0);

	$pdf->SetFont('Arial','',12);
	// $pdf->SetXY(120,100);
	$pdf->Cell(150,13,$_POST['name']);

	$pdf->SetFont("Arial",'B',12);
	$pdf->Cell(70,13,"Date:",0,0);

	$pdf->SetFont("Arial",'',12);
	$pdf->Cell(100,13,date('F j,Y'),0,1);

	$pdf->SetFont("Arial","I");
	$pdf->SetX(120);
	$pdf->Cell(200,15,$_POST['address'],0,2);
	$pdf->Cell(200,15,$_POST['city'].",".$_POST['provice'],0,2  );
	$pdf->Cell(200,15,$_POST['pc'].",".$_POST['country'],0,2  );

	$pdf->Ln(100); // ITS WORK LIKE AS SetY().....
	$pdf->PriceTable($_POST['product'],$_POST['price']);

	$pdf->Ln(20);

	$message = "FPDF is a PHP class which allows to generate PDF files with pure PHP, that is to say without using the PDFlib library. 
	";
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(0,255,255);
	$pdf->SetTextColor(0);
	$pdf->SetLineWidth(1);
	$pdf->MultiCell(0,15,$message,1,1,"J",true);

	$pdf->Ln(20);

	$pdf->SetFont("Arial","U",12);
	$pdf->SetTextColor(0,0,255);
	$pdf->SetX(200);
	$pdf->Write(5,'youtube.com','https://youtube.com');


	$pdf->Output('abc.pdf',"I");
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
				<legend>Personal Information</legend>
				<p>
					<label for="name">Name</label>
					<input type="text" name="name" value="Himel">
				</p>
				<p>
					<label for="email">Email Address</label>
					<input type="email" name="email" value="himel@gmail.com">
				</p>
				<p>
					<label for="Address">Address</label>
					<input type="text" name="address" value="Satkhira, Khulan,Bd">
				</p>
				<p>
					<label for="City">City</label>
					<input type="text" name="city" value="Khulan">
				</p>
				<p>
					<label for="provice">provice</label>
					<input type="text" name="provice" value="here is provoice">
				</p>
				<p>
					<label for="Postal_coder">Postal_coder</label>
					<input type="text" name="pc" value="9200">
				</p>
				<p>
					<label for="Country">Country</label>
					<input type="text" name="country" value="Bangladesh">
				</p>

			</fieldset>

			<fieldset>
				<legend>Purchases</legend>
				<table>
					<thead>
						<tr>
							<td>Product</td>
							<td>Price</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="text" value="a new product" name="product[]">
							</td>
							<td>
								$
								<input type="text" value="10.00" name="price[]">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" value="somting else" name="product[]">
							</td>
							<td>
								$
								<input type="text" value="17.00" name="price[]">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" value="buy this too" name="product[]">
							</td>
							<td>
								$
								<input type="text" value="17.00" name="price[]">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" value="and final this" name="product[]">
							</td>
							<td>
								$
								<input type="text" value="12.00" name="price[]">
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<button type="submit" name="submit">Submit</button>
			

		</form>
		
	</div>
</div>

<a href="abc.pdf">Download This</a>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	
	$('button').click(function(){
		$('div#wrap div').fadeOut(function(){
			$(this).empty().html("<h2> Thank You </h2><p> Thank You for order. Please <a href='abc.pdf'> Download This</a></p>").fadeIn();
		});
	});
</script>
	
</body>
</html>