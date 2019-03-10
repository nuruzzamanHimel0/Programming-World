<?php include("inc/header.php") ?>
<?php include("inc/slider.php") ?>

       
        
        <div id="templatemo_content">
            <div id="templatemo_content_left">
                <!-- pegination start part-1 ...... -->
            <?php
            $per_page = 3;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $start_from = ($page - 1)*$per_page;

            ?>
                <!-- pegination End part-1 ...... -->
			<?php 
                $query = "SELECT * FROM tbl_post LIMIT $start_from, $per_page";
                $all_pst_res = $db->select($query);
                if($all_pst_res)
                {
                    while($result = $all_pst_res->fetch_assoc())
                    {

            ?>
                <div class="templatemo_post">
                    <div class="post_title">
                    	<?php echo $result["title"];  ?>
                    	  <div class="post_info">
                    		Posted by <a href="#" target="_parent">
                            <?php echo $result["author"];  ?>      
                            </a>, <?php echo $fm->formateDate($result["date"]);  ?>   
	                    </div>
                    </div>
                    
                    <div class="post_body">
                        <img src="images/posts/<?php echo $result["image"];  ?>   " alt="Web Template" />
                        <p>
                            <?php echo $fm->textShort($result["body"],400);  ?>   
                        </p>
                        <div class="readmore">
                            <a href="post.php?postId=<?php echo base64_encode($result["id"]);  ?>">Read More</a>
                        </div>

                    </div> 

                    </div>
                <?php } ?>
<!--                    While loop end...............-->
                    <!-- pegination start part-2...... -->

                <?php
                $query = "SELECT * FROM tbl_post  ";
                $result = $db->select($query);
                $total_row = mysqli_num_rows($result);
                $total_page = ceil($total_row/$per_page);
                ?>
                <?php
                    echo "<span class='pegination'><a href='index.php?page=1'>First Page</a>";
                ?>
                <?php
                     for ($i=1; $i <= $total_page; $i++)
                     {
                ?>
                    <a   href="index.php?page=<?php echo $i; ?>"    >
                        <?php echo $i; ?>
                    </a>

                <?php
                    }
                ?>
                <?php
                    echo "<a href='index.php?page=".$total_page."'>Last Page</a> </span>";
                ?>
                    <!-- pegination End part-2...... -->
                <?php }else{
                ?>
                    <script type="text/javascript">
                        window.location='404.php';
                    </script>
                <?php
                } ?>
                    
                   
                

                
            </div> <!-- end of content left -->
        
            <div id="templatemo_content_right">
            <?php include("inc/sidebar.php") ?>
                
                
            </div> <!-- end of right content -->
        </div> <!-- end of content -->
    </div> <!-- end of content container -->

    
        
            <?php include("inc/bottom.php") ?>
    
            <?php include("inc/footer.php") ?>
<