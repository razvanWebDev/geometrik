<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <div class="links-container">
        <img src="img/nav_links/main.png" alt="" class="bg-image bg-bottom">
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
            while ($inserted_items < $cells_per_grid){
                echo "<div class='links-container-item empty'></div>";
                $inserted_items++;
            }
        ?>
    </div>
  
</section>

<?php include "PHP/footer.php"; ?>