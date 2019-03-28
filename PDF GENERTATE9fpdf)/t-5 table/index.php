<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{

    public function __construct($orientation='P', $unit='pt', $formate='Letter')
    {
        parent::__construct($orientation,$unit,$formate);
    }

    public function Header()
    {
        global $title;
        $this->Image("images/php.png",50,50,100,0,'PNG','https://www.php.net/');

        $this->SetFont("Arial",'',15);
        $this->SetFillColor(0,255,255);
        $this->SetTextColor(0);
        $this->SetXY(50,60);
        $this->Cell(200);
        $this->Cell(250,20,$title,1,1,'C',true);

        //LINE BREAK
        $this->Ln(60);
    }

    Public function Footer()
    {
        // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }

    public function BasicTable($header,$data)
    {
        $this->AddPage();
        $this->SetFont('Arial','B',13);
        foreach ($header as $value) {
            $this->Cell(130,20,$value,1,0,'C');
        }
        $this->Ln();
        $count = 0;
        $this->SetFont('Arial','',12);
        for ($i=0; $i <count($data) ; $i++) { 
            
            $this->Cell(130,20,$data[$i],1,0,'C');
            $count = $count + 1;
            if($count == 4)
            {
                $count = 0;
                // line preak
                $this->Ln();
            }

        }
        $this->Ln();

      
    }

    public function ImproveTable($header,$data)
    {
        // Column widths
        $this->AddPage();
        $this->SetLineWidth(1); // BORDER.........
        $this->SetFont("Arial","B",13);
        $w = array(130,120,125,145);

        for ($i=0; $i <count($header) ; $i++) 
        { 
            $this->Cell($w[$i],20,$header[$i],1,0,'C');
        }
        $this->Ln();

        $this->SetFont("Arial",'',12);

        foreach ($data as $row) {
            $this->Cell($w[0],20,$row[0],'LR',0,'L');
            $this->Cell($w[1],20,$row[1],'LR',0,'L');
            $this->Cell($w[2],20,number_format( $row[2]),'LR',0,'R');
            $this->Cell($w[3],20,number_format($row[3]),'LR',0,'R');
            $this->Ln();
        }
        //Close Line................
        $this->Cell(array_sum($w),0,'','B');

    }

    public function FancyTable($header,$data)
    {

        $this->AddPage();

        // print_r($data);

         $w = array(130,120,125,145);
         // Color, font, widht and height.......
         $this->SetFont('Arial','B',13);
         $this->SetFillColor(255,0,0);
         $this->SetTextColor(255);
         $this->SetDrawColor(128,0,120);
        $this->SetLineWidth(.3); // Border.....

         for ($i=0; $i <count($header); $i++) { 
              
              $this->Cell($w[$i],20,$header[$i],1,0,'C',true);
          } 
          $this->Ln(); // break Line

        $this->SetFont("Arial",'',12);
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0],20,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],20,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],20,number_format( $row[2]),'LR',0,'R',$fill);
            $this->Cell($w[3],20,number_format($row[3]),'LR',0,'R',$fill);
            $fill = !$fill;
            $this->Ln();
        }
        //Close Line................
        $this->Cell(array_sum($w),0,'','B');
    }

}

$pdf = new PDF();
// AliasNumberOfPage use in footer for page number
$pdf->AliasNbPages();
$title ="20000 Leagues Under the Sea";



$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
$data =  array('Austria','Vienna','83859','8075','Belgium','Brussels','30518','10192','Denmark','Copenhagen','43094','5295');

$data1 = array(
    array('A1','A2','8888','4445'),
    array('B1','B2','43434343','324234'),
    array('C1','C2','85454888','66564445'),
    array('D1','D2','888118','442245'),
     array('D1','D2','888118','442245'),
      array('D1','D2','888118','442245'),
       array('D1','D2','888118','442245'),
        array('D1','D2','888118','442245'),
         array('D1','D2','888118','442245'),
          array('D1','D2','888118','442245')
);

$pdf->BasicTable($header,$data);

$pdf->ImproveTable($header,$data1);

$pdf->FancyTable($header,$data1);


$pdf->Output();
?>