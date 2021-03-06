<?php  
  if(isset($_GET['project_id'])){
    $post_id = escape($_GET['project_id']);
  }
  
  $page_title = "Manage Photos"; 
  include "includes/page_title.php";
?>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body">

      <form action="upload_project_fotos.php" class="dropzone" id="dropzoneFrom" method="POST">
        <div class="dz-message">
          Drop files here or click to upload
        </div>
        <input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id ?>">
        <input type="hidden" name="fotos_for" id="fotos_for" value="project">
      </form>

      <div id="preview" class="dropzone-previews"></div>

      <div class="col-12">
      <button class="btn btn-success btn-block" id="btnDone">DONE</button>
      </div>
<!-- card body -->
    </div>
  </div>
</section>