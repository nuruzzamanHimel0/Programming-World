<?php include_once("pages/header.php"); ?>
<?php include_once("classes/student.php"); ?>
<?php 
////    using magic function...........
//    function __autoload($class_name){
//        include_once("classes/".$class_name.".php");
//    }
?>
<?php 
////    using Bilding  function...........
spl_autoload_register(function($class_name){
    include_once("classes/".$class_name.".php");
});
?>
<?php 
    $std = new student();
?>
<?php 
    if(isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $dept= $_POST["dept"];
        $age = $_POST["age"];
        
        $std->setName($name);
        $std->setDept($dept);
        $std->setAge($age);

        if($std->insert())
        {
        	echo "<span> Data Insert Successfully.... </span>";
        }
    }
?>
<div class="titleSection clear">
	<h2 style=""> CRUD & PDO - Template and DB Design</h2>	
	<h2><a href="">Create New</a> </h2>
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
            <?php
            $i = 0;
            foreach ($std->readAll() as $key => $value)
            {
                $i++;
            ?>
            <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo $value["dept"]; ?></td>
                    <td><?php echo $value["age"]; ?></td>
                    <td>
                            <a href="#">Edit</a> ||
                            <a href="#">Delete</a>
                    </td>
            </tr>
            <?php 
            }
            ?>
           
    </table>
</section>

          
        

<?php include_once("pages/footer.php"); ?>