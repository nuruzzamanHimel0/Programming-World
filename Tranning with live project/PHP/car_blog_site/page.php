<?php include("inc/header.php") ?>

<?php 
    if(!isset($_GET['pgId']) || empty($_GET['pgId']))
    {
        echo "<script>window.location='index.php';  </script>";
    }
    else{
        $id = base64_decode($_GET['pgId']);
    }
?>
                    
                    <div id="templatemo_content">
                        <div id="templatemo_content_left">
                            
                            <div class="templatemo_post">
                            <?php 
                                $query = "SELECT * FROM tbl_pages WHERE id ='$id'";
                                $page_res = $db->select($query);
                                if($page_res)
                                {
                                    $row = $page_res->fetch_assoc()
                                    
                            ?>
                     <div class="post_title">
                        <?php echo $row["name"];  ?>

                    </div>
                                
                                <div class="post_body">
                                    <p>
                                       <?php echo $row["body"];  ?>   
                                        
                                    </p>
                                    
                                </div>
                            <?php  }else{
                                echo "<script>window.location='404.php' </script>";
                            } ?>   
                            </div>

                            </div> <!-- end of content left -->
                            
                            <div id="templatemo_content_right">
                                 <?php include("inc/sidebar.php"); ?>
                                
                                </div> <!-- end of right content -->
                                </div> <!-- end of content -->
                                </div> <!-- end of content container -->
                                         <?php include("inc/bottom.php"); ?>
    
            <?php include("inc/footer.php"); ?>