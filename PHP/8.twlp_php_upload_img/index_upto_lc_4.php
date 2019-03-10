<?php 
	include_once("inc/header.php");
	include_once("lib/db.php");

  
	$db_conn = db::connection();
?>
			<div class="mainSection">
				<div class="myForm">
			<?php 
				if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['upload']))
				{
					$parmited = array('jpg','jpeg','png','gif');
					$tmpname = $_FILES['image']['tmp_name'];					
					$filename = $_FILES['image']['name'];
					$filesize = $_FILES['image']['size'];

					$div = explode(".", $filename);
					$file_ext = strtolower(end($div));
				    $upload_file = substr(md5(time()), 0,10).".".$file_ext;

					move_uploaded_file($tmpname,"uploads/".$upload_file);
					$messg = db::insertImage('tbl_image',$upload_file);
				}
				if(isset($messg))
				{
					echo $messg;
				}
			?>

					<form action="" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td>Select Images:</td>
								<td><input type="file" name="image"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="upload" value="Upload"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
<?php 
	include_once("inc/footer.php");
?>