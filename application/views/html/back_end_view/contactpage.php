<?php include_once('header.php') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('contactpage') ?>" method="POST">
					<?php include_once('message.php'); ?>
					<div class="form-group">
						<label class="control-label">Contact Information *</label>
						<input name="contact_info" class="form-control" type="text" placeholder="Enter Contact Information *" required value="<?= $pageData['contact_info']; ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Address</label>
						<textarea name="address" class="form-control" rows="4" placeholder="EnterS Address *" required><?= $pageData['address'] ?> </textarea>
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