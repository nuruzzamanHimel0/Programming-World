<?php include("lib/Session.php");  ?>
<?php include("../config/config.php");  ?>
<?php include("../lib/Database.php");  ?>

<?php Session::sess_start(); ?>
<?php
$db = new Database();
Session::getLogOut();

?>

        <?php
            if(!isset($_GET['dltId']) || empty($_GET["dltId"]))
            {
                echo "<script>window.location='postlist.php'; </script>";

            }
            else{
                $id = base64_decode($_GET['dltId']);

                $query = "DELETE FROM tbl_user WHERE id='$id'";
                $rest_dlt = $db->delete($query);
                if($rest_dlt)
                {
                    echo "<script> alert('Profile Successfully Delete.')  </script>";
                    echo "<script>  window.location='userList.php'</script>";
                }else{
                    echo "<script> alert('Profile Fail TO Delete.')  </script>";
                    echo "<script>  window.location='userList.php'</script>";
                }

            }

        ?>
