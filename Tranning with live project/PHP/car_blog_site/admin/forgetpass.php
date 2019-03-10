<?php include("lib/Session.php");  ?>
<?php include("../config/config.php");  ?>
<?php include("../lib/Database.php");  ?>
<?php include("../helper/formate.php");  ?>
<?php Session::sess_start(); ?>
<?php 
	$db = new Database();
	$fm = new formate();
	$message = "";
	Session::getLogIn();
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
	{
		$username = $fm->validation($_POST['username']);
        $email = $fm->validation($_POST['email']);

        $username = mysqli_real_escape_string($db->conn,$username);
        $email = mysqli_real_escape_string($db->conn,$email);

        if(empty($username) && empty($email))
        {
            $err_msg = "<span ><p style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Field Can't Empty!! </p></span>";
        }
        else if (filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE)
        {
            $err_msg = "<span ><p style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Invalid Email Address!! </p></span>";
        }
        else
        {
            $query = "SELECT * FROM tbl_user WHERE username ='$username' && email ='$email' LIMIT 1 ";
//            echo $query;
//            exit();
            $usr_result = $db->select($query);
            $user_id = "";
            $user_email = "";
            if($usr_result)
            {
                while($row = $usr_result->fetch_assoc())
                {
                    $user_id = $row['id'];
                    $user_email = $row['email'];
                    $user_name = $row['username'];
                }

                    $text = substr($user_email,0,6);
                    $rand = rand(5000,9999);
                    $newpass = "$text$rand";
                    $newpass = md5($newpass);
                    $updatequery = "UPDATE tbl_user SET password = '$newpass' WHERE id =".$user_id;
//                     echo $updatequery;
//                     exit;
                    $udt_result = $db->update($updatequery);
                    if($udt_result)
                    {
                        $mail_to = '$email';
                        $from = "n.himel143@gmail.com";
                        $mail_subject = "Your Password";
                        $mail_message = "Your Username:".$user_name." And Password: ".$newpass." Please visite site for login  ";
                        $sendMail = mail($mail_to, $mail_subject, $mail_message, $from);
                        if($sendMail){
                            $send_mail = "<span ><p style='color:#44ff33; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Mail Send Successfully </p></span>";
                        }else{
                            $err_mail = "<span ><p style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Mail Not Send !!! </p></span>";
                        }
                    }


            }

        }
		
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Forget Message</h1>
			<?php if(isset($err_msg)){echo $err_msg;}  ?>
            <?php if(isset($send_mail)){echo $send_mail;}  ?>
            <?php if(isset($err_mail)){echo $err_mail;}  ?>
            <div>
                <input type="text" placeholder="Enter Your Username"  name="username"/>
            </div>
			<div>
				<input type="text" placeholder="Enter Your Email"  name="email"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Send Mail" />
			</div>
		</form><!-- form -->
        <div class="button">
            <a href="login.php">Login</a>
        </div>
        <div class="button">
            <a href="https://www.facebook.com/nuruzzaman.himel0">Md. Nuruzzaman</a>
        </div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>