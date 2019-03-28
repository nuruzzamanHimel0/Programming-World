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
			$this->Image("images/php.png",50,50,100,0,'PNG','https://www.php.net/');

			$this->SetFont("Arial",'B',15);
			$this->SetFillColor(0,255,255);
			$this->SetTextColor(0);
			$this->SetLineWidth(1);
			$this->SetY(60);

			$this->Cell(250);
			$this->Cell(80,40,'Title',1,1,'C',true);
			//Line Break.....
			$this->Ln(30);

			// $this->SetFont("Arial","B",20);
			// $this->SetFillColor(36,96,84);
			// $this->SetTextColor(255);

			// $this->Cell(0,40,"Online Shopping",0,1,"C",true);
		}
		function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}

	}	
	
	$pdf = new PDF_reciept();
	$pdf->AliasNbPages();
	$pdf->AddPage();


	$pdf->SetFont("Times",'',12);

	for ($i=0; $i <40 ; $i++) { 
		$pdf->Cell(0,20,"Print line numbers:".$i,0,1);
	}

	$pdf->Output();
	
?>
