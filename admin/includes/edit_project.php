<?php
//get the project data
if(isset($_GET['id'])){
  $project_id = $_GET['id'];
}
$query = "SELECT * FROM projects WHERE id = {$project_id}";
$result = mysqli_query($connection, $query);
$db_id = $db_title = $db_subtitle = $db_description = $db_category_id = "";
while ($row = mysqli_fetch_assoc($result)) {
  $db_id = $row['id'];
  $db_title = (!empty($row['title']) ? $row['title'] : "");
  $db_subtitle = (!empty($row['subtitle']) ? $row['subtitle'] : "");
  $db_description = (!empty($row['description']) ? $row['description'] : ""); 
  $db_category_id = (!empty($row['category_id']) ? $row['category_id'] : "");  
}

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
    }
  }
} 
//get input values in case of error
$titleInputValue = isset($_GET['name']) ? $_GET['name'] : $db_title;
$subtitleInputValue = isset($_GET['subtitle']) ? $_GET['subtitle'] : $db_subtitle;
$descriptionInputValue = isset($_GET['description']) ? $_GET['description'] : $db_description;
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : $db_category_id;

if(isset($_POST['submit'])) {
  $title = escape($_POST['title']);
  $subtitle = escape($_POST['subtitle']);
  $description = escape($_POST['description']);
  $categoryId = escape($_POST['category_select']);
  
  $titleError = "";

  //check if title field is empty
  if(empty($title)){
    $titleError .= "&nameErr=required";
  }

  $error_msg = $titleError;

  if(!empty($error_msg)){
    header("Location: projects.php?source=edit_project&id=$project_id&failed=true$error_msg&name=$title&subtitle=$subtitle&description=$description&category=$categoryId");
  }else{
    editProject($title, $subtitle, $description, $categoryId, $db_id);

    header("Location: projects.php");
    exit();
  }
}
?>

<?php $page_title = "Edit project"; ?>
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
              <textarea id="body" name="description">
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
        <input type="submit" value="Save project" name="submit" id="submit"
          class="btn btn-success float-right">
      </div>
    </div>
  </form>
</section>
<!-- /.content -->