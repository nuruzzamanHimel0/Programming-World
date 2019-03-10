<?php 
	include("lib/header.php");
	spl_autoload_register(function($class_name)
	{
		include("lib/".$class_name.".php");
	})
?>
<?php 
$user = new user();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
	{
		$userLog = $user->userLogin($_POST);
	}
	session::checkLogIn();
		
?>
	<div class="bodySection">
		<div class="container containerStyle">
			<div class="card">
				<div class="card-body">
					<div style="max-width: 600px; margin: 0px auto;">
						<?php 
							if(isset($userLog))
							{
								echo $userLog;
							}
						?>
						<form action="" method="POST">
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" >
								
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
							</div>
							<button type="submit" name="login" class="btn btn-primary">LogIn</button>
						</form>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>

<?php 
	include("lib/footer.php");
?>