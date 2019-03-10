<?php 
	include("lib/header.php");
	spl_autoload_register(function($class_name){
		include("lib/".$class_name.".php");
	})
?>
<?php 
	$user = new user();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']))
	{
		$userRegis = $user->userRegistration($_POST);
	}
	session::checkLogIn();
?>

	<div class="bodySection">
		<div class="container containerStyle">
			<div class="card">
				<div class="card-body">
					<div style="max-width: 600px; margin: 0px auto;">
						<?php 
							if(isset($userRegis))
							{
								echo $userRegis;
							}
						?>
						<form action="" method="POST">
							<div class="form-group">
								<label for="name">Your Name:</label>
								<input type="text" class="form-control" id="exampleInputEmail1" name="name"  placeholder="Your Name" >
								
							</div>
							<div class="form-group">
								<label for="username">Username: </label>
								<input type="text" class="form-control"  name="username"  placeholder="Username" >
								
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address:</label>
								<input type="text" class="form-control" name="email" placeholder="Enter email" >
								
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password:</label>
								<input type="password" class="form-control" name="password" placeholder="Password" >
							</div>
							<button type="submit" name="register" class="btn btn-primary">Submit</button>
						</form>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>

<?php 
	include("lib/footer.php");
?>