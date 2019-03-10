<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
    {
        $name = $fm->validation($_POST["name"]);
        $name = mysqli_real_escape_string($db->conn,$name);
        if(empty($name))
        {
            $errname = "<span style=\"font-size:12px;color:red;\">Name Field Can't be Empty !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</span>";

        }
        if(isset($name) && !empty($name))
        {
            $query = "INSERT INTO tbl_catagory(name) VALUES('$name')";
            $add_cat = $db->insert($query);
            if($add_cat)
            {
                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Catagory Added Successfully </p>";


            }
            else{
                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Catagory Added !!</p>";
            }
        }
    }
?>

        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php
                if(isset($ermsg) && !empty($ermsg)) {echo $ermsg;$ermsg = " ";}

                if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg; $sucmsg=" ";}

                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                                <span style="color: red;">
                                        *<?php if(isset($errname)){echo $errname;} ?>

                                    </span>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        
<?php include("inc/footer.php") ?>