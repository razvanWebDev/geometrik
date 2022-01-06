<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <?php
        $project_id = 0;
        if(isset($_GET['link']) && !empty($_GET['link'])){
            $link_to = escape($_GET['link']);

            $project_id_query = "SELECT * FROM projects WHERE link_to = '{$link_to}' ORDER BY id DESC LIMIT 1";
            $project_id_result = mysqli_query($connection, $project_id_query);

            while($row = mysqli_fetch_assoc($project_id_result)){
                $project_id = $row['id'];
            }
        }
        $carousel_fotos_query = "SELECT * FROM projects_fotos WHERE project_id=$project_id";
        $page_description_query = "SELECT * FROM projects WHERE id=$project_id ORDER BY id LIMIT 1";

        include "PHP/simple-page-layout.php";
    ?>

</section>

<?php include "PHP/footer.php"; ?>