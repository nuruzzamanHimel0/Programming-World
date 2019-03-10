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
					// reandome image name generate.......
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
						
					
						
				    }

					
				}
				if(isset($messg))
				{
					echo $messg;
					//header("index.php");
					//exit();
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
					if(isset($_GET['dltId']))
					{
						$id = $_GET['dltId'];
						$folderImgDlt = db::selectImgByid($id,"tbl_image");
						$dltMass = db::deletImgById($id,"tbl_image");
						if(isset($dltMass) && isset($folderImgDlt))
						{	
							unlink("uploads/".$folderImgDlt->image);
							echo $dltMass;
							header("Location: index.php");
							exit();
						}
					}
				?>
				<table>
					<tr>
						<th width="100">No</th>
						<th width="100">Image</th>
						<th width="100">Action</th>
					</tr>
				<?php 
				$allImgShow = db::showAllimg("tbl_image");
				if(isset($allImgShow))
				{	$i = 0;
					foreach ($allImgShow as $value)
					 {
						$i++;
					
				?>
					<tr>
						<td width="100"><?php echo $i; ?></td>
						<td width="100">
							
						<img src="<?php echo "uploads/".$value['image']; ?>" width="100" height="80">		
						</td>
						<td width="100">
							<a href="?dltId=<?php echo $value['id'] ?>">Delete</a>
						</td>
					</tr>
				<?php 
					}
				}
				?>
				</table>
					

				</div>
				
			</div>
<?php 
	include_once("inc/footer.php");
?>