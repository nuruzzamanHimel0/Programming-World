<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php
if(!isset($_GET['viwId']) || empty($_GET["viwId"]))
{
    echo "<script>window.location='postlist.php'; </script>";

}
else{
    $id = base64_decode($_GET['viwId']);
}

?>
        <div class="grid_10">
            <?php
            if(isset($_POST['back']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {

                echo "<script>window.location='postlist.php'; </script>";

            }
            ?>
            <div class="box round first grid">
                <h2>Update Post</h2>

                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                     <?php
                     $query = "SELECT * FROM tbl_post WHERE id ='$id' ";
                     $pst_res = $db->select($query);
                     if($pst_res)
                     {
                     while($pst_row = $pst_res->fetch_assoc())
                     {
                     ?>
                    <table class="form">

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="catId">
                                    <?php
                                    $query = "SELECT * FROM tbl_catagory ";
                                    $cat_res = $db->select($query);
                                    if($cat_res)
                                    {
                                        while($row = $cat_res->fetch_assoc())
                                        {

                                        if($pst_row['catId'] == $row['id'])
                                        {

                                    ?>
                                    <option value="#" >
                                        <?php echo $row['name']; ?>
                                    </option>
                                    <?php  } }}else{
                                    ?>
                                        <option value="#">Category One</option>
                                        <option value="#">Category Two</option>
                                        <option value="#">Category Three</option>
                                    <?php
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title"  class="medium" value="<?php echo $pst_row['title']; ?>" readonly />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body" readonly aria-readonly="true">
                                    value="<?php echo $pst_row['body']; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="../images/posts/<?php echo $pst_row['image']; ?>" width="100px" height="100px"><br>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" class="medium" value="<?php echo $pst_row['author']; ?>" readonly />

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tag" class="medium" value="<?php echo $pst_row['tag']; ?>" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mata_Des</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="des" >
                                    value="<?php echo $pst_row['des']; ?>"
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
                     <?php }}else{
                          echo "<span ><p style=\"font-size:12px;color:red;\">Post Not Available !!! </p> </span>";
                     }
                      ?>
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
