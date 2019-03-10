<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST" )
            {
                $cp = $fm->validation($_POST["copyright"]);
                $cp = mysqli_real_escape_string($db->conn,$cp);

                if(isset($_POST["submit"]))
                {
                    $query = "INSERT INTO tbl_copy(id,copy) VALUES('1','$cp')";
                    $cp_res = $db->insert($query);
                    if($cp_res)
                    {
                        $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Copy right Submit Successfully.</p>";

                    }
                    else{
                        $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Copy right Fail To Submit !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</p>";

                    }
                }
                if(isset($_POST["update"]))
                {
                    $query = "UPDATE tbl_copy SET copy='$cp' WHERE id ='1'";
//                    echo $query;
//                    exit();
                    $udt_res = $db->update($query);
                    if($udt_res)
                    {
                        $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Copy right Update Successfully.</p>";

                    }
                    else{
                        $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Copy right Fail To Update !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</p>";

                    }
                }
            }
        ?>
        <?php
            if(isset($errmsg)) {echo $errmsg;}
            if(isset($succmsg)) {echo $succmsg;}
        ?>
        <?php
        $query = "SELECT * FROM  tbl_copy WHERE id = 1";
        $cpy_res = $db->select($query);
        if($cpy_res)
        {
            if( $cpy_res->num_rows > 0)
            {
                $fet_res = $cpy_res->fetch_assoc();
        ?>
                 <form  action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $fet_res['copy']; ?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="update" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } else{ ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" placeholder="Nuruzzaman Himel. Ltd" name="copyright" class="large" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Submit" />
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
           <?php include("inc/footer.php"); ?>