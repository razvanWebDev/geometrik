<!-- before including, take care of these 3 queries!!!!:
1. $carousel_fotos_query
2. $carousel_nav_fotos_query
3. $page_description_query -->

<div class="simple-page-layout">
        <div class="simple-page-carousel-container">
            <div class="simple-page-main-carousel"
                data-flickity='{"fullscreen": true, "pageDots": false, "bgLazyLoad": true}'>
                <?php
                    $fotos_result = mysqli_query($connection, $carousel_fotos_query);

                    while($row = mysqli_fetch_assoc($fotos_result)){
                        $bg_image_folder = (!empty($row['folder_name']) ? $row['folder_name'] : ""); 
                        $bg_image = (!empty($row['image']) ? $row['image'] : "");
                ?>
                <div class="simple-page-carousel-cell">
                    <img src="img/<?php echo $bg_image_folder." /".$bg_image ?>" class="bg-image" alt="">
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="simple-page-main-carousel-nav"
                data-flickity='{"asNavFor": ".simple-page-main-carousel", "contain": true, "pageDots": false}'>
                <?php
                    $fotos_result = mysqli_query($connection, $carousel_nav_fotos_query);

                    while($row = mysqli_fetch_assoc($fotos_result)){
                        $bg_image_folder = (!empty($row['folder_name']) ? $row['folder_name'] : ""); 
                        $bg_image = (!empty($row['image']) ? $row['image'] : "");
                ?>
                <div class="simple-page-carousel-nav-cell">
                    <img src="img/<?php echo $bg_image_folder." /".$bg_image ?>" class="bg-image" alt="">
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="simple-page-description-container">
            <div class="top-fade"></div>
            <div class="simple-page-description">
                <?php 
                    $description_result = mysqli_query($connection, $page_description_query);
                    while($row = mysqli_fetch_assoc($description_result)){
                        $title = (!empty($row['title']) ? $row['title'] : "");
                        $subtitle = (!empty($row['subtitle']) ? $row['subtitle'] : "");
                        $description = (!empty($row['description']) ? $row['description'] : "");
                    }

                    if($title !== ""){
                        echo '<h2 class="simple-page-title">'.$title.'</h2>';
                    }
                    if($subtitle !== ""){
                        echo '<h3 class="simple-page-subtitle">'.$subtitle.'</h3>';
                    }
                    if($description !== ""){
                        echo '<div class="description">'.$description.'</div>';
                    }
                ?>
            </div>
            <div class="bottom-fade"></div>
        </div>
    </div>