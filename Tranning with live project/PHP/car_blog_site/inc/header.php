<?php include("config/config.php"); ?>
<?php include("lib/Database.php");  ?>
<?php include("helper/formate.php");  ?>

<?php 
    $db = new Database();
    $fm = new formate();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Dynamic Meta changes............................................-->
    <?php require("script/meta.php");?>
    <!-- Dynamic Title changes............................................-->
    <?php require("script/title.php");?>
    <!-- Dynamic theme changes............................................-->
    <?php require("script/css.php");?>

    <script src="js/ajax.googleapis.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
<!--    ..........................-->

    <!-- slider script................................ -->
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect:'random',
            slices:10,
            animSpeed:6000,
            pauseTime:5000,
            startSlide:0, //Set starting Slide (0 index)
            directionNav:false,
            directionNavHide:false, //Only show on hover
            controlNav:false, //1,2,3...
            controlNavThumbs:false, //Use thumbnails for Control Nav
            pauseOnHover:true, //Stop animation while hovering
            manualAdvance:false, //Force manual transitions
            captionOpacity:0.8, //Universal caption opacity
            beforeChange: function(){},
            afterChange: function(){},
            slideshowEnd: function(){} //Triggers after all slides have been shown
        });
    });
    </script>

</head>

<body>

	


<div id="templatemo_header_content_container">
    
        <div id="templatemo_header_section">
            <div id="templatemo_title_section">
                <?php
                $query = "SELECT * FROM tbl_slogan WHERE id = 1";
                $result = $db->select($query);
                if($result)
                {
                $fetch = $result->fetch_assoc();
                ?>
                <div class="logo">
                    <img src="admin/img/logo/<?php echo $fetch["logo"]; ?>">
                    <p><?php echo $fetch["title"]; ?></p>
                </div>

                <?php }else{ ?>
                <div class="logo">
                    <h1>LOGO</h1>
                    <p>WEBSITE NAME</p>
                </div>
                <?php } ?>
            </div>
            <div class="templatemo_social_section">
                <?php
                    $query = "SELECT * FROM  tbl_social WHERE id = 1";
                    $social_res = $db->select($query);
                    if($social_res)
                    {
                    if( $social_res->num_rows > 0)
                    {
                    $fet_res = $social_res->fetch_assoc();
                ?>
                        <a href="<?php echo $fet_res['fb'];  ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
                        <a href="<?php echo $fet_res['gp']; ?>" target="_blank"><i class="fab fa-google-plus-square"></i></a>
                        <a href="<?php echo $fet_res['li']; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                <?php }}else{ ?>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-google-plus-square"></i>
                <i class="fab fa-linkedin"></i>
                <?php } ?>
            </div>
            
            <div id="templatemo_search_section">
                <form method="get" action="search.php">
                    <input type="text" name="input" size="10" id="searchfield" title="searchfield" />
                    <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
                </form>
            </div>
        </div> <!-- end of templatemo header panel -->
         <div id="templatemo_menu_panel">
            <div id="templatemo_menu_section">
                <ul>
                    <li><a href="index.php" class="current">Home</a></li>

                    <?php
                    $query = "SELECT * FROM tbl_pages ORDER BY id ASC";
                    $pages_res = $db->select($query);
                    if($pages_res)
                    {
                        while($row = $pages_res->fetch_assoc()) {
                            ?>
                            <li><a href="page.php?pgId=<?php echo base64_encode($row['id']); ?>"><?php echo $row['name']; ?></a></li>
                        <?php } } ?>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contuct.php">Contuct Us</a></li>                    
                </ul> 
            </div>
        </div> <!-- end of menu -->