<?php
$invalidTitleClass = "";
$showTitleError = "none";
$titleErrorText = "";

$invalidImageClass = "";
$showImageError = "none";
$imageErrorText = "";

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
    if(isset($_GET['image'])){
      $showImageError = "block";
      $invalidImageClass = "is-invalid";
      if($_GET['image'] == "size"){
        $imageErrorText .= "File exceeded max file_size. ";
      }
      if($_GET['image'] == "partial"){
        $imageErrorText .= "File only partially uploaded. ";
      }
      if($_GET['image'] == "empty"){
        $imageErrorText .= "An image is mandatory! ";
      }
    }
  }

} 
//get input values in case the username or email already exist
$titleInputValue = isset($_GET['name']) ? $_GET['name'] : "";

if(isset($_POST['submit'])) {
  $title = escape($_POST['title']);
  $bg_image_input = $_FILES['bg_image'];
  $image_path = "../img/architecture/";

  $titleError = $imageError =  "";

  //check if title field is empty
  if(empty($title)){
    $titleError .= "&nameErr=required";
  }

  //check if category exists
  $categories_query = "SELECT * FROM categories WHERE title='{$title}'";
  $categories_result = mysqli_query($connection, $categories_query);
  $categories_count = mysqli_num_rows($categories_result);
  echo $categories_count;
  if($categories_count > 0){
    $titleError .= "&nameErr=exists";
  }

  //check for image file errors
  if($bg_image_input['error'] > 0 ){
		echo 'There is problem in file upload';
		switch($bg_image_input['error'])
		{
			case 1: $imageError = '&image=size'; break;
			case 2: $imageError = '&image=size'; break;
			case 3: $imageError = '&image=partial'; break;
			case 4: $imageError = '&image=empty'; break;
		}
	}

  $error_msg = $titleError . $imageError;

  if(!empty($error_msg)){
    header("Location: categories.php?source=add_category&failed=true$error_msg&name=$title");
  }else{
    //add new category db
    $imageName = uploadFile($bg_image_input, $image_path);
    createCategory($title, $imageName);
    header("Location: categories.php");
    exit();
  }
}
?>

<?php $page_title = "Add a category"; ?>
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
              <div class="form-group">
                <label for="bg_image">User Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?php echo $invalidImageClass ?>" name="bg_image">
                  <label class="custom-file-label" for="bg_image">Choose file</label>
                  <span class="error invalid-feedback" style="display: <?php echo $showImageError ?>"><?php echo $imageErrorText ?></span>
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
          <input onclick="return confirm('Create category <?php echo $title ?>?')" type="submit" value="Create new Category" name="submit" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
