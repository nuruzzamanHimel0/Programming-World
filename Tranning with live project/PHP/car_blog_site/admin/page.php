<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Pages</h2>
                <div class="block copyblock">
                    <style>
                        .dltPage {
                            background: #F0F0F0;
                            border: 1px solid #ddd;
                            padding: 5px 11px;
                            font-size: 17px;
                            font-weight: normal;
                            color: #444;
                        }
                    </style>
        <?php
            if(!isset($_GET['pagId']) || empty($_GET["pagId"]))
            {
                echo "<script>window.location='index.php'; </script>";

            }
            else{
                $id = $_GET['pagId'];
            }

        ?>
        <?php
        $errname = " ";
        $errbdy = " ";
        $errmt = " ";
        $errmt = " ";
        $errmd = " ";
        $ermsg = " ";
        $sucmsg = " ";
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"]))
            {
                $errname = " ";
                $errbdy = " ";
                $errmt = " ";
                $errmt = " ";
                $errmd = " ";
                $ermsg = " ";
                $sucmsg = " ";

                $name = $_POST["name"];
                $body = $_POST["body"];
                $mt = $_POST["mt"];
                $md = $_POST["md"];

                 $name = mysqli_real_escape_string($db->conn,$name);
                 $body = mysqli_real_escape_string($db->conn,$body);
                 $mt = mysqli_real_escape_string($db->conn,$mt);
                 $md = mysqli_real_escape_string($db->conn,$md);
                if(empty($name))
                {
                    $errname = "<span style=\"font-size:12px;color:red;\">Name Field Can't be Empty !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</span>";

                }
               else if(empty($body))
                {
                    $errbdy = "<span style=\"font-size:12px;color:red;\">Body Field Can't be Empty !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</span>";

                }
                else if(empty($mt))
                {
                    $errmt = "<span style=\"font-size:12px;color:red;\">Meta Tag Field Can't be Empty !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</span>";

                }
                else if(empty($md))
                {
                    $errmd = "<span style=\"font-size:12px;color:red;\">Meta Description Field Can't be Empty !!</p>";$succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Update Successfully.</span>";

                }
               else if (isset($name) && isset($body) && isset($mt) && isset($md) && !empty($name) && !empty($body) && !empty($mt) && !empty($md) ){
                    $query = "UPDATE tbl_pages SET name='$name',body='$body',meta_tag='$mt',meta_des='$md' WHERE id ='$id'  ";
                    $page_res_udt = $db->insert($query);
                    if($page_res_udt)
                    {
                        $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Page Update Successfully </p>";


                    }
                    else{
                        $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Page Update !!</p>";
                    }
                }



            }
        ?>
        <?php
//            if(isset($ermsg) && !empty($ermsg)) {echo $ermsg;$ermsg = " ";}
//
//            if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg; $sucmsg=" ";}

        ?>
        <?php
        $query = "SELECT * FROM  tbl_pages WHERE id = $id ";
        $pag_res = $db->select($query);
        if($pag_res)
        {
            if( $pag_res->num_rows > 0)
            {
                $fet_res = $pag_res->fetch_assoc();
        ?>
                    <form action="" method="post">
                        <table class="form" border="30">
                            <tr>
                                <td width="50%">
                                    <label>name</label>
                                </td>
                                <td width="50%">
                                    <input type="text" name="name" value="<?php echo $fet_res['name']; ?>" class="medium" />
                                    <span style="color: red;">
                                        *<?php if(isset($errname)){echo $errname;} ?>

                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;" width="50%">
                                    <label>Body</label>
                                </td>
                                <td width="50%">
                                    <textarea class="tinymce" name="body" >
                                        <?php echo $fet_res['body']; ?>
                                    </textarea>
                                    <span style="color: red;">
                                        *<?php if(isset($errbdy)){echo $errbdy;} ?>
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td width="50%">
                                    <label>Meta Tags</label>
                                </td>
                                <td width="50%">
                                    <input type="text" name="mt" value="<?php echo $fet_res['meta_tag']; ?>" class="medium" />
                                    <span style="color: red;">
                                        *<?php if(isset($errmt)){echo $errmt;} ?>
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td width="50%">
                                    <label>Meta Description</label>
                                </td>
                                <td width="50%">
                                <textarea  name="md" rows="18" cols="85">
                                    <?php echo $fet_res['meta_des']; ?>
                                </textarea>
                                    <span style="color: red;">
                                        *<?php if(isset($errmd)){echo $errmd;} ?>
                                    </span> 
                                </td>

                            </tr>
                            <tr>
                                <td width="50%"></td>
                                <td width="50%">
                                    <input type="submit" name="update" Value="Update" />
                                    <span class="dltPage">
                                          <a href="deletePage.php?dltId=<?php echo $fet_res['id'];?>" onclick="return confirm('Are You Sure Want To Delete ??');" >
                                        Delete
                                    </a>
                                    </span>


                                </td>
                                
                            </tr>
                        </table>
                    </form>
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
