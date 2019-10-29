<?php include_once("pages/header.php"); ?>
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
    $std = new teacher_53();
?>
<?php 
    if(isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $dept= $_POST["dept"];
        $age = $_POST["age"];
        if(!empty($name) && !empty($dept) && !empty($age))
        {
            $std->setName($name);
            $std->setDept($dept);
            $std->setAge($age);
         }
        if($std->insert())
        {
        	echo "<span> Data Insert Successfully.... </span>";
        }
    }
?>
<?php 
     if(isset($_POST["update"]))
    {   
        $id = $_POST["id"];
        $name = $_POST["name"];
        $dept= $_POST["dept"];
        $age = $_POST["age"];
        
        $std->setName($name);
        $std->setDept($dept);
        $std->setAge($age);

        if($std->update($id))
        {
            echo "<span> Data Update Successfully.... </span>";
        }
    }
?>

<?php 
    if(isset($_GET['action']) && $_GET['action'] == "dlt")
    {
        $id =(int) $_GET['id'];
        $result = $std->delete($id);
        if(isset($result))
        {
            echo "<span> Data Delete Successfully.... </span>";

        }
    }
?>
<?php 
    if(isset($_GET['action']) && $_GET['action'] =='edt')
    {
         $id = (int)$_GET['id'];
        $result = $std->readById($id);
?>

<section class="mainLeft clear">
    <form action="" method="post">
        <table >
            <input type="hidden" name="id" value="<?php echo $result["id"]; ?>">
            <tr>
                <td><p>Name :</p> </td>
                <td>
                    <input type="text" name="name" value="<?php echo $result["name"]; ?>">
                </td>
            </tr>
            <tr>
                <td> <p>Department :</p></td>
                <td>
                    <input type="text" name="dept"value="<?php echo $result["dept"]; ?>">
                </td>
            </tr>
            <tr>
                <td><p>Age :</p> </td>
                <td>
                    <input type="text" name="age"value="<?php echo $result["age"]; ?>">
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
else{
 ?>



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
                            <a href="p_54(design pattern -teacher).php?action=edt&id=<?php echo $value['id'];?>">Edit</a> ||
                            <a href="p_54(design pattern -teacher).php?action=dlt&id=<?php echo $value['id'];?>" onClick="return confirm('Are You Sure ?');">Delete</a>
                    </td>
            </tr>
            <?php 
            }
            ?>
           
    </table>
</section>

          
        

<?php include_once("pages/footer.php"); ?>