<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<style>
    .rightSide {
        float: right;
        width: 25%;
        text-align: center;
    }
    .rightSide img {
        width: 181px;
        border: 1px solid #fff;
        border-radius: 34px;
    }
    .rightSide p {
        margin-bottom: 1em;
        font-size: 18px;
        margin-top: 13px;
        border: 3px solid #ddd;
        /* padding: 0; */
        width: 68%;
        margin-left: 40px;
    }
    .leftSide {
        float: left;
        width: 69%;
    }
    #back {
        color: #444444;
        font-weight: normal !important;
        text-decoration: none;
        background: #F0F0F0;
        padding: 3px 21px;
        border: 1px solid #C8C8C8;
        font-size: 19px;
        /* padding-top: 18px; */
    }
</style>
        <div class="grid_10">
            <?php
            if(isset($_POST['update']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {



                $name = mysqli_real_escape_string($db->conn,$_POST['name']);
                $username = mysqli_real_escape_string($db->conn,$_POST['username']);
                $email = mysqli_real_escape_string($db->conn,$_POST['email']);
                $description = mysqli_real_escape_string($db->conn,$_POST['description']);

                $permited = array('jpg','jpge');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if(empty($name) || empty($username) || empty($email) || empty($description)  )
                {
                    $err= "<p style=\"font-size:20px;color:red;text-align: center;\"> Field Can't be Empty !!</p>";
                }
                else{
                    if(!empty($filename))
                    {
                        if($filesize>3145728)
                        {
                            $errsize = "<p style=\"font-size:20px;color:red;text-align: center;\"> Image SIze Is Grater then 3MB!!</p>";

                        }
                        elseif(in_array($extension , $permited) === FALSE)
                        {
                            $errup = "<p style=\"font-size:20px;color:red;text-align: center;\">You can only upload ".implode(",",$permited)." Image!!!</p>";
                        }
                        else
                        {
                            $query = "SELECT * FROM tbl_user WHERE id='$userId' AND role='$userRole'";
                            $reslt = $db->select($query);
                            $row = $reslt->fetch_assoc();
                            unlink("img/user/".$row['image']);
                            // upload image in server
                            move_uploaded_file($tmp_name,"img/user/".$uploade_image);


                            $query = "UPDATE tbl_user SET
                                      name = '$name',
                                      username = '$username',
                                      email = '$email',
                                      description = '$description',
                                      image = '$uploade_image'
                                      WHERE id = '$userId'
                            ";
                            $result_udt = $db->insert($query);
                            if($result_udt)
                            {
                                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Profile Update Successfully </p>";
                            }else
                            {
                                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Profile Update !!</p>";
                            }
                        }
                    }else{
                        $query = "UPDATE tbl_user SET
                                      name = '$name',
                                      username = '$username',
                                      email = '$email',
                                      description = '$description'
                                      WHERE id = '$userId'
                            ";
                        $result_udt = $db->insert($query);
                        if($result_udt)
                        {
                            $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Profile Update Successfully </p>";
                        }else
                        {
                            $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Profile Update !!</p>";
                        }
                    }
                }

            }
            ?>
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php
                if(isset($err) && !empty($err)) {echo $err;$err = " ";}

                if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg; $sucmsg=" ";}

                if(isset($errup)){echo $errup;}

                if(isset($errsize)){echo $errsize;}
                if(isset($ermsg)){echo $ermsg;}
                ?>

                <div class="block">
                    <?php
                    $query = "SELECT * FROM  tbl_user WHERE id='$userId' AND role='$userRole' ";
                    $user_res = $db->select($query);
                    if($user_res)
                    {
                    while($row = $user_res->fetch_assoc())
                    {
                    ?>
                    <div class="leftSide">
                        <form action="" method="post" enctype="multipart/form-data">
                            <table class="form">


                                <tr>
                                    <td>
                                        <label>Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo $row['name']; ?>"  class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Username</label>
                                    </td>
                                    <td>
                                        <input type="text" name="username" class="medium" value="<?php echo $row['username']; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Gender</label></td>
                                    <td>
                                    <?php
                                        if($row['gender'] === 'm')
                                        {
                                    ?>
                                        <input type="radio" name="gender" value="male" checked> Male<br>
                                        <input type="radio" name="gender" value="female" disabled> Female<br>
                                    <?php }else{ ?>
                                        <input type="radio" name="gender" value="male" disabled> Male<br>
                                        <input type="radio" name="gender" value="female" checked> Female<br>
                                    <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Email</label>
                                    </td>
                                    <td>
                                        <input type="text" name="email"  class="medium" value="<?php echo $row['email']; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <input type="file" name="image" />
                                        <span style="color: red; font-size: 18px;">
                                            * Field not required
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Description</label>
                                    </td>
                                    <td>
                                        <textarea class="tinymce" name="description" >
                                            value="<?php echo $row['description']; ?>"
                                        </textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="update" Value="Update" />
                                        <a href="index.php" id="back"> BACK</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="rightSide">
                    <?php
                        if(!empty($row['image']))
                        {
                     ?>
                        <img src="img/user/<?php echo $row['image']; ?>" alt="User Logo" width="200px;"><br>
                        <p><?php echo $row['name']; ?></p>
                    <?php
                        }else if(empty($row['image']))
                        {
                          if($row['gender'] == 'm')
                          {
                    ?>
                          <img src="img/demo_img/male.jpg" alt="User Logo" width="200px;"><br>
                          <p><?php echo $row['name']; ?></p>
                    <?php
                          }else if($row['gender'] == 'f'){
                    ?>
                          <img src="img/demo_img/female.jpg" alt="User Logo" width="200px;"><br>
                          <p><?php echo $row['name']; ?></p>
                    <?php
                          }
                        }
                    ?>

                    </div>
                <?php } } ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <?php include("inc/footer.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
