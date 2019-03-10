<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php
    if(!isset($_GET['edtId']) || empty($_GET["edtId"]))
    {
        echo "<script>window.location='index.php'; </script>";
    }
    else{
        $id = base64_decode($_GET['edtId']);
    }
?>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"]))
    {
        $slidId = $_POST['slidId'];

        $title = $fm->validation($_POST["title"]);
        $title = mysqli_real_escape_string($db->conn,$title);


        $permitted = array("jpg");
        $tmp_name = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];

        $div = explode(".",$filename);
        $ext = strtolower(end($div));
        $new_img_name = substr(md5(time()),0,10).".".$ext;


        if(empty($title) && empty($filename))
        {
            $query = "UPDATE tbl_slider SET title=' ' WHERE id = '$slidId'";
            $udt_slider = $db->update($query);
            if($udt_slider)
            {
                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\">  Update Successfully Without Title </p>";


            }
            else{
                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Update Without Title !!</p>";
            }

        }
        if(!empty($filename) && empty($title) )
        {
            if(in_array($ext,$permitted) == false)
            {
                $errup = "<p style=\"font-size:20px;color:red;text-align: center;\">You can only upload JPG Slider Image!!!</p>";

            }
            else if($filesize>3145728)
            {
                $errsize = "<p style=\"font-size:20px;color:red;text-align: center;\">Slider Image SIze Is Grater then 3MB!!</p>";

            }
            else{
                $query = "SELECT * FROM tbl_slider WHERE id = '$slidId'";
                $reslt = $db->select($query);
                $row = $reslt->fetch_assoc();
                unlink("../images/slideshow/".$row['image']);

                move_uploaded_file($tmp_name,"../images/slideshow/".$new_img_name);
                $query = "UPDATE tbl_slider SET image='$new_img_name' WHERE id = '$slidId'";
                $udt_slider = $db->update($query);
                if($udt_slider)
                {
                    $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\">  Update Successfully </p>";


                }
                else{
                    $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Update !!</p>";
                }
            }

        }

        else if( !empty($title) && empty($filename))
        {
            $query = "UPDATE tbl_slider SET title='$title' WHERE id = '$slidId'";
            $udt_slider = $db->update($query);
            if($udt_slider)
            {
                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\">  Update Successfully </p>";
            }
            else{
                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Update !!</p>";
            }
        }
        else if(!empty($filename) && !empty($title) )
        {
            if(in_array($ext,$permitted) == false)
            {
                $errup = "<p style=\"font-size:20px;color:red;text-align: center;\">You can only upload JPG Slider Image!!!</p>";

            }
            else if($filesize>3145728)
            {
                $errsize = "<p style=\"font-size:20px;color:red;text-align: center;\">Slider Image SIze Is Grater then 3MB!!</p>";

            }
            else{
                $query = "SELECT * FROM tbl_slider WHERE id = '$slidId'";
                $reslt = $db->select($query);
                $row = $reslt->fetch_assoc();
                unlink("../images/slideshow/".$row['image']);

                move_uploaded_file($tmp_name,"../images/slideshow/".$new_img_name);
                $query = "UPDATE tbl_slider SET title='$title',image='$new_img_name' WHERE id = '$slidId'";
                $udt_slider = $db->update($query);
                if($udt_slider)
                {
                    $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\">  Update Successfully </p>";


                }
                else{
                    $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Update !!</p>";
                }
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

                if(isset($errup)){echo $errup;}

                if(isset($errsize)){echo $errsize;}
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    $query = "SELECT * FROM tbl_slider WHERE id ='$id'";
                    $slider_res = $db->select($query);
                    if($slider_res)
                    {

                    ?>
                    <table class="form">
                    <?php
                        while($row = $slider_res->fetch_assoc())
                        {
                    ?>
                        <tr>
                            <td>
                                <label >Slider Title:</label>
                            </td>
                            <td>
                                <input type="hidden" name="slidId" value="<?php echo $row['id']; ?>">
                                <input type="text" name="title"  class="medium" value="<?php echo $row['title']; ?>" />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label >Slider Image:</label>
                            </td>
                            <td>
                                <img src="../images/slideshow/<?php echo $row['image'] ?>" width="150px" height="80px"><br>
                                <input type="file" name="image">

                            </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>
                                <input type="submit" name="update" Value="Update" />
                            </td>
                        </tr>
                    <?php } ?>
                    </table>
                    </form>
                   <?php } else{
                       echo "<span ><p style=\"font-size:30px;color:red; text-align: center;\">Slider Not Available !!! </p> </span>";

                   } ?>
                </div>
            </div>
        </div>
        
<?php include("inc/footer.php") ?>