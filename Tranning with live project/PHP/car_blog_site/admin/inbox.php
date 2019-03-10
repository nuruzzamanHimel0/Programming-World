<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

                <?php
                $errmsg = "";
                $succmsg = "";
                if(isset($_GET['seenId']))
                {
                    $id = base64_decode($_GET['seenId']);
                    $query = "UPDATE tbl_contuct SET status='1' WHERE id ='$id' ";
                    $seen_res = $db->update($query);
                    if($seen_res)
                    {
                        $succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Message Seen From Seen Box.</p>";

                    }
                    else{
                        $errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail to Message Seen !!</p>";

                    }
                }
                ?>
                <?php
                if(!empty($errmsg)) {echo $errmsg; $errmsg= null;} else if(empty($errmsg)){ echo $errmsg;}

                if(!empty($succmsg)) {echo $succmsg;$succmsg= null;}else if(empty($succmsg)){ echo $succmsg;}
                ?>
                <div class="block">


                <?php
                    $query = "SELECT * FROM tbl_contuct WHERE status='0' ORDER BY id DESC";
                    $Conresult = $db->select($query); //Query Perform
                    if($Conresult)
                    {
                    $i = 0;

                ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">Serial No.</th>
							<th width="10%">Name</th>
							<th width="10%">Email</th>
                            <th width="35%">Body</th>
                            <th width="20%">Date</th>
                            <th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        while($value = $Conresult->fetch_assoc()) // user return data
                        {
                            $i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['firstname']." ".$value['lastname']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $fm->textShort($value['body'],100); ?></td>
                            <td><?php echo $fm->formateDate($value['date']); ?></td>
							<td><a href="viewMass.php?viewId=<?php echo $value['id'];?>">View</a>
                                ||
                                <a href="replyMess.php?replyId=<?php echo $value['id'];?>">Reply</a>
                                ||
                                <a href="?seenId=<?php echo base64_encode($value['id']);?>" onclick="return confirm('Are You Sure To Seen This Message ??')">Seen</a>
                            </td>
						</tr>
                    <?php } ?>
					</tbody>
				</table>
            <?php  }else{
                        echo "<p style=\"font-size:20px;color:red;text-align: center;\">Message Not Available !!</p>";
                    }

            ?>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Seen</h2>
                <?php
                $un_succmsg = "";
                $un_errmsg = "";
                $un_succmsg_dlt = "";
                $un_errmsg_dlt = "";
                if(isset($_GET['unseenId']))
                {
                $id = $_GET['unseenId'];
                $query = "UPDATE tbl_contuct SET status='0' WHERE id ='$id' ";
                $unseen_res = $db->update($query);
                if($unseen_res)
                {
                $un_succmsg = "<p style=\"font-size:20px;color:green;text-align: center;\"> Message UnSeen From UnSeen Box.</p>";

                }
                else{
                $un_errmsg = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail to Message UnSeen !!</p>";

                }
                }
                ?>
                <?php
                if(isset($_GET['dltId']))
                {
                    $id = $_GET['dltId'];
                    $query = "DELETE FROM  tbl_contuct WHERE id = '$id' ";
                    $unseen_res_dlt = $db->delete($query);
                    if($unseen_res_dlt)
                    {
                        $un_succmsg_dlt = "<p style=\"font-size:20px;color:green;text-align: center;\"> Seen Message Delete Successfully.</p>";

                    }
                    else{
                        $un_errmsg_dlt = "<p style=\"font-size:20px;color:red;text-align: center;\">Sorry, Fail to Message Delete !!</p>";

                    }
                }

                ?>
                <?php
                if(!empty($un_errmsg)) {echo $un_errmsg; $un_errmsg= null;} else if(empty($un_errmsg)){ echo $un_errmsg;}

                if(!empty($un_succmsg)) {echo $un_succmsg;$un_succmsg= null;}else if(empty($un_succmsg)){ echo $un_succmsg;}

                if(!empty($un_errmsg_dlt)) {echo $un_errmsg_dlt; $un_errmsg_dlt= null;} else if(empty($un_errmsg_dlt)){ echo $un_errmsg_dlt;}

                if(!empty($un_succmsg_dlt)) {echo $un_succmsg_dlt;$un_succmsg_dlt= null;}else if(empty($un_succmsg_dlt)){ echo $un_succmsg_dlt;}
                ?>
                <div class="block">
                    <?php
                    $query = "SELECT * FROM tbl_contuct WHERE status='1' ORDER BY id DESC";
                    $Conresult = $db->select($query); //Query Perform
                    if($Conresult)
                    {
                    $i = 0;

                    ?>
                    <table class="data display datatable" id="example">
                        <thead>
                        <tr>
                            <th width="5%">Serial No.</th>
                            <th width="10%">Name</th>
                            <th width="10%">Email</th>
                            <th width="35%">Body</th>
                            <th width="20%">Date</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($value = $Conresult->fetch_assoc()) // user return data
                        {
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['firstname']." ".$value['lastname']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $fm->textShort($value['body'],100); ?></td>
                            <td><?php echo $fm->formateDate($value['date']); ?></td>

                            <td>
                                <a href="viewMass.php?viewId=<?php echo $value['id'];?>">View</a>
                                ||
                                <a href="?unseenId=<?php echo $value['id'];?>" onclick="return confirm('Are u sure to unseen message ?');" >Unseen</a>
                                ||
                                <a href="?dltId=<?php echo $value['id'];?>" onclick="return confirm('Are You Sure To Delete This Message ??')">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php  }else{
                        echo "<p style=\"font-size:20px;color:red;text-align: center;\">There have not any seen message !!</p>";
                    }

                    ?>
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
