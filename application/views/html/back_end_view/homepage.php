<?php include_once('header.php') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('homepage') ?>" method="POST" enctype="multipart/form-data">
					<?php include_once('message.php'); ?>
					<div class="form-group">
						<label class="control-label">About Heading *</label>
						<input name="about_heading" class="form-control" type="text" placeholder="Enter About Heading *" required value="<?= $pageData['about_heading']; ?>">
					</div>
					<div class="form-group">
						<label class="control-label">About Description</label>
						<textarea name="about_description" class="form-control" rows="4" placeholder="Enter About Description *" required><?= $pageData['about_description']; ?> </textarea>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label class="control-label">Slide Shows * (1920x550)</label>
							<input name="slide_shows[]" class="form-control" type="file"="" multiple="" accept=" image/png, image/gif, image/jpeg" />
						</div>
						<div class="col-sm-6">
							<?php
							$arrayImages = explode(',', $pageData['slide_show_images']);

							foreach ($arrayImages as $key => $value) :
							?>
								<img src=" <?= public_front_end_path('/upload/slide/' . $value); ?>" alt="<?= $value ?>" class="img-thumbnail " width="80" />
							<?php endforeach; ?>
						</div>
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