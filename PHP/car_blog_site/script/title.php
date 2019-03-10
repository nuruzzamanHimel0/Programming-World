<?php
    $query = "SELECT * FROM tbl_slogan WHERE id = '1'";
    $titl_res = $db->select($query);
    if($titl_res)
    {
        while($titl_row = $titl_res->fetch_assoc())
        {
            $title = $titl_row['title'];
            $title = str_replace("_"," ",$title);
            $title = ucwords($title);
            $title_logo = $titl_row['logo'];
            if(isset($_GET['pgId']))
            {
                $id = base64_decode($_GET['pgId']);
                $query = "SELECT * FROM tbl_pages WHERE id = '$id'";
                $pages_res = $db->select($query);
                if($pages_res)
                {
                    $page_row = $pages_res->fetch_assoc();
                    $page_name = $page_row['name'];
                    $page_name = strtolower($page_name);
                    $page_name = ucwords($page_name);
                    echo "<title>$page_name-$title</title>";
                    echo "<link rel='icon' type='image/jpg' href='admin/img/logo/".$title_logo." ' >";

                }
            }
            else if(isset($_GET['postId']))
            {
                $id = base64_decode($_GET['postId']);
                $query = "SELECT * FROM tbl_post WHERE id = '$id'";
                $post_res = $db->select($query);
                if($post_res)
                {
                    $post_row = $post_res->fetch_assoc();
                    $post_titl = $post_row['title'];
                    $post_titl = strtolower($post_titl);
                    $post_titl = ucwords($post_titl);
                    $post_titl = $fm->textShort($post_titl,10);
                    echo "<title>$post_titl-$title</title>";
                    echo "<link rel='icon' type='image/jpg' href='admin/img/logo/".$title_logo." ' >";


                }
            }
            else{
                echo "<title> ".$fm->title()."-$title</title>";
                echo "<link rel='icon' type='image/jpg' href='admin/img/logo/".$title_logo." ' >";

            }


        }
//        first while end...

    }
?>