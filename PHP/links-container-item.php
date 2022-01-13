<a href="<?php echo $link_to ?>" class="opacity-full">
    <div class="links-container-item">
        <?php if(!empty($bg_image)) { ?>
            <img src="img/<?php echo $bg_image_folder ?>/<?php echo $bg_image ?>" alt="" class="bg-image">
            <div class="overlay"> </div>
        <?php } ?>

        <?php if(!empty($name)) { ?>
            <p><?php echo $name ?></p>
        <?php } ?>
    </div>
</a>