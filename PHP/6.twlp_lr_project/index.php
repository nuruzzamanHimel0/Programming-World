<?php 
	include("lib/header.php");
	include("lib/user.php");
	
	$user = new user();
	session::checkLogOut();
?>
	
	<div class="bodySection">
		<div class="container containerStyle">
			<div class="card">
					<?php 
						$logInmsg = session::sess_get("loginmsg");
						if($logInmsg)
						{
							echo $logInmsg;
						}
						session::sess_set("loginmsg",NULL);
						
					?>
				<div class="card-header " >
					<h2 >User List: 
						<span >
							<strong style="margin-left: 265px;">Welcome! 
							<?php 
								$name = session::sess_get("name");
								if(isset($name))
								{
									echo $name;
								}
								
							?>
							</strong>
						</span>
					</h2>
				</div>

				<div class="card-body">

					<table class="table table-striped">
						  <thead class="table-dark">
						    <tr>
						      <th scope="col">Serial</th>
						      <th scope="col">Name</th>
						      <th scope="col">Username</th>
						      <th scope="col">Email Address</th>
						      <th scope="col"> Action</th>
						    </tr>
						  </thead>
		<?php 
			$userAllData = $user->getUserAllData();
			$i = 0;
			if($userAllData)
			{
				foreach($userAllData as $userData)
				{
					$i++;
			?>
							  <tbody>
							    <tr>
							      <th scope="row"><?php echo $i; ?></th>
							      <td><?php echo $userData['name']; ?></td>
							      <td><?php echo $userData["username"]; ?></td>
							      <td><?php echo $userData['email']; ?></td>
							      <td>
							      	<a href="profile.php?id=<?php echo base64_encode($userData['id']); ?>">
							      		<button type="button" class="btn btn-primary">
							      			View
							      		</button>
							      	</a>
							      </td>
							    </tr>
							     
			<?php 	} 
			}
			else{
				?>	    
					<tr><th colspan="5"> NO result Found</th></tr>
				<?php } ?>	    
					
				    
						  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php 
	include("lib/footer.php");
?>