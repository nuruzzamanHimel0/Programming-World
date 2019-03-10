<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
        <div class="grid_10">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $userId = mysqli_real_escape_string($db->conn,$_POST['userId']);
                $catId = mysqli_real_escape_string($db->conn,$_POST['catId']);
                $title = mysqli_real_escape_string($db->conn,$_POST['title']);
                $body = mysqli_real_escape_string($db->conn,$_POST['body']);
                $author = mysqli_real_escape_string($db->conn,$_POST['author']);
                $tag = mysqli_real_escape_string($db->conn,$_POST['tag']);
                $des = mysqli_real_escape_string($db->conn,$_POST['des']);

                $permited = array('jpg');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if(empty($catId ) || empty($title ) || empty($body ) || empty($author ) || empty($tag ) || empty($filename ) || empty($des ) )
                {
                    $err= "<p style=\"font-size:20px;color:red;text-align: center;\"> Field Can't be Empty !!</p>";
                }
                elseif($filesize>3145728)
                {
                    $errsize = "<p style=\"font-size:20px;color:red;text-align: center;\">Slider Image SIze Is Grater then 3MB!!</p>";

                }
                elseif(in_array($extension , $permited) === FALSE)
                {
                    $errup = "<p style=\"font-size:20px;color:red;text-align: center;\">You can only upload JPG Slider Image!!!</p>";
                }
                else
                {
                    // upload image in server
                    move_uploaded_file($tmp_name,"../images/posts/".$uploade_image);

                    $query = "INSERT INTO tbl_post(userId,catId,title,body,image,author,tag,des) VALUES('$userId','$catId','$title','$body','$uploade_image','$author','$tag','$des')";
                    $result = $db->insert($query);
                    if($result)
                    {
                        $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Post Added Successfully </p>";
                    }else
                    {
                        $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Added Post !!</p>";
                    }
                }
            }
            ?>
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php
                if(isset($err) && !empty($err)) {echo $err;$err = " ";}

                if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg; $sucmsg=" ";}

                if(isset($errup)){echo $errup;}

                if(isset($errsize)){echo $errsize;}
                if(isset($ermsg)){echo $ermsg;}
                ?>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
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
                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row['name']."(".$row['id'].")"; ?>
                                    </option>
                                    <?php }}else{
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
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" class="medium" value="<?php echo $userName; ?>" readonly />
                                <input type="hidden" name="userId" class="medium" value="<?php echo $userId; ?>"  />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tag" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mata_Des</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="des" id="" >

                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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
