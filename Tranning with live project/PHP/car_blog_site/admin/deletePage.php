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
                echo "<script>window.location='index.php'; </script>";

            }
            else{
                $id = $_GET['dltId'];

                $query = "DELETE FROM tbl_pages WHERE id='$id'";
                $rest_dlt = $db->delete($query);
                if($rest_dlt)
                {
                    echo "<script> alert('Page Successfully Delete.')  </script>";
                    echo "<script>  window.location='index.php'</script>";
                }else{
                    echo "<script> alert('Page Fail TO Delete.')  </script>";
                    echo "<script>  window.location='index.php'</script>";
                }

            }

        ?>
