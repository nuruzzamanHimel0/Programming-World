<?php include("inc/header.php") ?>

<?php 
    if(!isset($_GET['Search']) || empty($_GET['Search']))
    {
        echo "<script>window.location='index.php';  </script>";
    }
    else{
        $search = $_GET['input'];
        $query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' ";
        // echo $query;
        // exit();
        $srch_all_reslt = $db->select($query);
    }
?>
                    
                    <div id="templatemo_content">
                        <div id="templatemo_content_left">
                        <?php 
                                
                                if($srch_all_reslt)
                                {
                                    while($row = $srch_all_reslt->fetch_assoc())
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