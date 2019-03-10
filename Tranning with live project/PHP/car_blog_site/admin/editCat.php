<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php
    if(!isset($_GET['edtId']) || empty($_GET["edtId"]))
    {
        echo "<script>window.location='index.php'; </script>";

    }
    else{
        $id = $_GET['edtId'];
    }

?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"]))
    {
        $name = $fm->validation($_POST["name"]);
        $name = mysqli_real_escape_string($db->conn,$name);
        if(empty($name))
        {
            $errname = "<span style=\"font-size:12px;color:red;\">Name Field Can't be Empty !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</span>";

        }
        if(isset($name) && !empty($name))
        {
            $query = "UPDATE tbl_catagory SET name='$name' WHERE id='$id'";
            $udt_cat = $db->update($query);
            if($udt_cat)
            {
                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Catagory Update Successfully </p>";


            }
            else{
                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Catagory Update !!</p>";
            }
        }
    }
?>

        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Update Category</h2>
                <?php
                if(isset($ermsg) && !empty($ermsg)) {echo $ermsg;$ermsg = " ";}

                if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg; $sucmsg=" ";}

                ?>
               <div class="block copyblock">
        <?php
            $query = "SELECT * FROM tbl_catagory WHERE id = '$id'";
            $cat_res = $db->select($query);
            if($cat_res) {

                while($row = $cat_res->fetch_assoc())
                {

        ?>
                 <form action="" method="post">

                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name"  class="medium" value="<?php echo $row['name'];  ?>" />
                                <span style="color: red;">
                                        *<?php if(isset($errname)){echo $errname;} ?>

                                    </span>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="update" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
             <?php } }else{
                echo "<span ><p style=\"font-size:12px;color:red;\">Category Not Available !!! </p> </span>";

            } ?>
                </div>
            </div>
        </div>
        
<?php include("inc/footer.php") ?>