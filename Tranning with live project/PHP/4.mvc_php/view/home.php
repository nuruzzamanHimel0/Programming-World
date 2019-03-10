<?php include_once("pages/header.php"); ?>


<section class="mainRight clear">
    <table class="tbllone" >
            <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Department</td>
                    <td>Age</td>
                    <td>Action</td>
            </tr>
            <?php
            $i = 0;
            foreach ($user as $key => $value)
            {
                $i++;
            ?>
            <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo $value["dept"]; ?></td>
                    <td><?php echo $value["age"]; ?></td>
                    <td> </td>
            </tr>
            <?php 
            }
            ?>
           
    </table>
</section>



<?php include_once("pages/footer.php"); ?>