<?php 
    if(isset($_GET['id'])) {
        $category_id = escape($_GET['id']);
    }

    //get photo 
    $query = "SELECT * FROM categories WHERE id = '{$category_id}'";
    $select_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_by_id)) {
        $bg_image = !empty($row['bg_image']) ? $row['bg_image'] : "";
    }

    if(isset($_POST['update'])) {
   
        //Upload new images
        if($_FILES['bg_image']['name'] !== ""){
            //delete old image
            deleteFileFromRow('categories', 'bg_image', $category_id, "../img/architecture/");
            //upload new image to folder
            $imageName = uploadFile($_FILES['bg_image'], "../img/architecture/");
            //update db
            updateDbImage("categories", "bg_image", $imageName, $category_id);
            header("Location: categories.php");
            exit();
        }

        header("Location: categories.php?source=edit_category&id={$category_id}");
        exit();
    }
?>

<br><h2>Change Category Photo</h2><br>
<form action="" method="post" enctype="multipart/form-data">    

    <img class="edit-photo-img" src="../img/architecture/<?php echo $bg_image; ?>">

    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="bg_image" id="customFile">
            <label class="custom-file-label" for="customFile">Choose new image</label>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
          <a href="javascript:history.back(1)" class="btn btn-secondary">Cancel</a>
          <input onclick="return confirm('Update category image?')" type="submit" value="Update image" name="update" class="btn btn-success float-right">
        </div>
      </div>
</form>