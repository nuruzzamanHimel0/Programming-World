<?php include("inc/header.php") ?>

<?php 
    if(!isset($_GET['postId']) || empty($_GET['postId']))
    {
        echo "<script>window.location='index.php';  </script>";
    }
    else{
        $id = base64_decode($_GET['postId']);
    }
?>
                    
                    <div id="templatemo_content">
                        <div id="templatemo_content_left">
                            
                            <div class="templatemo_post">
                            <?php 
                                $query = "SELECT * FROM tbl_post WHERE id ='$id'";
                                $show_res = $db->select($query);
                                if($show_res)
                                {
                                    $row = $show_res->fetch_assoc()
                                    
                            ?>
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
                                       <?php echo $row["body"];  ?>   
                                        
                                    </p>
                                    
                                </div>
                            <?php  }else{
                                echo "<script>window.location='404.php' </script>";
                            } ?>   
                            </div>
                            <div class="relatedPost">
                                <div class="relatedPosttemp">
                            <?php 
                                $catId = $row["catId"];
                                $query = "SELECT * FROM tbl_post WHERE catId='$catId ' ORDER BY rand() LIMIT 6  ";
                                // echo $query;
                                // exit();
                                $reslt_cat = $db->select($query);
                            ?>

                                    <h2>Related Post</h2>
                            <?php
                                if($reslt_cat->num_rows >1)
                                {
                                    while($result = $reslt_cat->fetch_assoc())
                                    {
                            ?>
                                    <a href="post.php?postId=<?php echo base64_encode($result["id"]);  ?>">
                                        <img src="images/posts/<?php echo $result['image']; ?>">
                                    </a>
                            <?php } }else{
                                echo "<span ><p id='red' style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>No Related Post Available !! </p></span>";
                            } ?>
                                </div>
                                
                            </div>
                            </div> <!-- end of content left -->
                            
                            <div id="templatemo_content_right">
                                 <?php include("inc/sidebar.php"); ?>
                                
                                </div> <!-- end of right content -->
                                </div> <!-- end of content -->
                                </div> <!-- end of content container -->
                                         <?php include("inc/bottom.php"); ?>
    
            <?php include("inc/footer.php"); ?>