<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update']))
                {
                    $op = $fm->validation($_POST['op']);
                    $np = $fm->validation($_POST['np']);

                    $op = mysqli_real_escape_string($db->conn, $op);
                    $np = mysqli_real_escape_string($db->conn, $np);
//
////                    $op = md5($op);
////                    $np = md5($np);

                    if(empty($op) || empty($np))
                    {
                        $err_msg = "<span ><p style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Field Can't Empty!! </p></span>";
                    }
                    else{
                        $op = md5($op);
                         $np = md5($np);
                        $query = "SELECT * FROM  tbl_user WHERE id = '$userId' AND password ='$op' LIMIT 1";
                        $user_reslt = $db->select($query);
                        if($user_reslt == FALSE)
                        {
                            $err_msg = "<span ><p style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Old Password not Available!! </p></span>";
                        }
                        else
                            {
                                $query = "UPDATE tbl_user SET password = '$np' WHERE id = '$userId' ";
                                $udt_res = $db->update($query);
                                if($udt_res)
                                {
                                    $succ = "<span ><p style='color:green; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Password Update Successfully </p></span>";
                                }
                                else{
                                    $err = "<span ><p style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>Fail To Password Update </p></span>";
                                }
                            }
                    }
                }
            ?>
                    <?php if(isset($err_msg)){echo $err_msg;}  ?>
                    <?php if(isset($succ)){echo $succ;}  ?>
                    <?php if(isset($err)){echo $err;}  ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="op" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="np" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="update" Value="Update" />
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