<?php include_once('header.php') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('aboutpage') ?>" method="POST">
                    <?php include_once('message.php'); ?>
                    <div class="form-group">
                        <label class="control-label">About Description</label>
                        <textarea name="about_description" class="form-control" rows="4" placeholder="Enter About Description *" required><?= $pageData['about_description']; ?></textarea>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary icon-btn" type="submit" name="save"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
<?php include_once('close_html_footer.php') ?>