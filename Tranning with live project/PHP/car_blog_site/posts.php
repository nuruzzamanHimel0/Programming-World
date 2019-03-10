<?php include("inc/header.php") ?>

<?php 
    if(!isset($_GET['cat_id']) || empty($_GET['cat_id']))
    {
        echo "<script>window.location='index.php';  </script>";

    }
    else{
        $catId = base64_decode( $_GET['cat_id']);
    }
?>
                    
                    <div id="templatemo_content">
                        <div id="templatemo_content_left">
                            <?php 
                                $query = "SELECT * FROM tbl_post WHERE catId ='$catId' ORDER BY id DESC" ;
                                $show_posts_cat = $db->select($query);
                                if($show_posts_cat)
                                {
                                    while($row = $show_posts_cat->fetch_assoc() )
                                    {
                                    
                            ?>
                            <div class="templatemo_post">
                            
                                <div class="post_title">
                        <?php echo $row["title"];  ?>
                          <div class="post_info">
                            Posted by <a href="#" target="_parent">
                            <?php echo $row["author"];  ?>      
                            </a>, <?php echo $fm->formateDate($row["date"]);  ?>   
                        </div>
                    </div>
                                
                                <div class="post_body">
                                     <img src="images/posts/<?php echo $row["image"];  ?>   " alt="Web Template" />
                                    
                                    <p>
                                       <?php echo $fm->textShort($row["body"],400);  ?>   
                                        
                                    </p>
                                    <div class="readmore">
                                        <a href="post.php?postId=<?php echo base64_encode($row["id"]);  ?>">Read More
                                        </a>
                                    </div>
                                    
                                </div>
                             
                            </div>
                             <?php } }else{
                                echo "<script>window.location='404.php' </script>";
                            } ?> 
                            
                            </div> <!-- end of content left -->
                            
                            <div id="templatemo_content_right">
                                 <?php include("inc/sidebar.php"); ?>
                                
                            </div> <!-- end of right content -->
                                </div> <!-- end of content -->
                                </div> <!-- end of content container -->
                                         <?php include("inc/bottom.php"); ?>
    
            <?php include("inc/footer.php"); ?>