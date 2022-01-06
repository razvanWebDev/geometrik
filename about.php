<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="hero">
    <?php
        $carousel_fotos_query = "SELECT * FROM simple_pages_fotos WHERE page_id=1";
        $page_description_query = "SELECT * FROM simple_pages_text WHERE id=1 ORDER BY id LIMIT 1";

        include "PHP/simple-page-layout.php";
    ?>

</section>

<?php include "PHP/footer.php"; ?>