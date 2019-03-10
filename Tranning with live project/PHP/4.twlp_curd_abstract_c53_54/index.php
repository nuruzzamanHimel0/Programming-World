<?php include_once("pages/header.php"); ?>
<?php 
	spl_autoload_register(function($class_name){
		include_once("classes/".$class_name.".php");
	});
?>
<?php 
	$user = new student();

	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$dept = $_POST["dept"];
		$age = $_POST["age"];
		if(!empty($name) && !empty($dept) && !empty($age))
		{
			$user->setname($name);
			$user->setdept($dept);
			$user->setage($age);

			if($user->insert())
			{
				echo "<span style= 'color:green; font-size:19px;'>Insert into the DB </span>";
			}	
		}	
	}
?>
<?php 
	if(isset($_POST["update"]))
	{	
		$id = $_POST["id"];
		$name = $_POST["name"];
		$dept = $_POST["dept"];
		$age = $_POST["age"];
		if(!empty($name) && !empty($dept) && !empty($age))
		{
			$user->setname($name);
			$user->setdept($dept);
			$user->setage($age);

			if($user->updateById($id ))
			{
				echo "<span style= 'color:green; font-size:19px;'>Update into the DB </span>";
			}	
		}	
	}
?>
<?php 
	if(isset($_GET["action"]) && $_GET["action"] == 'dlt')
	{
		$id = base64_decode($_GET["id"]);
		$id = (int)$id;
		$result = $user->deletByid($id);
		if($result)
		{
			echo "<span style= 'color:red; font-size:19px;'>Delete into the DB </span>";
		}
	}
?>
<?php 
	if(isset($_GET["action"]) && $_GET["action"] == 'edt')
	{
		$id = base64_decode($_GET["id"]);
		$id = (int)$id;
		$result = $user->readById($id);
?>
	<section class="mainLeft clear">
	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $result['id'] ?>">
		<table >
			<tr>
				<td><p>Name :</p> </td>
				<td>
					<input type="text" name="name" value="<?php echo $result['name'] ?>">
				</td>
			</tr>
			<tr>
				<td> <p>Department :</p></td>
				<td>
					<input type="text" name="dept" value="<?php echo $result['dept'] ?>">
				</td>
			</tr>
			<tr>
				<td><p>Age :</p> </td>
				<td>
					<input type="text" name="age" value="<?php echo $result['age'] ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="update" value="Update">
				</td>
			</tr>
		</table>
	</form>
</section>
<?php }
else{ ?>
<section class="mainLeft clear">
	<form action="" method="post">
		<table >
			<tr>
				<td><p>Name :</p> </td>
				<td>
					<input type="text" name="name" placeholder="Your name...">
				</td>
			</tr>
			<tr>
				<td> <p>Department :</p></td>
				<td>
					<input type="text" name="dept" placeholder="Your Department...">
				</td>
			</tr>
			<tr>
				<td><p>Age :</p> </td>
				<td>
					<input type="text" name="age" placeholder="Your Age...">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
</section>
<?php } ?>
<section class="mainRight clear">
	<table class="tbllone" >
		<tr>
			<td>No</td>
			<td>Name</td>
			<td>Department</td>
			<td>Age</td>
			<td>Action</td>
		</tr>
		<?php 
		$i = 0;
			foreach($user->readAll() as $value )
			{
			$i++;
		?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $value["name"]; ?></td>
			<td><?php echo $value["dept"]; ?></td>
			<td><?php echo $value["age"]; ?></td>
			<td>
				<a href="index.php?action=edt&id=<?php echo base64_encode($value["id"]); ?>">Edit</a> ||
				<a href="index.php?action=dlt&id=<?php echo base64_encode($value["id"]); ?>" onclick='return confirm("Are u sure ?")'>Delete</a>
			</td>
		</tr>
		<?php } ?>
		
	</table>
</section>

          
        

<?php include_once("pages/footer.php"); ?>