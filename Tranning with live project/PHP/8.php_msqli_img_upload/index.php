<?php include 'inc/header.php';?>
<?php include 'config/Config.php';?>
<?php include 'lib/Database.php';?>
<?php 
$db = new Database();
$errormsg = "";
$msg = "";
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
  {
    $parmited = array("jpg","jpeg","png","gif");

    $tmp_name = $_FILES["image"]["tmp_name"];
    $filename = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    // string to array
    $div = explode(".",$filename);
    $img_ext = strtolower(end($div)); // give image extrantion
    //create random name
    $upload_img_name = substr(md5(time()),0,10).".".$img_ext;
   
   if(empty($filename)){
    $errormsg = "<div class='error'>Field Can't Empty !! </div>";
   }
   else if(in_array($img_ext, $parmited) == false)
   {
    $errormsg = "<div class='error'>You can only upload (".implode(",",$parmited)." ) </div>";
   }
   else if($file_size > 2097152){
   $errormsg = "<div class='error'>File Size is too long above 3mb </div>";

  }
else{
      
      move_uploaded_file($tmp_name,"upload/".$upload_img_name);
      $query = "INSERT INTO tbl_upload(image) VALUES('$upload_img_name')";
      $result = $db->insert($query);
      if($result)
      {
        $msg = "<div class='succ'>Image Upload Successfully </div>";
      }
  }
}
  

?>
<?php 
  if(isset($_GET["dltid"]))
  {
    $id = $_GET["dltid"];
    $query1 = "SELECT * FROM tbl_upload WHERE id = '$id' ";
    $result1 = $db->select($query1);
    $rst1_fet = $result1->fetch_assoc();
    $dlt_img = $rst1_fet["image"];
    //echo $dlt_img;//exit();
    $query = "DELETE FROM tbl_upload WHERE id = '$id' ";
   $result = $db->delete($query);
   if($result)
   {
      $msg = "<div class='succ'>Image Delete Successfully </div>";
      unlink("upload/".$dlt_img);
   }
  }
?>
 <div class="myform">
  <?php 
  if(isset($errormsg) && !empty($errormsg))
  {
    echo $errormsg;
    $errormsg = NULL;
  }
  if(isset($msg))
  {
    echo $msg;
    
  }
  ?>
  <form action="" method="post" enctype="multipart/form-data">
   <table>
    <tr>
     <td>Select Image</td>
     <td><input type="file" name="image"/></td>
    </tr>
    <tr>
     <td></td>
     <td><input type="submit" name="submit" value="Upload"/></td>
    </tr>
   </table>
  </form>
  
  <table>
<?php 
  $query = "SELECT * FROM tbl_upload ORDER BY id DESC";
  $result = $db->select($query);
  if($result)
  {
?>
    <tr>
      <td width="30%">NO</td>
      <td width="50%">Image</td>
      <td width="20%">Action</td>
    </tr>

<?php 
   $i = 0;
    while($row = $result->fetch_assoc())
    {
?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><img src="upload/<?php echo $row['image']; ?>"></td>
      <td>
        <a href="?dltid=<?php echo $row['id']; ?>">Delete</a>
      </td>
    </tr>
<?php
  }}else{
?>
  <tr>
      <td>Image Not Found</td>
     
    </tr>
<?php
  }
?>
  </table>

 </div>
<?php include 'inc/footer.php';?>