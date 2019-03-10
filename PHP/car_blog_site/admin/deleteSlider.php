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
                echo "<script>window.location='sliderList.php'; </script>";

            }
            else{
                $id = base64_decode($_GET['dltId']);

                $query = "DELETE FROM tbl_slider WHERE id='$id'";
                $rest_dlt = $db->delete($query);
                if($rest_dlt)
                {
                    echo "<script> alert('Slider Successfully Delete.')  </script>";
                    echo "<script>  window.location='sliderList.php'</script>";
                }else{
                    echo "<script> alert('Slider Fail TO Delete.')  </script>";
                    echo "<script>  window.location='sliderList.php'</script>";
                }

            }

        ?>
