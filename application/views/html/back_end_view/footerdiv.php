<?php include_once('header.php') ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('footerdiv') ?>" method="POST">
          <?php include_once('message.php'); ?>
          <div class="form-group">
            <label class="control-label">Short About us *</label>
            <textarea name="aboutUs" class="form-control" rows="4" placeholder="EnterS Short About us *" required><?= $pageData['about_us'] ?> </textarea>
          </div>
          <div class="form-group">
            <label class="control-label">Tags *</label>
            <input name="tags" class="form-control" type="text" placeholder="Enter Tags with comma separation" required value="<?= $pageData['tags']; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">Phone 1 *</label>
            <input name="phone1" class="form-control" type="text" placeholder="Enter Phone 1 *" required value="<?= $pageData['phone1']; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">Phone 2 </label>
            <input name="phone2" class="form-control" type="text" placeholder="Enter Phone 2" value="<?= $pageData['phone2']; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">Email *</label>
            <input name="email" class="form-control" type="email" placeholder="Enter email *" required value="<?= $pageData['email']; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">Working Hours</label>
            <input name="workingHours" class="form-control" type="text" placeholder="Enter Working Hours *" required value="<?= $pageData['working_hours']; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">Copy Right</label>
            <input name="copyright" class="form-control" type="text" placeholder="Enter Copy Right *" required value="<?= $pageData['copyright']; ?>">
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