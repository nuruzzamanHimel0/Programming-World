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
			if(empty($filename))
			{
			$messg = "<div class='error'> Image File can't empty....</div>";
			}
			elseif(in_array($file_ext, $parmited) === FALSE )
			{
			$messg = "<div class='error'>You can upload Only.".implode(",",$parmited)." File </div>";
			}
			elseif($filesize>3145728)
			{
			$messg = "<div class='error'> Image can't Grater then 3 MB....</div>";
			}
			else{
				// imgae file server upload........
				move_uploaded_file($tmpname,"uploads/".$upload_file);
				//image file DB upload..............
					$messg = db::insertImage('tbl_image',$upload_file);
					//image File FETCH in PDO::FILE_OBJ
					$imgShow = db::showImg("tbl_image");
			}
				
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
		<?php
		if(isset($imgShow))
		{//echo "uploades/".$imgShow->image;
		?>
		<img src="<?php echo "uploads/".$imgShow->image; ?>" width="200" height="150">
		<?php
			}
		?>
	</div>
	
</div>
<?php
	include_once("inc/footer.php");
?>