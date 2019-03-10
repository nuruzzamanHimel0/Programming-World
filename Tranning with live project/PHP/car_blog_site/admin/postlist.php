<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
                        <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th width="15%">Post Title</th>
                            <th width="20%">Description</th>
                            <th width="6%">Category</th>
                            <th width="10%">Image</th>
                            <th width="5%">Author</th>
                            <th width="6%">Tag</th>
                            <th width="6%">Des</th>
                            <th width="10%">Date</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
					<tbody>
                    <?php
                    $query = "SELECT tbl_post.*,tbl_catagory.name FROM tbl_post INNER JOIN tbl_catagory ON tbl_post.catId = tbl_catagory.id ORDER BY tbl_post.title   ";
                    $result = $db->select($query);
                    if($result)
                    {	$i = 0;
                    while($value = $result->fetch_assoc())
                    {
                    $i++;
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td>I<?php echo $value['title']; ?></td>
							<td><?php echo $fm->textShort($value['body'],80); ?></td>
							<td class="center"> <?php echo $value['name']; ?></td>
                            <td class="center">
                                <img src="../images/posts/<?php echo $value['image']; ?>" width="50px" height="50px">
                            </td>
                            <td class="center"> <?php echo ucfirst($value['author']); ?></td>

                            <td class="center"> <?php echo $value['tag']; ?></td>

                            <td class="center"> <?php echo $fm->textShort($value['des'],30); ?></td>

                            <td class="center"> <?php echo $fm->formateDate($value['date']); ?></td>
							<td>
                                <a href="viewPost.php?viwId=<?php echo base64_encode($value['id']); ?>">View</a>
                                ||
                                <a href="editPost.php?edtId=<?php echo base64_encode($value['id']); ?>">Edit</a>
                                ||
                                <a href="deletePost.php?dltId=<?php echo base64_encode($value['id']); ?>" onclick="return confirm('Are you sure??');">Delete</a>
                            </td>

						</tr>
                    <?php } } ?>

					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
     <?php include("inc/footer.php") ?>
<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>
