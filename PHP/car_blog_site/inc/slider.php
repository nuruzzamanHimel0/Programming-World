 <div class="slidersection templete clear">
            <div class="sliderBack">
                <div id="slider">
            <?php
                $query = "SELECT * FROM tbl_slider ORDER BY id DESC ";
                $slider_res = $db->select($query);
                if($slider_res)
                {
                while($row = $slider_res->fetch_assoc())
                {
            ?>
                    <a href="#"><img src="images/slideshow/<?php echo $row['image']; ?>" alt="nature 1" title="<?php echo $row['title']; ?>" /></a>
            <?php } }else{
            ?>
                    <a href="#"><img src="images/slideshow/empty.jpg" alt="nature 1" title="Empty Slider Field..................." /></a>

                    <?php
                } ?>
                </div>
            </div>
        

    </div>