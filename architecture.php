<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
<div class="main-carousel">
    <?php 
        $QUERY_total_items = "SELECT * FROM categories";
        if(isset($_GET['category']) && isset($_GET['category']) != "" ){
            $current_category = "architecture?category=".$_GET['category'];

            //get current category id
            $query = "SELECT * FROM categories WHERE link_to = '$current_category' ORDER BY id LIMIT 1";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['id'];
                $QUERY_total_items = "SELECT * FROM projects WHERE category_id = $category_id";
            }
        }


        // TODO: review the QUery from above and mke "dinamic the other queries"

        $cells_per_grid = 9;
        //get the number of carousel items
       $select_post_query_count = mysqli_query($connection, $QUERY_total_items);
       $total_items = mysqli_num_rows($select_post_query_count);
       $carousel_items = ceil($total_items / $cells_per_grid); 

       for($i = 0; $i < $carousel_items; $i++ ){

    ?>
    <div class="links-container">
        <?php
            $bg_image_folder = $bg_image = "";
            $query = "SELECT * FROM links_containers_bg WHERE container_name='architecture' ORDER BY id LIMIT 1";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $bg_image_folder = $row['bg_image_folder'];
                $bg_image = $row['bg_image'];
            }
        ?>
        <img src="img/<?php echo $bg_image_folder ?>/<?php echo $bg_image ?>" alt="" class="bg-image bg-bottom">
        <?php
           
            $item_counter = $i * $cells_per_grid;
            $query = "SELECT * FROM categories ORDER BY id LIMIT $item_counter, $cells_per_grid";
            $result = mysqli_query($connection, $query);
            //insert items
            while ($row = mysqli_fetch_assoc($result)) {
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