<?php include "includes/header.php"; ?>
<div class="wrapper">

  <?php include "includes/top_navbar.php"; ?>
  <?php include "includes/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">

          <form action="upload_page_fotos.php" class="dropzone" id="dropzoneFrom" method="POST">
            <div class="dz-message">
              Drop files here or click to upload
            </div>
            <input type="hidden" name="post_id" id="post_id" value="5">
            <input type="hidden" name="fotos_for" id="fotos_for" value="page">

          </form>

          <div id="preview" class="dropzone-previews"></div>

          <div class="col-12">
            <a href="javascript:history.back(1)" class="btn btn-success btn-block">DONE</a>
          </div>
          <!-- card body -->
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<?php include "includes/footer.php"; ?>