<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

        <div class="grid_10">
            <?php
            if(isset($_POST['set']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $succmsg = "";$errmsg = "";
                $theme = $fm->validation($_POST['theme']);
                $theme = mysqli_real_escape_string($db->conn,$theme);

                if($theme){
                    $query = "UPDATE tbl_theme SET theme = '$theme' WHERE id = '1' ";
                    $updttheme = $db->update($query);
                    if($updttheme)
                    {
                        $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Theme Set Successfully</p>";

                    }
                    else{
                        $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail to Theme Set !!</p>";

                    }
                }

            }
            ?>
            <div class="box round first grid">
                <h2>Add Theme</h2>
                <?php
                if(isset($errmsg)) {echo $errmsg;}
                if(isset($succmsg)) {echo $succmsg;}
                ?>

                <div class="block copyblock">


                        <form action="" method="post" >
                            <table class="form">
                                <?php
                                $query = "SELECT * FROM tbl_theme WHERE id = '1' ";
                                $result = $db->select($query);

                                if($result)
                                {
                                while ($value = mysqli_fetch_assoc($result))
                                {
                                ?>
                                <tr>
                                    <td> </td>
                                    <td>

                                        <input type="radio" name="theme" value="default" <?php if($value['theme'] == "default"){echo 'checked' ;} ?> > Default <br>
                                        <input type="radio" name="theme" value="blue"  <?php if($value['theme'] == "blue"){echo 'checked' ;} ?>> Blue &nbsp;<br>
                                        <input type="radio" name="theme" value="red"  <?php if($value['theme'] == "red"){echo 'checked' ;} ?>> Red &nbsp;<br>

                                    </td>
                                </tr>
                                <?php } } ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="set" Value="SET" />

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
