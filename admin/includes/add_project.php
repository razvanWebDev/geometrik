<?php
$invalidTitleClass = "";
$showTitleError = "none";
$titleErrorText = "";

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
        $titleErrorText .= "This project name already exists! ";
      }
    }
  }
} 
//get input values in case the username or email already exist
$titleInputValue = isset($_GET['name']) ? $_GET['name'] : "";
$subtitleInputValue = isset($_GET['subtitle']) ? $_GET['subtitle'] : "";
$descriptionInputValue = isset($_GET['description']) ? $_GET['description'] : "";
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : "";


if(isset($_POST['submit'])) {
  $title = escape($_POST['title']);
  $subtitle = escape($_POST['subtitle']);
  $description = stripslashes($_POST['description']);
  $categoryId = escape($_POST['category_select']);
  
  $titleError = "";

  //check if title field is empty
  if(empty($title)){
    $titleError .= "&nameErr=required";
  }

  //check if project link exists
  $link_to = stripSpecialChars($title);
  $is_name_taken = isNameTaken ("projects", "link_to", $link_to);
  if($is_name_taken){
    $titleError .= "&nameErr=exists";
  }

  $error_msg = $titleError;

  if(!empty($error_msg)){
    header("Location: projects.php?source=add_project&failed=true$error_msg&name=$title&subtitle=$subtitle&description=$description&category=$categoryId");
  }else{
    //add new project db
    $lastId = createProject($title, $subtitle, $description, $categoryId);

    // create images folder
    $new_folder = "../img/projects/{$lastId}";
    if (!is_dir($new_folder)) {
      mkdir($new_folder, 0777, true);
    }else{
        die("There was an error creating the photos folder");
    }

    header("Location: projects.php?source=project_fotos&project_id=$lastId");
    exit();
  }
}
?>

<?php $page_title = "Add a new project"; ?>
<?php include "page_title.php"; ?>

<!-- Main content -->
<section class="content">
  <form id="user-form" action="" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="title">Project Name*</label>
              <input type="text" name="title" class="form-control <?php echo $invalidTitleClass ?>"
                value="<?php echo $titleInputValue ?>">
              <span class="error invalid-feedback" style="display: <?php echo $showTitleError ?>">
                <?php echo $titleErrorText ?>
              </span>
            </div>
            <div class="form-group">
              <label for="subtitle">Subtitle</label>
              <input type="text" name="subtitle" class="form-control" value="<?php echo $subtitleInputValue ?>">
            </div>
            <div class="form-group">
              <label for="description">Project Description</label>
              <textarea id="summernote" name="description">
                    <?php echo $descriptionInputValue ?>
                </textarea>
            </div>
            <div class="form-group">
              <label for="purchased">Category</label>
              <select name="category_select" class="form-control">
                <!-- get gategories -->
                <?php
                    $query = "SELECT * FROM categories ORDER BY id";
                    $select_categories = mysqli_query($connection, $query);
            
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                      $categoryId = (!empty($row['id']) ? $row['id'] : "");
                      $category = (!empty($row['title']) ? $row['title'] : "");
                      $selected = ($categoryId == $selectedCategory ? "selected" : "")
                  ?>
                <option value="<?php echo $categoryId ?>" <?php echo $selected ?>>
                  <?php echo $category ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="javascript:history.back(1)" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Save and add photos" name="submit" id="submit"
          class="btn btn-success float-right">
      </div>
    </div>
  </form>
</section>
<!-- /.content -->