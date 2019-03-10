<?php include("inc/header.php"); ?>
<?php 
	$sessChk = session::sess_get("cmrlogin");
	if($sessChk == FALSE)
	{
		header("Location: login.php");
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="section group">
				<div class="order">
					<h2>Order</h2>
				</div>
			</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
<?php include("inc/footer.php"); ?>