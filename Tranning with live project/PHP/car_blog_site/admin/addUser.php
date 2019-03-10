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
            if(isset($_POST['save']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $role =" ";

                $password = md5($_POST['password']);
                $name = mysqli_real_escape_string($db->conn,$_POST['name']);
                $username = mysqli_real_escape_string($db->conn,$_POST['username']);
                $password = mysqli_real_escape_string($db->conn,$password);
                if(empty($_POST['gender'])){
                    $gender = " ";
                }else{
                    $gender = mysqli_real_escape_string($db->conn,$_POST['gender']);
                }
                if(empty($_POST['role'])){
                    $gender = " ";
                }else{
                    $role = mysqli_real_escape_string($db->conn,$_POST['role']);
                }

                $email = mysqli_real_escape_string($db->conn,$_POST['email']);

                $description = mysqli_real_escape_string($db->conn,$_POST['description']);

                $permited = array('jpg','jpge');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if(empty($name) || empty($username) || empty($password) || empty($gender) || empty($role)  )
                {
                    $err= "<p style=\"font-size:20px;color:red;text-align: center;\"> Required Field can't Empty!!</p>";
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
                            move_uploaded_file($tmp_name,"img/user/".$uploade_image);
                            $query = "INSERT INTO tbl_user(name,username,password,gender,email,description,image,role) VALUES('$name','$username','$password','$gender','$email','$description','$uploade_image','$role' )";
                            $result = $db->insert($query);
                            if($result)
                            {
                                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Profile Insert Successfully </p>";
                            }else
                            {
                                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Profile Insert !!</p>";
                            }
                        }
                    }else{

                        $query = "INSERT INTO tbl_user(name,username,password,gender,email,description,role) VALUES('$name','$username','$password','$gender','$email','$description','$role' )";
                        $result = $db->insert($query);
                        if($result)
                        {
                            $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Profile Insert Successfully </p>";
                        }else
                        {
                            $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Profile Insert !!</p>";
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


                        <form action="" method="post" enctype="multipart/form-data">
                            <table class="form">


                                <tr>
                                    <td>
                                        <label>Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" value=""  class="medium" />
                                        <span style="color: red; font-size: 18px;">
                                            *
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Username</label>
                                    </td>
                                    <td>
                                        <input type="text" name="username" class="medium" value="" />
                                        <span style="color: red; font-size: 18px;">
                                            *
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Password</label>
                                    </td>
                                    <td>
                                        <input type="password" name="password" class="medium" value="" />
                                        <span style="color: red; font-size: 18px;">
                                            *
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Gender</label></td>
                                    <td>

                                        <input type="radio" name="gender" value="m" > Male &nbsp;
                                        <input type="radio" name="gender" value="f"> Female &nbsp;
                                        <span style="color: red; font-size: 18px;">
                                            *
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Email</label>
                                    </td>
                                    <td>
                                        <input type="text" name="email"  class="medium" value=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <input type="file" name="image" />
                                        <span style="color: red; font-size: 18px;">

                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label >Role</label></td>
                                    <td>

                                        <input type="radio" name="role" value="0" > Super Admin &nbsp;
                                        <input type="radio" name="role" value="1"> Admin &nbsp;
                                        <input type="radio" name="role" value="2"> Editor &nbsp;
                                        <span style="color: red; font-size: 18px;">
                                            *
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Description</label>
                                    </td>
                                    <td>
                                        <textarea class="tinymce" name="description" >

                                        </textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="save" Value="Save" />
                                        <a href="index.php" id="back"> BACK</a>
                                    </td>
                                </tr>
                            </table>
                        </form>


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
