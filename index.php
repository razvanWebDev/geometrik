<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <div class="main-carousel">
    <?php 
        $cells_per_grid = 9;
        //get the number of carousel items
        $QUERY_total_items = "SELECT * FROM nav_links";
        $select_post_query_count = mysqli_query($connection, $QUERY_total_items);
        $total_items = mysqli_num_rows($select_post_query_count);
        $carousel_items = ceil($total_items / $cells_per_grid); 

        for($i = 0; $i < $carousel_items; $i++ ){
            //populate grid cells
            $item_counter = $i * $cells_per_grid;
    ?>
        <div class="links-container">
            <?php
            //bg image for current carousel item
            $bg_image_folder = $bg_image = "";
            $QUERY_link_container_bg = "SELECT * FROM links_containers_bg WHERE container_name='nav_links' ORDER BY id LIMIT 1";
            $get_link_container_bg = mysqli_query($connection, $QUERY_link_container_bg);
            while ($row = mysqli_fetch_assoc($get_link_container_bg)) {
                $bg_image_folder = $row['bg_image_folder'];
                $bg_image = $row['bg_image'];
            }
        ?>
            <img src="img/<?php echo $bg_image_folder ?>/<?php echo $bg_image ?>" alt="" class="bg-image bg-bottom">
        <?php
            //list all the categories
            $QUERY_get_grid_cells_content = "SELECT * FROM nav_links WHERE link_to != 'index' ORDER BY id LIMIT $item_counter, $cells_per_grid";
            $grid_cells_content = mysqli_query($connection, $QUERY_get_grid_cells_content);
            //insert items
            while ($row = mysqli_fetch_assoc($grid_cells_content)) {
                $name = $row['name'];
                $link_to = $row['link_to'];
                $bg_image_folder = $row['bg_image_folder'];
                $bg_image = $row['bg_image'];
                include "PHP/links-container-item.php";
            }
        ?>
        </div>
        <!-- end of for loop -->
        <?php } ?>

    </div>
</section>

<?php include "PHP/footer.php"; ?>