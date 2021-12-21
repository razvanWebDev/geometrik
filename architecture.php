<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <div class="main-carousel">
    <?php 
        //TODO: take care of colaborations category
    //TODO: carousel on the index page
    // TODO: review the QUery from above and mke "dinamic the other queries"

        $page_type = "";
        $category_id;
        $current_category = "";
        if(isset($_GET['category']) && isset($_GET['category']) != "" ){
            $current_category = "architecture?category=".$_GET['category'];
            $page_type = "category";
    
        }
        
        //query to get the total number of grid items (categories) if the $page_type is NOT category
        $QUERY_total_items = "SELECT * FROM categories";
        //query to get the bg for the carousel item if the $page_type is NOT category
        $QUERY_link_container_bg = "SELECT * FROM links_containers_bg WHERE container_name='architecture' ORDER BY id LIMIT 1";
        //change queries to get projects if the current page is a category
        if($page_type == "category"){ 
            //get current category id
            $query = "SELECT * FROM categories WHERE link_to = '$current_category' ORDER BY id LIMIT 1";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['id'];
                //list projects in the current category
                $QUERY_total_items = "SELECT * FROM projects WHERE category_id = $category_id";
                //get the bg image for the current catgory
                $QUERY_link_container_bg = "SELECT * FROM links_containers_bg WHERE category_id = $category_id ORDER BY id LIMIT 1";
            }
        }

        $cells_per_grid = 9;
        //get the number of carousel items
        $select_post_query_count = mysqli_query($connection, $QUERY_total_items);
        $total_items = mysqli_num_rows($select_post_query_count);
        $carousel_items = ceil($total_items / $cells_per_grid); 

        for($i = 0; $i < $carousel_items; $i++ ){
            //populate grid cells
            $item_counter = $i * $cells_per_grid;
            //list all the categories
            $QUERY_get_grid_cells_content = "SELECT * FROM categories ORDER BY id LIMIT $item_counter, $cells_per_grid";
            //change queries to list projects if the current page is a category
            if($page_type == "category"){
                $QUERY_get_grid_cells_content = "SELECT * FROM projects WHERE category_id = $category_id ORDER BY id LIMIT $item_counter, $cells_per_grid";
            }

    ?>
        <div class="links-container">
        <?php
            //bg image for current carousel item
            $bg_image_folder = $bg_image = "";
            $get_link_container_bg = mysqli_query($connection, $QUERY_link_container_bg);
            while ($row = mysqli_fetch_assoc($get_link_container_bg)) {
                $bg_image_folder = $row['bg_image_folder'];
                $bg_image = $row['bg_image'];
            }
        ?>
            <img src="img/<?php echo $bg_image_folder ?>/<?php echo $bg_image ?>" alt="" class="bg-image bg-bottom">
        <?php
           
            $grid_cells_content = mysqli_query($connection, $QUERY_get_grid_cells_content);
            //insert items
            while ($row = mysqli_fetch_assoc($grid_cells_content)) {
                $name = $row['name'];
                $link_to = $row['link_to'];
                $bg_image_folder = $row['bg_image_folder'];
                $bg_image = $row['bg_image'];
                if($page_type == "category"){
                    // TODO: get the first image from the current project and set bg_image_folder & bg_image
                }
                include "PHP/links-container-item.php";
            }
        ?>
        </div>
        <!-- end of for loop -->
        <?php } ?>

    </div>
</section>

<?php include "PHP/footer.php"; ?>