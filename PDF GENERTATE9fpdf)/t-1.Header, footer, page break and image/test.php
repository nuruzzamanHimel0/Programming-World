<?php 
	
	require("fpdf/fpdf.php");

	$pdf = new FPDF();

	$pdf->AddPage();
	//(font-family,font-style,font-size)
	$pdf->SetFont("Arial","I",15);

	$pdf->SetFillColor(204,255,255); // bg color(true)
	$pdf->SetTextColor(0,0,0);// font color
	$pdf->SetLineWidth(2); // border:2px

	//set margin..........
	// $pdf->SetMargins(80,100,30);

	$pdf->SetLeftMargin(60);
	$pdf->SetTopMargin(100);
	$pdf->SetRightMargin(30);

     // $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); this is SetBottomMargin
	     $pdf->SetAutoPageBreak(TRUE, 30);


	$pdf->SetAuthor('Himel');
     $pdf->SetTitle('This is a title');
     $pdf->SetSubject('PDF');
     $pdf->SetKeywords('pdf php');
     // $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetCreator("Md.Nuruzzaman");

	//(height,width,text,border{lR,TB}Defalt:0 false and 1 True,TEXT-ALIGN{L,R,C},BG-COLOR)

	$pdf->Cell(100,20,"Hello World0","LRTB",0,'C',true);

	$pdf->Output();

?>