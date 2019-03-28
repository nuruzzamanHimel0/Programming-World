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
			 global $title;
		    
		    // Images..........
		     $this->Image("images/php.png",60,50,100);
			//Color frame and abckground

			$this->SetFont("Arial",'B',15);
			$this->SetFillColor(0,255,255);
			$this->SetTextColor(0);
			$this->SetXY(190,70);

			$this->Cell(250,20,$title,1,1,'C',true);

			// Line Beak
			$this->Ln(60);

		}
		public function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
		}

		public function ChapterTitle($num,$title)
		{
			$this->SetFont('Arial','B',13); // font fmail, font-style, font-size
			$this->SetFillColor(220,220,225); // BG color ture

			$this->Cell(0,18,$num.":".$title,0,1,"L",true);

			// line break
			$this->Ln(6);
		}

		public function ChapterBody($file)
		{
			$txt = file_get_contents($file);

			$this->SetFont("Times",'',12);
			$this->SetFillColor(255);
			$this->MultiCell(0,10,$txt,0,1,'J',true);

			
		}

		public function PrintChapter($num,$title,$file)
		{
			$this->AddPage();
			$this->ChapterTitle($num,$title);
			$this->ChapterBody($file);
			//Break line
			$this->Ln(10);

			$this->SetFont('Times','I');
			$this->Cell(0,10,'(end of excerpt)');
		}

	}	
	
	$pdf = new PDF_reciept();
	$title = '20000 Leagues Under the Sea';
// DEFAULT SET AUTHORE AND TITLE..............
	$pdf->SetAuthor('Himel');
     $pdf->SetTitle($title );

	$pdf->PrintChapter(1,"First Title is here","text1.txt");
	$pdf->PrintChapter(2,"Second Title is here","text1.txt");

	$pdf->Output();



	
	

	
?>
