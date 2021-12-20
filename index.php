<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <div class="links-container">
        <?php
            $bg_image_folder = $bg_image = "";
            $query = "SELECT * FROM links_containers_bg WHERE container_name='nav_links' ORDER BY id LIMIT 1";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $bg_image_folder = $row['bg_image_folder'];
                $bg_image = $row['bg_image'];
            }
        ?>
        <img src="img/<?php echo $bg_image_folder ?>/<?php echo $bg_image ?>" alt="" class="bg-image bg-bottom">
        <?php
            $cells_per_grid = 9;
            $inserted_items = 0;

            $query = "SELECT * FROM nav_links ORDER BY id";
            $result = mysqli_query($connection, $query);
            //insert items
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $link_to = $row['link_to'];
                $bg_image_folder = $row['bg_image_folder'];
                $bg_image = $row['bg_image'];

                include "PHP/links-container-item.php";
                $inserted_items++;
            }
            // populate the rest of the container with empty divs
            // while ($inserted_items < $cells_per_grid){
            //     echo "<div class='links-container-item empty'></div>";
            //     $inserted_items++;
            // }
        ?>
    </div>
  
</section>

<?php include "PHP/footer.php"; ?>