<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php
if(!isset($_GET['edtId']) || empty($_GET["edtId"]))
{
    echo "<script>window.location='postlist.php'; </script>";

}
else{
    $id = base64_decode($_GET['edtId']);
}

?>
        <div class="grid_10">
            <?php
            if(isset($_POST['update']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $pstId = mysqli_real_escape_string($db->conn,$_POST['pstId']);
                $userId = mysqli_real_escape_string($db->conn,$_POST['userId']);
                $catId = mysqli_real_escape_string($db->conn,$_POST['catId']);
                $title = mysqli_real_escape_string($db->conn,$_POST['title']);
                $body = mysqli_real_escape_string($db->conn,$_POST['body']);
                $author = mysqli_real_escape_string($db->conn,$_POST['author']);
                $tag = mysqli_real_escape_string($db->conn,$_POST['tag']);
                $des = mysqli_real_escape_string($db->conn,$_POST['des']);

                $permited = array('jpg','jpeg');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if(empty($catId ) || empty($title ) || empty($body ) || empty($author ) || empty($tag ) ||  empty($des ) )
                {
                    $err= "<p style=\"font-size:20px;color:red;text-align: center;\"> Field Can't be Empty !!</p>";
                }
                else{
                    if(!empty($filename)){
                        if($filesize>3145728)
                        {
                            $errsize = "<p style=\"font-size:20px;color:red;text-align: center;\">Slider Image SIze Is Grater then 3MB!!</p>";

                        }
                        elseif(in_array($extension , $permited) === FALSE)
                        {
                            $errup = "<p style=\"font-size:20px;color:red;text-align: center;\">You can only upload JPG Slider Image!!!</p>";
                        }
                        else
                        {
                            $query = "SELECT * FROM tbl_post WHERE id = '$pstId'";
                            $reslt = $db->select($query);
                            $row = $reslt->fetch_assoc();
                            unlink("../images/posts/".$row['image']);
                            // upload image in server
                            move_uploaded_file($tmp_name,"../images/posts/".$uploade_image);


                            $query = "UPDATE tbl_post SET userId='$userId',catId='$catId',title='$title',body='$body',image='$uploade_image',author='$author',tag='$tag',des='$des' WHERE id ='$pstId' ";
                            $result = $db->update($query);
                            if($result)
                            {
                                $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Post Update Successfully </p>";
                            }else
                            {
                                $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Update Post !!</p>";
                            }
                        }
                    }else{
                        $query = "UPDATE tbl_post SET userId='$userId',catId='$catId',title='$title',body='$body',author='$author',tag='$tag',des='$des' WHERE id ='$pstId'  ";
                        $result = $db->update($query);
                        if($result)
                        {
                            $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Post Update Successfully </p>";
                        }else
                        {
                            $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Update Post !!</p>";
                        }
                    }
                }


            }
            ?>
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?php
                if(isset($err) && !empty($err)) {echo $err;$err = " ";}

                if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg; $sucmsg=" ";}

                if(isset($errup)){echo $errup;}

                if(isset($errsize)){echo $errsize;}
                if(isset($ermsg)){echo $ermsg;}
                ?>
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


                                    ?>
                                    <option value="<?php echo $row['id']; ?>" <?php
                                    if($pst_row['catId'] == $row['id'])
                                    {
                                        echo "selected";
                                    }
                                     ?> >
                                        <?php echo $row['name']; ?>
                                    </option>
                                    <?php  }}else{
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
                                <input type="text" name="title"  class="medium" value="<?php echo $pst_row['title']; ?>" />
                                <input type="hidden" name="pstId"  class="medium" value="<?php echo $pst_row['id']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
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
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" class="medium" value="<?php echo $pst_row['author']; ?>" readonly />
                                <input type="hidden" name="userId" class="medium" value="<?php echo $pst_row['userId']; ?>"  />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tag" class="medium" value="<?php echo $pst_row['tag']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mata_Des</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="des" id="" cols="80" rows="20">
                                    value="<?php echo $pst_row['des']; ?>"
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="update" Value="Update" />
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
