<?php include_once("pages/header.php"); ?>
<div class="titleSection clear">	
	
</div>

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

<section class="mainRight clear">
	<table class="tbllone" >
		<tr>
			<td>No</td>
			<td>Name</td>
			<td>Department</td>
			<td>Age</td>
			<td>Action</td>
		</tr>
		<tr>
			<td>1</td>
			<td>himel</td>
			<td>CSE</td>
			<td>24</td>
			<td>
				<a href="#">Edit</a>||
				<a href="#">Delete</a>
			</td>
		</tr>
		<tr>
			<td>1</td>
			<td>himel</td>
			<td>CSE</td>
			<td>24</td>
			<td>
				<a href="#">Edit</a>||
				<a href="#">Delete</a>
			</td>
		</tr><tr>
			<td>1</td>
			<td>himel</td>
			<td>CSE</td>
			<td>24</td>
			<td>
				<a href="#">Edit</a>||
				<a href="#">Delete</a>
			</td>
		</tr>
	</table>
</section>

          
        

<?php include_once("pages/footer.php"); ?>