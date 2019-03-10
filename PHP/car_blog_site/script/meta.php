<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    if(isset($_GET['pgId']))
    {
        $id = base64_decode($_GET['pgId']);
        $query = "SELECT * FROM tbl_pages WHERE id = '$id'";
        $pages_res = $db->select($query);
        if($pages_res)
        {
            $fetch_pag_row = $pages_res->fetch_assoc();
?>
            <meta name="keywords" content="<?php echo $fetch_pag_row['meta_tag']; ?>" />
            <meta name="description" content="<?php echo $fetch_pag_row['meta_des']; ?>" />
<?php
        }

    }else if(isset($_GET['postId']))
    {
        $id = base64_decode($_GET['postId']);
        $query = "SELECT * FROM tbl_post WHERE id = '$id'";
        $post_res = $db->select($query);
        if($post_res)
        {
            $fetch_pst_row = $post_res->fetch_assoc();
?>
            <meta name="keywords" content="<?php echo $fetch_pst_row['tag']; ?>" />
            <meta name="description" content="<?php echo $fetch_pst_row['des']; ?>" />
<?php
        }
    }else{
        $path = $_SERVER['SCRIPT_FILENAME'];
        $name = basename($path,'.php');
        $name = str_replace("_"," ",$name);
        $name = strtolower($name);
        if($name == "index"){
?>
            <meta name="keywords" content="<?php echo KEYWORD; ?>" />
            <meta name="description" content="<?php echo DESCRIPTION; ?>" />
<?php
        }else if($name == "contuct")
        {
?>
            <meta name="keywords" content="This is a keyword of contuct page" />
            <meta name="description" content="This is a Description of contuct page" />
<?php
        }else if($name == "about")
        {
?>
            <meta name="keywords" content="This is a keyword of about page" />
            <meta name="description" content="This is a Description of about page" />
<?php
        }
?>

<?php
    }
?>

