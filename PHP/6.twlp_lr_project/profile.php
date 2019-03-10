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
					<h2 >User Profile : 
						<span >
							<a class="btn btn-primary" href="index.php" style="margin-left: 652px;">Back</a>
						</span>
					</h2>
				</div>
			
				<div class="card-body">
					<div style="max-width: 600px; margin: 0px auto;">
				<?php 
					
					$userData = $user->getUserById($userId);

				?>
			<?php 
				 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update']))
				 {
				 	$updateDat = $user->updateUserData($userId,$_POST);
				 }
			?>
			
						<form action="" method="POST">
				<?php 
					if(isset($updateDat))
					{
						echo $updateDat;
					}
				?>
				<?php 
					if($userData){
				?>
							<div class="form-group">
								<label for="name">Your Name:</label>
								<input type="text" class="form-control" name="name" value="<?php echo $userData->name ?>" >
								
							</div>
							<div class="form-group">
								<label for="username">Username: </label>
								<input type="text" class="form-control"  name="username"  value="<?php echo $userData->username ?>">
								
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address:</label>
								<input type="text" name="email"class="form-control" value="<?php echo $userData->email ?>">
								
							</div>
							<?php 
								$sessId = session::sess_get("id");
								if($id == $sessId)
								{
							?>
							<button type="submit" name="update" class="btn btn-primary">Update</button>
							<a class="btn btn-info" href="changepass.php?id=<?php echo base64_encode($userId); ?>">Change Password</a>
							<?php } ?>
					<?php } ?>
						</form>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>

<?php 
	include("lib/footer.php");
?>