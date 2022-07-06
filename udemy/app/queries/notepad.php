<!-- SHOW IMAGE UPLOAD -->
<div class="mb-3 input-group col">
    <img src="<?= ROOT ?>/<?= esc($row->image) ?>" alt="" class="js-image-preview rounded shadow-sm" height="130" width="130">
    <div class="js-filename p-3 text-center">Selected File: none</div>
    <label class="btn btn-outline-primary btn-sm shadow-sm" title="Upload Show Picture">
        <i class="fa-solid fa-upload"></i>
        <input onchange="upload_show_image(this.file[0])" type="file" name="image" class="js-image-upload-input d-none">

    </label>
    <label for="image" class="form-label p-2">Show Image</label>
    <button type='button' class="js-upload-cancel-button btn btn-sm btn-outline-warning m-3 p-2 ">Cancel Upload</button>
    <!-- Progress Bar -->
    <div class="js-prog progress m-2 ">
        <div class="progress-bar progress-bar-image p-2" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
    </div>
    <!-- END Progress Bar -->
    <?php if (!empty($errors['image'])) : ?>
        <div class="text-danger"><?= $errors['image'] ?></div>
    <?php endif; ?>
</div>
<!-- END SHOW IMAGE UPLOAD -->


<!-- SHOW IMAGE UPLOADER -->
<div class="mb-3 input-group">
    <img src="<?= ROOT ?>/assets/img/no_image.png" alt="" width="400" class="js-image-preview rounded shadow-sm">
    <div class="js-filename p-3 text-center">Selected File: none</div>
    <label for="imagePath" class="form-label">Show Image</label>
    <input onchange="load_image(this.files[0])" class="form-control <?= !empty($errors['image']) ? 'border-danger' : 'border'; ?>" type="file" id="imagePath" name="imagePath" value="<?= set_value('image') ?>">
    <?php if (!empty($errors['imagePath'])) : ?>
        <div class="text-danger"><?= $errors['imagePath'] ?></div>
    <?php endif; ?>
    <!-- Progress Bar -->
    <div class="js-prog progress m-2 d-none">
        <div class="progress-bar" role="progressbar" style="width: 75%"></div>
    </div>
</div>
<!-- END SHOW IMAGE UPLOADER -->