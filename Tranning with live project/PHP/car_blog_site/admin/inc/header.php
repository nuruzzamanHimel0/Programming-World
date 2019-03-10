<?php include("lib/Session.php");  ?>
<?php include("../config/config.php");  ?>
<?php include("../lib/Database.php");  ?>
<?php include("../helper/formate.php");  ?>
<?php include("phpmailer/PHPMailerAutoload.php");  ?>
<style>
    .logo p {
        background: #fff;
        font-size: 20px;
        padding: 3px 9px;
        font-weight: bold;
        margin-top: 0 !important;
        /* margin-bottom: 17 !important; */
    }
    .middle h1{}
</style>
<?php Session::sess_start(); ?>
<?php 
    $db = new Database();
    $fm = new formate();
    $message = "";
    Session::getLogOut();
    $userId = Session::sess_get("userId");
    $userRole = Session::sess_get("userrole");
    $userName = Session::sess_get("username");

?>
<?php
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.dialog.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.blind.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.explode.min.js" type="text/javascript"></script>
    <!-- jQuery dialog end here-->
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <!--Fancy Button-->
    <script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <?php
                $query = "SELECT * FROM tbl_slogan WHERE id = '1'";
                $result = $db->select($query);
                if($result)
                {
                $fetch = $result->fetch_assoc();
                ?>
                 <div class="floatleft logo">
                
                    <img src="img/logo/<?php echo $fetch["logo"]; ?>" alt="Logo" width="100px" height="" />
             
				</div>
				<div class="floatleft middle">

					<h1><?php echo $fetch["title"]; ?></h1>

				</div>
                <?php }else{ ?>
                <div class="floatleft logo">

                    <p>LOGO</p>

                </div>
                <div class="floatleft middle">

                    <h1>Title Descriotion....</h1>

                </div>
                <?php } ?>
                <div class="floatright">
                    <div class="floatleft">
                    <?php 

                    ?>
                <?php 
                    $query = "SELECT * FROM tbl_user WHERE id = '$userId' AND role= '$userRole' ";
                    $user_res = $db->select($query);
                    if($user_res)
                    {
                    $user_val = $user_res->fetch_assoc();
                ?>
                        <img src="img/user/<?php echo $user_val["image"]; ?>" alt="Profile Pic" style="width: 32px;margin-top: -5px;" />
                   <?php } ?>
               </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li><?php echo Session::sess_get("name"); ?></li>
                    <?php 
                        if(isset($_GET['action']) && $_GET['action'] == "logout")
                        {
                            Session::sess_destroy();
                        }
                    ?>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                        
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-dashboard"><a href="theme.php"><span>Theme</span></a> </li>
                <li class="ic-form-style"><a href="userProfile.php"><span>User Profile</span></a></li>
                <li class="ic-form-style"><a href="addUser.php"><span>Add User</span></a></li>
                <li class="ic-form-style"><a href="userList.php"><span>User List</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox
                <?php
                $query = "SELECT * FROM tbl_contuct WHERE status='0'";
                $result = $db->select($query); //Query Perform
                if($result) {
                    $count = $result->num_rows;
                    echo "(".$count.")";
                }
                else{
                    echo "(0)";
                }


                ?>
                </span></a></li>
                <li class="ic-charts"><a href="../index.php" target="_blank"><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>