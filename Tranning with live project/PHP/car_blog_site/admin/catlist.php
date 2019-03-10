<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
<?php
    if(isset($_GET['dltId']))
    {
        $dltId = base64_decode($_GET['dltId']);
        $query = "DELETE FROM tbl_catagory WHERE id=".$dltId  ;
        $result = $db->delete($query);
        if($result)
        {
            $sucmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Catagory Deleted Successfully </p>";
        }
        else{
            $ermsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail To Catagory Delete !!</p>";
        }
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                if(isset($ermsg) && !empty($ermsg)) {echo $ermsg;$ermsg = " ";}

                if(isset($sucmsg) && !empty($sucmsg)) {echo $sucmsg; $sucmsg=" ";}

                ?>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
            <?php
                $query = "SELECT * FROM tbl_catagory ORDER BY id ASC";
                $all_cat_res = $db->select($query);
                if($all_cat_res) {
                        $i = 0;
                        while($row = $all_cat_res->fetch_assoc())
                        {
                            $i++;
            ?>
						<tr class="odd gradeX">
							<td><?php echo $i;  ?></td>
							<td><?php echo $row['name']; ?></td>
							<td>
                                <a href="editCat.php?edtId=<?php echo $row['id']; ?>">Edit</a>
                                ||
                                <a href="?dltId=<?php echo base64_encode($row['id']); ?> " onclick="return confirm('Are you sure???')">Delete</a>
                            </td>
						</tr>
            <?php }}else {
                echo "<span ><p style=\"font-size:12px;color:red;\">Category Not Available !!! </p> </span>";
            }
                ?>

					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
       <?php include("inc/footer.php"); ?>
<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>
