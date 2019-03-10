<div class="templatemo_right_section">
                	<h2>Categories</h2>
					<ul>
                    <?php 
                        $query = "SELECT * FROM tbl_catagory ORDER BY id DESC";
                        $cat_res = $db->select($query);
                        
                        if($cat_res)
                        { //while($result = mysqli_fetch_assoc($cat_res)
                        while($row = $cat_res->fetch_assoc() )
                        {
                    ?>
                        <li><a href="posts.php?cat_id=<?php echo base64_encode($row["id"]); ?>"><?php echo $fm->validation($row["name"]); ?></a></li>
                    <?php } }else{?>

                            <p style='color:red; font-size:18px;text-align:center;
                    padding:10px;font-weight: bold;'>There Have no any Catagory </p>

                        <?php } ?>
                    </ul>    
                </div>

                 <div class="templatemo_right_section">
	                <h2>Popular Posts</h2>
                <?php 
                    $query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 5 ";
                      $pst_reslt = $db->select($query);
                    if($pst_reslt)
                    {
                        while($result = $pst_reslt->fetch_assoc())
                        {

                ?>
                	<div class="popular">
                        <a href="#">
                            <h3><?php echo $result["title"];  ?></h3>
                        </a>   
                        <a href="post.php?postId=<?php echo base64_encode($result["id"]);  ?>">
                            <img src="images/posts/<?php echo $result["image"];  ?>  " alt="images">
                        </a>
                        <p>
                             <?php echo $fm->textShort($result["body"],100);  ?>
                        </p>
                    </div>
                 <?php } }else{
                ?>
                    <h2 style="font-size: 20px; font-weight: bold; text-decoration: underline;color:#fff; background: red;"> There have No ANY Popular Post</h2 >
                <?php
                } ?>
                    
                </div>
                
