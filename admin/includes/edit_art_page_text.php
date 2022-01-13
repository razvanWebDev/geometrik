<?php
$page_id = 3;
//get data
$query = "SELECT * FROM simple_pages_text WHERE id={$page_id} ORDER BY id LIMIT 1";
$result = mysqli_query($connection, $query);
$db_id = $db_title = $db_subtitle = $db_description = $db_category_id = "";
while ($row = mysqli_fetch_assoc($result)) {
  $db_title = (!empty($row['title']) ? $row['title'] : "");
  $db_subtitle = (!empty($row['subtitle']) ? $row['subtitle'] : "");
  $db_description = (!empty($row['description']) ? $row['description'] : ""); 
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

if(isset($_POST['submit'])) {
  $title = escape($_POST['title']);
  $subtitle = escape($_POST['subtitle']);
  $description = stripslashes($_POST['description']);
  
  $titleError = "";

  //check if title field is empty
  if(empty($title)){
    $titleError .= "&nameErr=required";
  }

  $error_msg = $titleError;

  if(!empty($error_msg)){
    header("Location: art_page_text.php?source=edit_art_page_text&failed=true$error_msg&name=$title&subtitle=$subtitle&description=$description");
  }else{
    editSimplePageText($title, $subtitle, $description, $page_id);
    header("Location: art_page_text.php");
    exit();
  }
}
?>

<?php $page_title = "Edit Art and Instalations page text"; ?>
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
              <label for="title">Title*</label>
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
              <label for="description">Description</label>
              <textarea id="summernote" name="description">
                    <?php echo $descriptionInputValue ?>
                </textarea>
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
        <input type="submit" value="Save" name="submit" id="submit"
          class="btn btn-success float-right">
      </div>
    </div>
  </form>
</section>
<!-- /.content -->