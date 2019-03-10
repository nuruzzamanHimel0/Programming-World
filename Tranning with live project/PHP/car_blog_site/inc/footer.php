<div id="templatemo_footer_panel">
    	<div id="templatemo_footer_section">
			Copyright © <?php echo date('Y'); ?>
            <?php
                $query = "SELECT * FROM  tbl_copy WHERE id = 1";
                $cpy_res = $db->select($query);
                if($cpy_res)
                {
                if( $cpy_res->num_rows > 0)
                {
                $fet_res = $cpy_res->fetch_assoc();
            ?>
            <a href="#"><?php echo $fet_res['copy']; ?></a>
            <?php }}
            ?>
            |
            <a href="https://www.facebook.com/nuruzzaman.himel0" target="_blank">Website Templates</a> by <a href="https://www.facebook.com/nuruzzaman.himel0" target="_blank">Nuruzzaman Himel</a>
        </div>
</div>
    <div class="scrollToTop">
        <i class="far fa-arrow-alt-circle-up"></i>
    </div>

<script src="js/wow.min.js"></script>
    <script src="custom.js"></script>
    <script src="js/modernizr-custom.js"></script>
       <!-- Google Analytics....................-->    
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-XXXX-X', 'auto');
    ga('send', 'pageview');
    </script>
    <script type="text/javascript">
        
        $(window).scroll(function(){
            if($(this).scrollTop()>300)
            {
                $(".scrollToTop").fadeIn();
            }
            else{
                $(".scrollToTop").fadeOut();
            }
        });
    </script>
    <script type="text/javascript">
        $(".scrollToTop").click(function(){
            $("html,body").animate({scrollTop:0},3000);
        });
    </script>

</body>
</html>