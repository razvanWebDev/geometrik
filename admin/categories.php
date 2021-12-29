<?php include "includes/header.php"; ?>
<div class="wrapper">

  <?php include "includes/top_navbar.php"; ?>
  <?php include "includes/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php 
      if(isset($_GET['source'])) {
          $source = $_GET['source'];
      }else{
          $source = "";
      }

      switch($source) {
        case 'add_category';
        include "includes/add_category.php";
        break;

        case 'edit_category';
        include "includes/edit_category.php";
        break;

        default:
        include "includes/view_all_categories.php";
      }
    ?>
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<?php include "includes/footer.php"; ?>