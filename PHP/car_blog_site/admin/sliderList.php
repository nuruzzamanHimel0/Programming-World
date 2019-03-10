<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  

                <?php
                    $query = "SELECT * FROM tbl_slider ORDER BY id ASC";
                    $slider_res = $db->select($query);
                    if($slider_res) {
                        $i = 0;
                ?>
                 <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="20%">No</th>
							<th width="40%">Title</th>
							<th width="20%">Image</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                        while($row = $slider_res->fetch_assoc())
                        {
                            $i++;
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td>
                                <img src="../images/slideshow/<?php echo $row['image']; ?>" alt="" width="60px" height="60px">
                            </td>
							<td>
                                <a href="editSlider.php?edtId=<?php echo base64_encode($row['id']); ?>">Edit</a>
                                ||
                                <a href="deleteSlider.php?dltId=<?php echo base64_encode($row['id']); ?>" onclick="return confirm('Are you sure ??');">Delete</a>
                            </td>
						</tr>
                    <?php } ?>
					</tbody>
				</table>
	            <?php } else{
                                echo "<span ><p style=\"font-size:12px;color:red;\">Slider Not Available !!! </p> </span>";

                            } ?>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
     <?php include("inc/footer.php"); ?>
<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>
