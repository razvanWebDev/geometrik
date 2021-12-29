<!-- DELETE CATEGORY -->
<?php 
 if(isset($_GET['delete'])) {
    if(isset($_SESSION['username'])){
      $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);
      $image_folder = isset($_GET['fldr']) && !empty($_GET['fldr']) ? $_GET['fldr'] : "architecture";
      deleteFileFromRow("categories", "bg_image", $delete_id, "../img/$image_folder/");
      //remove from db
      deleteItem("categories", $delete_id);
    }
    header("Location: categories.php");
    exit();
 }
?>

<?php $page_title = "Projects Categories"; ?>
<?php include "includes/page_title.php"; ?>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body">
      <p class="text-danger text-lg">WARNING!!! <br>
        If you want to delete a category, make sure to change the projects belonging to it and assign them a new existing category. <br>
        Otherwise, theese projects won't be visible on the site.
    </p>
      <table class="table table-bordered table-hover text-center">
        <thead>
          <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
      <?php
        //pagination
        $rowCounter_per_page = 0;
        //the number of posts per page
        $articles_per_page = 20;
    
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        if($page == "" || $page == 1){
            $page_1 = 0;
        }else{
            $page_1 = ($page * $articles_per_page) - $articles_per_page;
        }

        $post_query_count = "SELECT * FROM categories";
        $select_post_query_count = mysqli_query($connection, $post_query_count);
        $count = mysqli_num_rows($select_post_query_count);
        $count = ceil($count / $articles_per_page); 

        $query = "SELECT * FROM categories ORDER BY id LIMIT $page_1, $articles_per_page";
        $select_users = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users)) {
          $rowCounter_per_page++;
          $totalRowCounter = $rowCounter_per_page + (($page-1) * $articles_per_page);
          
          $id = $row['id'];
          $title = (!empty($row['title']) ? $row['title'] : "");
          $bg_image_folder = (!empty($row['bg_image_folder']) ? $row['bg_image_folder'] : ""); 
          $bg_image = (!empty($row['bg_image']) ? $row['bg_image'] : "");
      ?>

          <tr>
            <td>
              <?php echo $totalRowCounter ?>
            </td>
            <td>
              <?php echo $title ?>
            </td>
            <td class="text-center">
              <img class="table-image" src="../img/<?php echo $bg_image_folder ?>/<?php echo $bg_image ?>" alt="category image">
            </td>
            <td class="text-center">
              <a href="categories.php?source=edit_category&id=<?php echo $id; ?>" class="btn btn-sm btn-primary">
                <i class="far fa-edit mr-2"></i>Edit
              </a>
            </td>
            <td class="text-center">
              <a href="categories.php?delete=<?php echo $id; ?>&fldr=<?php echo $bg_image_folder ?>" onClick="javascript:return confirm('Delete category <?php echo $title; ?>?')"; class="btn btn-sm bg-danger">
                <i class="fas fa-trash-alt mr-2"></i>
                  Delete
              </a>
            </td>
          <?php } ?>

        </tbody>
      </table>

          </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <nav aria-label="Contacts Page Navigation">
        <ul class="pagination justify-content-center m-0">
          <?php
        if($count > 1){
          for($i = 1; $i <= $count; $i++){
            if($i == $page){
                echo "<li class='page-item active'><a class='page-link' href='categories.php?page={$i}'>$i</a></li>";
            }else{
                echo "<li class='page-item'><a class='page-link' href='categories.php?page={$i}'>$i</a></li>";
            }
          }
        }
        ?>
        </ul>
      </nav>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
