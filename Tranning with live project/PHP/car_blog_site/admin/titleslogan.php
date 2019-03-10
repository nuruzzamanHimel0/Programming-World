<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
    <style>
        .leftSidbar {
            float: left;
            width: 60%;
        }
        .rightSidbar {
            float: right;
            width: 32%;
            text-align: center;
        }
        table.form input {
            font-size: 16px;
            padding: 5px 26px 12px 48px;
            border-top: 1px solid #b3b3b3;
            border-left: 1px solid #b3b3b3;
            border-right: 1px solid #eaeaea;
            border-bottom: 1px solid #eaeaea;
        }
        .rightSidbar img {
            width: 209px;
        }
        .rightSidbar h5{}
    </style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">

            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"]))
                {
                    $title = $fm->validation($_POST["title"]);
                    $title = mysqli_real_escape_string($db->conn,$title);

                    $permitted = array("png");
                    $tmp_name = $_FILES["logo"]["tmp_name"];
                    $filename = $_FILES["logo"]["name"];
                    $filesize = $_FILES["logo"]["size"];

                    $div = explode(".",$filename);
                    $extension = strtolower(end($div));
                    $new_img_name = substr(md5(time()),0,10).".".$extension;
                    //echo $new_img_name;

                    if(empty($title))
                    {
                        $errmsg = "<p style='font-size:20px;color:red;text-align: center;'> Title and Slogan is not available </p>";
                    }

                    if(!empty($filename))
                    {
                        if($filesize >3145728 )
                        {
                            $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\"> Photo Size is Too High.!!</p>";

                        }
                        else if(in_array($extension,$permitted) == FALSE)
                        {
                            $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\"> You Can Upload Only PNG photo</p>";

                        }
                        else{
                            move_uploaded_file($tmp_name,"img/logo/".$new_img_name);

                            $query = "SELECT * FROM tbl_slogan WHERE id = 1";
                            $result = $db->select($query);
                            if($result)
                            {
                                $fetch = $result->fetch_assoc();
                                unlink("img/logo/".$fetch["logo"]);
                                $query = "UPDATE tbl_slogan SET title = '$title', logo = '$new_img_name' WHERE id = '1'  ";
                                $result = $db->update($query);
                                if($result)
                                {
                                    $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</p>";

                                }
                                else{
                                    $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail to Update Data !!</p>";

                                }
                            }
                            // First Time Title And Logo Insert......................
                            else{
                                $query = "INSERT INTO tbl_slogan(id,title,logo) VALUES('1','$title','$new_img_name') ";
                                $result = $db->insert($query);
                                if($result)
                                {
                                    $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Insert Successfully.</p>";

                                }
                                else{
                                    $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail to Insert Data !!</p>";

                                }
                            }


                        }
                    } // .......  filename not empty here
                    else{
                        $query = "UPDATE tbl_slogan SET title = '$title' WHERE id = '1'  ";
                        $result = $db->update($query);
                        if($result)
                        {
                            $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</p>";

                        }
                        else{
                            $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail to Update Data !!</p>";

                        }
                    }
                }
            ?>
                    <?php
                    if(isset($errmsg)) {echo $errmsg;}
                    if(isset($succmsg)) {echo $succmsg;}
                    ?>
            <?php
                $query = "SELECT * FROM tbl_slogan WHERE id = '1'";
                $slogan_res = $db->select($query);
                if($slogan_res) {
                    if($slogan_res->num_rows > 0)
                    {
                        while($row = $slogan_res->fetch_assoc()) {
                            ?>
                            <div class="leftSidbar">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <table class="form">
                                        <tr>
                                            <td>
                                                <label>Website Title</label>
                                            </td>
                                            <td>
                                                <input type="text" name="title" value="<?php echo $row['title']; ?>"
                                                       class="medium"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label>Logo</label>
                                            </td>
                                            <td>
                                                <input type="file" name="logo"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                <input type="submit" name="update" Value="Update"/>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                            <div class="rightSidbar">
                                <img src="img/logo/<?php echo $row["logo"]; ?>" alt="LOGO">
                                <h3>LOGO</h3>
                            </div>
                            <?php
                        }}}else{
                    ?>
                    <p style="font-size:25px;color:red;text-align: center;"> Title and Slogan is not available </p>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <table class="form">
                                <tr>
                                    <td>
                                        <label>Website Title</label>
                                    </td>
                                    <td>
                                        <input type="text"  name="title" value=""
                                               class="medium"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Logo</label>
                                    </td>
                                    <td>
                                        <input type="file" name="logo"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input type="submit" name="update" Value="Update"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <?php
                }
                 ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <?php include("inc/footer.php"); ?>