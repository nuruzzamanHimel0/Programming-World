<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

</style>
    <?php
        if(!isset($_GET['viewId']) || empty($_GET["viewId"]))
        {
            echo "<script>window.location='index.php'; </script>";
        }
        else{
            $id = $_GET['viewId'];
        }
    ?>
        <div class="grid_10">
            <?php
            if(isset($_POST['back']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                echo "<script>window.location='inbox.php'; </script>";
            }
            ?>
            <div class="box round first grid">
                <h2>Add New Post</h2>


                <div class="block">
                    <?php
                    $query = "SELECT * FROM  tbl_contuct WHERE id='$id' ";
                    $cont_res = $db->select($query);
                    if($cont_res)
                    {
                    while($row = $cont_res->fetch_assoc())
                    {
                    ?>
                    <div class="">
                        <form action="" method="post">
                            <table class="form">


                                <tr>
                                    <td>
                                        <label>Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo $row['firstname']." ".$row['lastname']; ?>"  class="medium" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Email</label>
                                    </td>
                                    <td>
                                        <input type="text" name="email" class="medium" value="<?php echo $row['email']; ?>" readonly />
                                    </td>
                                </tr>



                                <tr>
                                    <td>
                                        <label>Description</label>
                                    </td>
                                    <td>
                                        <textarea class="tinymce" name="body" >
                                            <?php echo $row['body']; ?>
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
