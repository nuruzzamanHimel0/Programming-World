<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
    {

        $title = $fm->validation($_POST["title"]);
        $title = mysqli_real_escape_string($db->conn,$title);
//        echo $title;
//        exit();

        $permitted = array("jpg");
        $tmp_name = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];

        $div = explode(".",$filename);
        $ext = strtolower(end($div));
        $new_img_name = substr(md5(time()),0,10).".".$ext;
//        echo $new_img_name;
//        exit();

        if(empty($filename))
        {
            $errslider = "<span style=\"font-size:12px;color:red;\">Slider Field Can't Empty !!!</span>";

        }
        else if(in_array($ext,$permitted) == false)
        {
            $errup = "<p style=\"font-size:20px;color:red;text-align: center;\">You can only upload JPG Slider Image!!!</p>";

        }
        else if($filesize>3145728)
        {
            $errsize = "<p style=\"font-size:20px;color:red;text-align: center;\">Slider Image SIze Is Grater then 3MB!!</p>";

        }
        else if(!empty($filename) && !empty($title))
        {
            move_uploaded_file($tmp_name,"../images/slideshow/".$new_img_name);
            $query = "INSERT INTO tbl_slider(title,image) VALUES('$title','$new_img_name')";
            $add_slider = $db->insert($query);
            if($add_slider)
            {
                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Slider And Title Added Successfully </p>";


            }
            else{
                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Added Slider And Title !!</p>";
            }
        }
        else if(!empty($filename)){
            move_uploaded_file($tmp_name,"../images/slideshow/".$new_img_name);
            $query = "INSERT INTO tbl_slider(image) VALUES('$new_img_name')";
            $add_slider = $db->insert($query);
            if($add_slider)
            {
                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Slider  Added Successfully </p>";
            }
            else{
                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Added Slider !!</p>";
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
                    <table class="form">                    
                        <tr>
                            <td>
                                <label >Slider Title:</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label >Slider Image:</label>
                            </td>
                            <td>
                                <input type="file" name="image">
                                <span style="color: red;">
                                        *<?php if(isset($errslider)){echo $errslider;} ?>
                                 </span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
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