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
    <?php
        if(!isset($_GET['viwId']) || empty($_GET["viwId"]))
        {
            echo "<script>window.location='index.php'; </script>";
        }
        else{
            $id = base64_decode($_GET['viwId']);
        }
    ?>
        <div class="grid_10">
            <?php
            if(isset($_POST['back']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                echo "<script>window.location='userList.php'; </script>";
            }
            ?>
            <div class="box round first grid">
                <h2>Add New Post</h2>


                <div class="block">
                    <?php
                    $query = "SELECT * FROM  tbl_user WHERE id='$id' ";
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
                                        <input type="text" name="name" value="<?php echo $row['name']; ?>"  class="medium" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Username</label>
                                    </td>
                                    <td>
                                        <input type="text" name="username" class="medium" value="<?php echo $row['username']; ?>" readonly />
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
                                        <input type="text" name="email"  class="medium" value="<?php echo $row['email']; ?>" readonly/>
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
                                        <input type="submit" name="back" Value="Back" />

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
