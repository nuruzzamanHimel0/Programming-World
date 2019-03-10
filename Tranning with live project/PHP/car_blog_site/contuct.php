<?php include("inc/header.php") ?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['submit']))
        {
            $fn = $fm->validation($_POST["fn"]);
            $ln = $fm->validation($_POST["ln"]);
            $eml = $fm->validation($_POST["eml"]);
            $bdy = $fm->validation($_POST["bdy"]);
//            echo $fn."<br>";
//            echo $ln."<br>";
//            echo $eml."<br>";
//            echo $bdy."<br>";
//            exit();

            $fn = mysqli_real_escape_string($db->conn,$fn);
            $ln = mysqli_real_escape_string($db->conn,$ln);
            $eml = mysqli_real_escape_string($db->conn,$eml);
            $bdy = mysqli_real_escape_string($db->conn,$bdy);

            $error = "";
            $mess = "";
            if(empty($fn))
            {
                $error = "<p style=\"font-size:20px;color:red;text-align: center;\"> First name can't Empty!!</p>";
            }
            else if(empty($ln))
            {
                $error = "<p style=\"font-size:20px;color:red;text-align: center;\"> Last name can't Empty!!</p>";
            }
            else if(empty($eml))
            {
                $error = "<p style=\"font-size:20px;color:red;text-align: center;\"> Email name can't Empty!!</p>";
            }
            else if(filter_var($eml,FILTER_VALIDATE_EMAIL) === FALSE)
            {
                $error = "<p style=\"font-size:20px;color:red;text-align: center;\"> Invalid Email Address!!</p>";
            }
            else if(empty($bdy))
            {
                $error = "<p style=\"font-size:20px;color:red;text-align: center;\">Text Field can't Empty!!</p>";
            }
            else{
                $query = "INSERT INTO tbl_contuct(firstName,lastname,email,body,status) VALUES('$fn','$ln','$eml','$bdy','0')";
                $result = $db->insert($query);
                if($result)
                {
                    $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Message Send Successfully </p>";
                }else
                {
                    $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\"> Fail to send message </p>";
                }
            }
        }
    ?>
       
        
        <div id="templatemo_content">
            <div id="templatemo_content_left">
				
                <div class="templatemo_post">
                    <div class="post_title">
                     Contuct Us  
                    </div>
                    <?php
                    if(isset($error) && !empty($error)) {echo $error;$error = " ";}
                    if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg;$sucmsg = " ";}
                    if(isset($errmsg) && !empty($errmsg)) {echo $errmsg;$errmsg = " ";}
                    ?>

                    <div class="post_body">
                       <form action="" method="post">
                            <table>
                                <tr>
                                    <td><p>First Name</p></td>
                                    <td>
                                        <input type="text" name="fn" placeholder="Enter First Name">
                                    </td>
                                </tr>
                                  <tr>
                                    <td><p>Last Name</p></td>
                                    <td>
                                        <input type="text" name="ln" placeholder="Enter Last Name">
                                    </td>
                                </tr>
                                  <tr>
                                    <td><p>Email</p></td>
                                    <td>
                                        <input type="text" name="eml" placeholder="Enter Email Address">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Description</p></td>
                                    <td>
                                        <textarea class="tinymce" name="bdy" cols="44" rows="15">

                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" value="submit" id="submit">
                                    </td>
                                </tr>
                            </table>
                        </form>
                            </div> 
                    </div>
                   
            </div> <!-- end of content left -->
        
            <div id="templatemo_content_right">
            
            	  <?php include("inc/sidebar.php"); ?>
                
            </div> <!-- end of right content -->
	    </div> <!-- end of content -->
    </div> <!-- end of content container -->

	 <?php include("inc/bottom.php") ?>
    
            <?php include("inc/footer.php") ?>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>

