<?php 
	
	require("fpdf/fpdf.php");


	class leave_application_PDF extends FPDF
	{
		// public $trans;

		public function __construct($orientation='P', $unit='pt', $format='A4',$margin=40)
		{
			parent::__construct($orientation, $unit, $format);

		}
		
		//CURRENT CODE JUST HIDDEN FOR DEBUG.....
		public function Header()
		{
			$this->Image('images/logo.png',60,20,150,0,'PNG','https://www.mylighthost.com');

			$this->Ln(50);
			//Blank Cell
			$this->Cell(30);
			$this->SetFont('Arial','B',10);
			$this->SetTextColor(0);

			$this->Cell(0,15,'Sheikh Hasina Software Technology Park',0,0,'L');
			$this->Ln();

			//Blank Cell
			$this->Cell(30);
			$this->SetFont('Arial','',10);
			$this->Cell(0,10,'(MTB, 13th Floor), Nazir Shankarpur Road, Jashore',0,0,'L');
			$this->Ln(15);
		

		}

		public function LeaveAppForm($name,$position,$pin,$leave_type,$leave_period,$note)
		{
			$page_width = $this->GetPageWidth();

			$this->SetLineWidth(2);
			$this->Cell(30);
			$this->Cell(0,10,'','B',0);

			//Break line
			$this->Ln();

			$this->SetFont("Arial",'B',14);
			$this->SetFillColor(204,255,255);
			$this->SetTextColor(0);
			$this->Cell(30);
			$this->Cell(0,20,"Leave Application Form","LBR",1,"C",true);

			$this->Ln(15);

			$this->SetFont('Arial','',14);
			$this->SetLineWidth(0.8);
			$this->Cell(30);
			$this->Cell(140,20,'Name',0,0,'L');
			$this->Cell(0,20,$name,1,0,'L');
			$this->Ln();

			$this->SetLineWidth(0.8);
			$this->Cell(30);
			$this->Cell(140,20,'Position',0,0,'L');
			$this->Cell(0,20,$position,1,0,'L');
			$this->Ln();

			$this->SetLineWidth(0.8);
			$this->Cell(30);
			$this->Cell(140,20,'PIN',0,0,'L');
			$this->Cell(0,20,$pin,1,0,'L');
			// $this->Cell(386,20,'',1,0);
			$this->Ln();

			$this->SetLineWidth(0.8);
			$this->Cell(30);
			$this->Cell(140,20,'Leave Period',0,0,'L');
			

			// LEAVE PERIOD CALCULATE................
			$date1=date_create($leave_period[0]);

			$date2=date_create($leave_period[1]);
			$diff=date_diff($date1,$date2);
			$period = $diff->format("%R%a days");
			$this->Cell(0,20,$period,1,0,'L');
			$this->Ln();



			$this->Cell(30);
			$this->Cell(140,20,'Description of Leave',0,0,'L');
			$this->SetFont('Arial','B',11);
			$this->SetLineWidth(1);
			$this->SetTextColor(0);
			$this->SetFillColor(204,255,255);
			$this->Cell(73.2,20,'Casual',1,0,'C',true);
			$this->Cell(73.2,20,'Medical',1,0,'C',true);
			$this->Cell(73.2,20,'Maternity',1,0,'C',true);
			$this->Cell(73.2,20,'W/O Pay',1,0,'C',true);
			$this->Cell(75.8,20,'Others',1,1,'C',true);



			$this->Cell(30);
			$this->SetFont('Arial','',14);
			$this->Cell(140,20,'Available',0,0,'L');
			$this->SetFont('Arial','B',11);
			$this->SetLineWidth(1);
			$this->SetTextColor(0);
			// $this->SetFillColor(204,255,255);
			$this->Cell(73.2,20,'2',1,0,'C');
			$this->Cell(73.2,20,'7',1,0,'C');
			$this->Cell(73.2,20,'',1,0,'C');
			$this->Cell(73.2,20,'',1,0,'C');
			$this->Cell(75.8,20,'',1,1,'C');

			$this->Cell(30);
			$this->SetFont('Arial','',14);
			$this->Cell(140,25,'Attainable',0,0,'L');

			$this->SetFont('Arial','B',11);
			$this->SetLineWidth(1);
			$this->SetTextColor(0);
		// DATE DIFFERENT( LEAVE PERIOD)
			$date1=date_create($leave_period[0]);

			$date2=date_create($leave_period[1]);
			$diff=date_diff($date1,$date2);
			$period1 = $diff->format("%a");
			if($leave_type == 'Casual')
				{
					$this->Cell(73.2,20,$period1,1,0,'C');
				}
			else{
				$this->Cell(73.2,20,'',1,0,'C');
			}

			if($leave_type == 'Medical')
				{
					$this->Cell(73.2,20,$period1,1,0,'C');
				}
			else{
				$this->Cell(73.2,20,'',1,0,'C');
			}

			if($leave_type == 'Metarnial')
				{
					$this->Cell(73.2,20,$period1,1,0,'C');
				}
			else{
				$this->Cell(73.2,20,'',1,0,'C');
			}
			if($leave_type == 'Without'){
				$this->Cell(73.2,20,$period,1,0,'C');
			}
			else
				{
					$this->Cell(73.2,20,'',1,0,'C');
				}
			if($leave_type == 'Other'){
				$this->Cell(753.2,$period1,1,0,'C');
			}
			else{
				$this->Cell(75.8,20,'',1,1,'C');
			}


			$this->Cell(30);
			$this->SetFont('Arial','',14);
			$this->Cell(140,25,'Remaining Leave',0,0,'L');
			$this->SetFont('Arial','B',11);
			$this->SetLineWidth(1);
			$this->SetTextColor(0);
			// $this->SetFillColor(204,255,255);
			// $this->Cell(77.2,25,'',1,0,'C');
			// $this->Cell(77.2,25,'',1,0,'C');
			// $this->Cell(77.2,25,'',1,0,'C');
			// $this->Cell(77.2,25,'',1,0,'C');
			// $this->Cell(76.5,25,'',1,1,'C');

			if($leave_type == 'Casual')
				{
					$this->Cell(73.2,20,2-$period1,1,0,'C');
				}
			else{
				$this->Cell(73.2,20,'',1,0,'C');
			}

			if($leave_type == 'Medical')
				{
					$this->Cell(73.2,20,7-$period1,1,0,'C');
				}
			else{
				$this->Cell(73.2,20,'',1,0,'C');
			}

			if($leave_type == 'Metarnial')
				{
					$this->Cell(73.2,20,$period1,1,0,'C');
				}
			else{
				$this->Cell(73.2,20,'',1,0,'C');
			}
			if($leave_type == 'Without'){
				$this->Cell(73.2,20,$period,1,0,'C');
			}
			else
				{
					$this->Cell(73.2,20,'',1,0,'C');
				}
			if($leave_type == 'Other'){
				$this->Cell(75.8,20,$period1,1,0,'C');
			}
			else{
				$this->Cell(75.8,20,'',1,1,'C');
			}

			$this->SetFont("Arial",'',14);
			$this->SetLineWidth(0.8);
			$this->Cell(30);
			$this->Cell(140,20,'Leave Date',0,0,'L');

			$this->SetFont("Arial",'B',12);
			$this->SetLineWidth(1);
			// $this->Cell(0,25,date("d-m-Y",strtotime($leave_period[0]))." TO ".date("d-m-Y",strtotime($leave_period[1])),1,0,'L');

			$this->Cell(65,20,date('d-m-Y',strtotime($leave_period[0])),'LB',0,'L');

			$this->SetFont('Arial','',12);
			$this->Cell(30,20,
				'TO','B',0,'C');

			$this->SetFont('Arial','B',12);
			$this->Cell(273.6,20,date('d-m-Y',strtotime($leave_period[1])),'BR',0,'L');

			$this->Ln(30);

			// NOTE....................


			$this->Cell(30);
			$this->SetFont('Arial','B',14);
			$this->Cell(300,20,'Remarks',1,0,'L',true);

			// $this->Cell(30);
			// $this->SetLineWidth(1);
			// $this->Cell(300,150,'',1,0);


			// $this->SetFont("Arial",'',12);
			// $this->SetXY(60,460);
			// $this->SetFillColor(255);
			// $this->MultiCell(290,15,$note,0,1,'J');
			// 	$this->Ln(100);

			// HR Records................

			$this->Cell(20);
			$this->SetFont("Arial",'B','14');
			$this->SetLineWidth(1);
			$this->SetFillColor(204,255,255);
			$this->Cell(190,20,'HR Records',1,1,'C',true);

			//REMARKS BODY..........
			$this->Cell(30);
			$this->SetLineWidth(1);
			$this->Cell(300,105,'',1,0);

			$this->Cell(20);

			$this->SetFont('Arial','',10);
			$this->Cell(60,20,'Absent',1,0,'L');
			$this->Cell(50,20,'',1,0,'L');
			$this->Cell(80,20,'Working Day(s)',1,2,'C');

			$this->SetX(378.5);
			$this->Cell(60,20,'Late',1,0,'L');
			$this->Cell(50,20,'',1,0,'L');
			$this->Cell(80,20,'Working Day(s)',1,2,'C');

			$this->SetX(378.5);
			$this->Cell(60,20,'Leave',1,0,'L');
			$this->Cell(50,20,'',1,0,'L');
			$this->Cell(80,20,'Working Day(s)',1,2,'C');

			$this->SetX(378.5);
			$this->Cell(60,20,'Without pay',1,0,'L');
			$this->Cell(50,20,'',1,0,'L');
			$this->Cell(80,20,'Working Day(s)',1,2,'C');

			$this->SetX(378.5);
			$this->Cell(60,25,'Others',1,0,'L');
			$this->Cell(50,25,'',1,0,'L');
			$this->Cell(80,25,'Working Day(s)',1,1,'C');

				$this->Ln(5);


			

			//	 SIGNATURE PART IS HERE...............
			$this->Cell(30);

			$this->SetFont("Arial",'B',14);
			$this->SetLineWidth(1);
			$this->SetFillColor(204,255,255);
			$this->Cell(135,20,'Employee','LTR',0,'C',true);
			$this->Cell(135,20,'Executive/Manager','LTRB',0,'C',true);
			$this->Cell(120,20,'HR','LTRB',0,'C',true);
			$this->Cell(120	,20,'Team Leader','LTRB',1,'C',true);

			$this->Cell(30);

			$this->Cell(135,20,'','LR',0,'C',true);

			$this->SetFont('Arial','',12);
			$this->SetFillColor(255);
			$this->Cell(40,20,'','BL',0,'C',true);
			$this->Cell(95,20,'Approved','BR',0,'C',true);

			$this->SetFont('Arial','',12);
			$this->SetFillColor(255);
			$this->Cell(40,20,'','BL',0,'C',true);
			$this->Cell(80,20,'Approved','BR',0,'C',true);

			$this->SetFont('Arial','',12);
			$this->SetFillColor(255);
			$this->Cell(40,20,'','BL',0,'C',true);
			$this->Cell(80,20,'Approved','BR',1,'C',true);

			$this->Cell(30);

			$this->SetLineWidth(1);
			$this->SetFillColor(204,255,255);
			$this->Cell(135,20,'','LRB',0,'C',true);

			$this->SetFont('Arial','',12);
			$this->SetFillColor(255);
			$this->Cell(40,20,'','BL',0,'C',true);
			$this->Cell(95,20,'Rejected','BR',0,'C',true);

			$this->SetFont('Arial','',12);
			$this->SetFillColor(255);
			$this->Cell(40,20,'','BL',0,'C',true);
			$this->Cell(80,20,'Rejected','BR',0,'C',true);

			$this->SetFont('Arial','',12);
			$this->SetFillColor(255);
			$this->Cell(40,20,'','BL',0,'C',true);
			$this->Cell(80,20,'Rejected','BR',1,'C',true);

			$this->Cell(30);
			$this->SetLineWidth(1);
			$this->Cell(135,50,'','LR',0);
			$this->Cell(135,50,'','R',0);
			$this->Cell(120,50,'','R',0);
			$this->Cell(120,50,'','R',1);

			$this->Cell(30);
			$this->SetFont('Arial','B',14);
			$this->Cell(135,20,'Signature/Name','LBR',0,'C');
			$this->Cell(135,20,'Signature/Name','BR',0,'C');
			$this->Cell(120,20,'Signature/Name','BR',0,'C');
			$this->Cell(120,20,'Signature/Name','BR',1,'C');

			$this->Cell(30);
			$this->Cell(35,20,'Date:','LB',0,'L');
			$this->Cell(100,20,date("m-d-y"),'BR',0,'L');

			$this->Cell(35,20,'Date:','LB',0,'L');
			$this->Cell(100,20,date("m-d-y"),'BR',0,'L');

			$this->Cell(35,20,'Date:','LB',0,'L');
			$this->Cell(85,20,date("m-d-y"),'BR',0,'L');
			$this->Cell(35,20,'Date:','LB',0,'L');
			$this->Cell(85,20,date("m-d-y"),'BR',1,'L');

			$this->Ln(10);

			// Rule part............

			$this->Cell(30);

			$this->SetFont('Arial','B',14);
			$this->SetFillColor(204,255,255);
			$this->SetLineWidth(1);
			$this->Cell(510,20,strtoupper('how to submit leave permission'),1,1,'C',true);

			// Empty Div FOR leave RULE
			$this->Cell(30);
			$this->SetLineWidth(.5);
			$this->Cell(510,130,'',1,1);

			$pageHeight = $this->GetPageHeight();

			$this->SetFont('Arial','',12);
			$this->SetXY(70,$pageHeight-175);
			$this->MultiCell(0,9,'1. Employee has to submit leave application form at least 03 days prior to leave taken.');
			$this->Ln();
			$this->SetX(70);
			$this->MultiCell(0,9,'2. Leave application must be verified by HR. ');
			$this->Ln();
			$this->SetX(70);
			$this->MultiCell(0,9,'3. Verified application wiil be taken to Executive/Manager.');

			$this->Ln();
			$this->SetX(70);
			$this->MultiCell(0,12,'4. The original application will be given back to HR. Employee will be given a copy.To be qualified for. ');

			$this->Ln();
			$this->SetX(70);
			$this->MultiCell(0,12,'5. To be qualified for the without pay or the medical leave you may have to attach additional Supporting.');

			// 	ALL POSITIONING............................................

			// Remarks bote is Here
			$this->SetFont("Arial",'',12);
			$this->SetXY(60,370);
			$this->SetFillColor(255);
			$this->MultiCell(290,13,$note,0,'J');

			// Approve Mark.....

			$this->SetXY(230 ,498);
			$this->SetFillColor(255);
			$this->Cell(10,10,'',1,1,'',true);

			// Approved mark......
			$this->SetXY(230 ,498);
			$this->SetFont('ZapfDingbats','', 13);
			$this->Cell(10,10, 4, 0, 0);

			$this->SetXY(230 ,518);
			$this->SetFillColor(255);
			$this->Cell(10,10,'',1,1,'',true);

			$this->SetXY(360 ,498);
			$this->SetFillColor(255);
			$this->Cell(10,10,'',1,1,'',true);

			$this->SetXY(360 ,518);
			$this->SetFillColor(255);
			$this->Cell(10,10,'',1,1,'',true);

			// Rejected Mark............
			$this->SetXY(358 ,518);
			$this->SetFont('ZapfDingbats','', 13);
			$this->Cell(10,10, 4, 0, 0);

			$this->SetXY(480 ,498);
			$this->SetFillColor(255);
			$this->Cell(10,10,'',1,1,'',true);

			// Approved Mark............
			$this->SetXY(480 ,498);
			$this->SetFont('ZapfDingbats','', 13);
			$this->Cell(10,10, 4, 0, 0);

			$this->SetXY(480 ,518);
			$this->SetFillColor(255);
			$this->Cell(10,10,'',1,1,'',true);

// 			$this->SetX(40);
// 			$this->SetFont('ZapfDingbats','', 10);
// $this->Cell(50, 50, 'A', 1, 0);


			// SIGNATURE OF ALL POSITIOING.............

			$this->Image('Signature/signature.png',80,545,80,null,'PNG');


			$this->Image('Signature/signature.png',230,545,80,null,'PNG');
			$this->Image('Signature/signature.png',360,545,80,null,'PNG');
			$this->Image('Signature/signature1.png',470,545,80,null,'PNG');

			


			


		



		}

		

		
		
	}

	if(isset($_POST) AND isset($_POST['submit']) AND !empty($_POST))
	{
		
		// $product = array();
		// $quantity = array();

		if(isset($_POST['name']) AND isset($_POST['position']) AND isset($_POST['Ltype']) AND isset($_POST['Lperipd']))
		{
			$name = $_POST['name'];
			$position = $_POST['position'];
			$pin = $_POST['PIN'];
			$leave_type = $_POST['Ltype'];
			$leave_period = $_POST['Lperipd'];
			$note = $_POST['note'];

		
		}

		if(empty($name) OR empty($pin) OR $position == 'Position Type' OR $leave_type == 'Leave Type' OR empty($leave_period) OR empty($note))
		{
			echo "Any Field can't empty";
		}
		else
		{

			$pdf = new leave_application_PDF();

			$pdf->AddPage();

			$pdf->LeaveAppForm($name,$position,$pin,$leave_type,$leave_period,$note);




			$pdf->Output();
		}

	




		 
	
		

		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Leave Application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="wrap">
		<div>
		<form action="" method="post">


			<fieldset>
				<legend>Set Info</legend>
				<table>
					<tr>
						<td>
							<b>Name:</b>
						</td>
						<td>
							<input type="text" name="name" value="Himel">
						</td>
					</tr>
					<tr>
						<td><b>Position: </b></td>
						<td>
							<select name="position"style="width: 300px; padding: 18px; border-radius: 5px; font-size:15px;">
									<option value="Position Type">Position Type</option>
									  <option value="Marketer">Marketer</option>
									  <option value="Web Developer">Web Developer</option>
									  <option value="Managment">Management</option>  
								</select>
						</td>
					</tr>
					<tr>
						<td>
							<b>PIN:</b>
						</td>
						<td>
							<input type="text" name="PIN" value="01010">
						</td>
					</tr>

					<tr>
						<td><b>Leave Type: </b></td>
						<td>
							<select name="Ltype"style="width: 300px; padding: 18px; border-radius: 5px; font-size:15px;">
									<option value="Leave Type">Leave Type</option>
									  <option value="Casual">Casual</option>
									  <option value="Medical">Medical</option>
									  <option value="Metarnial">Metarnial</option>  
									  <option value="Without pay">Without pay</option>  
									  <option value="Other">Other</option>  
								</select>
						</td>
					</tr>

					<tr>
						<td><b>Leave Period: </b></td>
						<td>
							<input type="date" name="Lperipd[]"  > TO 
							<input type="date" name="Lperipd[]">
						</td>
					</tr>
				</table>
				
			</fieldset>

			<fieldset>
				<legend>Note</legend>
				<textarea cols="80" rows="25" name="note" maxlength="200" value="">
					My name is himel
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