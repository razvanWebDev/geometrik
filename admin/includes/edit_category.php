<?php
$invalidTitleClass = "";
$showTitleError = "none";
$titleErrorText = "";

$invalidImageClass = "";
$showImageError = "none";
$imageErrorText = "";

$titleInputValue = "";

//check for errors
if(isset($_GET['failed'])){
  if($_GET['failed'] == "true"){
    if(isset($_GET['nameErr'])){
      $showTitleError = "block";
      $invalidTitleClass = "is-invalid";
      if($_GET['nameErr'] == "required"){
        $titleErrorText .= "This fiels is required. ";
      }
      if($_GET['nameErr'] == "exists"){
        $titleErrorText .= "This category name already exists! ";
      }
    }
  }
}

if(isset($_GET['id'])){
  $category_id = escape($_GET['id']);
}

$query = "SELECT * FROM categories WHERE id = {$category_id}";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $db_title = $row['title'];
  $db_bg_image = $row['bg_image'];
  
  $titleInputValue = $db_title; 
}

$titleInputValue = isset($_GET['name']) ? $_GET['name'] : $titleInputValue;

if(isset($_POST['submit'])) {
  $title = escape($_POST['title']);

  $titleError =  "";

  //check if title field is empty
  if(empty($title)){
    $titleError .= "&nameErr=required";
  }

  //check if category exists
  $categories_query = "SELECT * FROM categories WHERE title='{$title}'";
  $categories_result = mysqli_query($connection, $categories_query);
  $categories_count = mysqli_num_rows($categories_result);
  echo $categories_count;
  if($categories_count > 0 && $title != $db_title){
    $titleError .= "&nameErr=exists";
  }

  $error_msg = $titleError;

  if(!empty($error_msg)){
    header("Location: categories.php?source=add_category&id=$category_id&failed=true$error_msg&name=$title");
  }else{
    //add new category db
    editCategory($title, $category_id);
    header("Location: categories.php");
    exit();
  }
}
?>

<?php $page_title = "Edit category"; ?>
    <?php include "page_title.php"; ?>

  <!-- Main content -->
  <section class="content">
    <form id="user-form" action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <!-- <h3 class="card-title">General</h3> -->

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="title">Category Name*</label>
                <input type="text" name="title" class="form-control <?php echo $invalidTitleClass ?>" value="<?php echo $titleInputValue ?>">
                <span class="error invalid-feedback" style="display: <?php echo $showTitleError ?>"><?php echo $titleErrorText ?></span>
              </div>
              <div class='image-container'>
                <img src='../img/architecture/<?php echo $db_bg_image; ?>'>
                <div class='image-actions'>
                  <a class='btn btn-primary'
                    href='categories.php?source=edit_category_photo&id=<?php echo $category_id ?>'>Change Photo</a>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
  
      </div>
      <div class="row">
        <div class="col-12">
          <a href="javascript:history.back(1)" class="btn btn-secondary">Cancel</a>
          <input onclick="return confirm('Edit category ?')" type="submit" value="Edit Category" name="submit" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
