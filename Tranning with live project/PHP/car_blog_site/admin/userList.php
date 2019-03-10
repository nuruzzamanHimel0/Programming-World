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
                            <th width="15%">Namee</th>
                            <th width="10%">Username</th>
                            <th width="6%">Gender</th>
                            <th width="9%">Email</th>
                            <th width="10%">Image</th>
                            <th width="20%">Description</th>
                            <th width="6%">Role</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
					<tbody>
                    <?php
                        $query = "SELECT * FROM  tbl_user ORDER BY id ASC ";
                        $user_res = $db->select($query);
                        $i = 0;
                        if($user_res)
                        {
                            while($row = $user_res->fetch_assoc())
                            { $i++;
                    ?>
						<tr class="odd gradeX">
							<td> <?php echo $i; ?> </td>
							<td> <?php echo $row['name']; ?> </td>
                            <td> <?php echo $row['username']; ?></td>
<!--                            gender................................-->
                            <?php
                                if($row['gender'] == 'm')
                                {
                                  echo "<td> Male</td>";
                                }else{
                                    echo "<td> Female</td>";
                                }
                            ?>
                            <td><?php echo $row['email']; ?></td>


<!--                            // imgae....................................-->
                            <?php
                            if(!empty($row['image']))
                            {
                                ?>
                                <td>
                                    <img src="img/user/<?php echo $row['image']; ?>" alt="User Logo" width="60px;">
                                </td>

                                <?php
                            }else if(empty($row['image']))
                            {
                                if($row['gender'] == 'm')
                                {
                                    ?>

                                    <td>
                                        <img src="img/demo_img/male.jpg" alt="User Logo" width="60px;">
                                    </td>
                                    <?php
                                }else if($row['gender'] == 'f')
                                {
                                    ?>

                                    <td>
                                        <img src="img/demo_img/female.jpg" alt="User Logo" width="60px;">
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                            <td><?php echo $row['description']; ?></td>

<!--                            role...........................-->
                            <?php
                                if($row['role'] == '0')
                                {
                                    echo "<td>Super Admin </td>";
                                }
                                else if($row['role'] == '1')
                                {
                                    echo "<td> Admin </td>";
                                }
                                else if($row['role'] == '2')
                                {
                                    echo "<td>Editor </td>";
                                }

                            ?>
							<td>
                                <a href="viewProfile.php?viwId=<?php echo base64_encode($row['id']); ?>">View</a>
                                ||
                                <a href="deleteProfile.php?dltId=<?php echo base64_encode($row['id']); ?>" onclick="return confirm('Are you sure??');">Delete</a>
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
