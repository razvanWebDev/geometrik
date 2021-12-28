<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <?php
        $project_id = 0;
        if(isset($_GET['p_id']) && $_GET['p_id'] > 0){
            $project_id = escape($_GET['p_id']);
        }
        $carousel_fotos_query = "SELECT * FROM projects_fotos WHERE project_id=$project_id";
        $carousel_nav_fotos_query = "SELECT * FROM projects_fotos WHERE project_id=$project_id";
        $page_description_query = "SELECT * FROM projects WHERE id=$project_id ORDER BY id LIMIT 1";

        include "PHP/simple-page-layout.php";
    ?>

</section>

<?php include "PHP/footer.php"; ?>