<?php include_once('header.php') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('changepassword'); ?>" method="POST" onsubmit="return checkConfirmPassword();">
                    <?php include_once('message.php'); ?>
                    <div class="form-group">
                        <label class="control-label">Old Passowrd *</label>
                        <input name="old_password" class="form-control" type="password" placeholder="Old Password *" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">New Password *</label>
                        <input name="new_password" id="newPassword" class="form-control" type="password" placeholder="New Password *" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password * </label>
                        <input name="confirm_password" id="confirmPassword" class="form-control" type="password" placeholder="Confirm Password *">
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary icon-btn" type="submit" name="change"><i class="fa fa-fw fa-lg fa-check-circle"></i>Chnage</button>
                        <button class="btn btn-danger icon-btn" type="reset"><i class="fa fa-fw fa-lg fa-times"></i>Clear</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
<script>
    function checkConfirmPassword() {
        let new_password = document.getElementById('newPassword');
        let confirm_password = document.getElementById('confirmPassword');

        if (new_password.value !== confirm_password.value) {
            alert('Password and Confirm Password not matched');
            new_password.value = '';
            confirm_password.value = '';
            return false;
        } else {
            return true;
        }
    }
</script>
<?php include_once('close_html_footer.php') ?>