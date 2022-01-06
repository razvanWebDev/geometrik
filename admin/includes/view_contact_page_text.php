
<?php $page_title = "Contact Us page text"; ?>
<?php include "includes/page_title.php"; ?>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body">

    <a href="contact_page_text.php?source=edit_contact_page_text" class="btn bg-primary mb-4">
      <i class="fas fa-edit mr-2"></i>Edit page text
    </a>
    <div class="simple-page-description">
      <?php 
        $query = "SELECT * FROM simple_pages_text WHERE id=4 ORDER BY id LIMIT 1";
        $select_users = mysqli_query($connection, $query);
      
        $title = $subtitle = $description = "";
        while ($row = mysqli_fetch_assoc($select_users)) {
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

    </div>
    <!-- /.card-body -->

    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->