<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <?php
        $project_id = 0;
        if(isset($_GET['p_id']) && $_GET['p_id'] > 0){
            $project_id = escape($_GET['p_id']);
        }
    ?>
    <div class="project">
        <div class="project-carousel-container">
            <div class="project-main-carousel"
                data-flickity='{"fullscreen": true, "pageDots": false, "bgLazyLoad": true}'>
                <?php
                    $project_fotos_query = "SELECT * FROM projects_fotos WHERE project_id=$project_id";
                    $fotos_result = mysqli_query($connection, $project_fotos_query);

                    while($row = mysqli_fetch_assoc($fotos_result)){
                        $bg_image_folder = (!empty($row['folder_name']) ? $row['folder_name'] : ""); 
                        $bg_image = (!empty($row['image']) ? $row['image'] : "");
                ?>
                <div class="project-carousel-cell">
                    <img src="img/<?php echo $bg_image_folder." /".$bg_image ?>" class="bg-image" alt="">
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="project-main-carousel-nav"
                data-flickity='{"asNavFor": ".project-main-carousel", "contain": true, "pageDots": false}'>
                <?php
                    $project_fotos_query = "SELECT * FROM projects_fotos WHERE project_id=$project_id";
                    $fotos_result = mysqli_query($connection, $project_fotos_query);

                    while($row = mysqli_fetch_assoc($fotos_result)){
                        $bg_image_folder = (!empty($row['folder_name']) ? $row['folder_name'] : ""); 
                        $bg_image = (!empty($row['image']) ? $row['image'] : "");
                ?>
                <div class="project-carousel-nav-cell">
                    <img src="img/<?php echo $bg_image_folder." /".$bg_image ?>" class="bg-image" alt="">
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="projects-description">

        </div>
    </div>
</section>

<?php include "PHP/footer.php"; ?>