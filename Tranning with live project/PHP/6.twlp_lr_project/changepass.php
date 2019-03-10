<?php 
	include("lib/header.php");
	spl_autoload_register(function($class_name)
	{
		include("lib/".$class_name.".php");
	});
	session::checkLogOut();
?>
<?php $user = new user();  ?>
<?php 
	if(isset($_GET['id']))
	{
		$userId = base64_decode($_GET['id']);
	}
?>
	<div class="bodySection">
		<div class="container containerStyle">
			<div class="card">
				<div class="card-header " >
					<h2 >Change Password : 
						<span >
							<a class="btn btn-primary" href="profile.php?id=<?php echo base64_encode($userId) ?>" style="margin-left: 652px;">Back</a>
						</span>
					</h2>
				</div>
			
				<div class="card-body">
					<div style="max-width: 600px; margin: 0px auto;">
				<?php 
					
					$sessId = session::sess_get("id");
					if($userId != $sessId)
					{
						session::redirect("index.php");
					}
					
				?>
			<?php 
				 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatePass']))
				 {
				 	$updatePass = $user->updateUserPass($userId,$_POST);
				 }
			?>
			
						<form action="" method="POST">
				<?php 
					if(isset($updatePass))
					{
						echo $updatePass;
					}
				?>
				
							<div class="form-group">
								<label for="OLD_PAS">Old Password : </label>
								<input type="password" class="form-control" name="old_pass" value="" >
								
							</div>
							<div class="form-group">
								<label for="username">New Password : </label>
								<input type="password" class="form-control"  name="new_pass"  value="">
								
							</div>
							
							
							<button type="submit" name="updatePass" class="btn btn-primary">Update Password</button>
							
						</form>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>

<?php 
	include("lib/footer.php");
?>