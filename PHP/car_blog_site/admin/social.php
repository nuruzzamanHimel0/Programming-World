<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" )
                {
                    $fb = $fm->validation($_POST["facebook"]);
                    $gp = $fm->validation($_POST["googleplus"]);
                    $li = $fm->validation($_POST["linkedin"]);

                    $fb = mysqli_real_escape_string($db->conn,$fb);
                    $gp = mysqli_real_escape_string($db->conn,$gp);
                    $li = mysqli_real_escape_string($db->conn,$li);
                if(isset($_POST["submit"]))
                {
                    $query = "INSERT INTO tbl_social(id,fb,gp,li) VALUES('1','$fb','$gp','li')";
                    $soc_res = $db->insert($query);
                    if($soc_res)
                    {
                        $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Social Link Submit Successfully.</p>";

                    }
                    else{
                        $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Social Link Fail To Submit !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</p>";

                    }
                }
                if(isset($_POST["update"]))
                {
                   $query = "UPDATE tbl_social SET fb='$fb',gp='$gp',li='$li' WHERE id ='1'";
                   $udt_res = $db->update($query);
                    if($udt_res)
                    {
                        $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Social Link Update Successfully.</p>";

                    }
                    else{
                        $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Social Link Fail To Update !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</p>";

                    }
                }



                }
            ?>

            <?php
            $query = "SELECT * FROM  tbl_social WHERE id = 1";
            $social_res = $db->select($query);
            if($social_res)
            {
                if( $social_res->num_rows > 0)
                {
                    $fet_res = $social_res->fetch_assoc();
            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Facebook</label>
                                </td>
                                <td>
                                    <input type="text" name="facebook" class="medium" value="<?php echo $fet_res['fb']; ?>"/>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Google Plus</label>
                                </td>
                                <td>
                                    <input type="text" name="googleplus" value="<?php echo $fet_res['gp']; ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>LinkedIn</label>
                                </td>
                                <td>
                                    <input type="text" name="linkedin" value="<?php echo $fet_res['li']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="update" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
           <?php
                }}

            else
                {
            ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                            </td>
                        </tr>

						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Submit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php  } ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
           <?php include("inc/footer.php") ?>