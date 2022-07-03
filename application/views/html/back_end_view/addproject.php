	<?php include_once('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('addproject') ?>" method="POST" enctype="multipart/form-data">
						<?php include_once('message.php'); ?>
						<div class="form-group">
							<label class="control-label">Project Title *</label>
							<input name="project_title" class="form-control" type="text" placeholder="Enter Project title *" required>
						</div>
						<div class="form-group">
							<label class="control-label">Project Category *</label>
							<select name="category" class="form-control" name="category" required id="demoSelect">
								<option value="">Select Category</option>
								<?php foreach ($projectCategory as $key => $value) : ?>
									<option value="<?= $value['id']; ?>"><?= ucfirst($value['name']); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Main Image 1 *</label>
							<input name="main_image_1" class="form-control" type="file" required accept="image/jpeg" />
						</div>
						<div class="form-group">
							<label class="control-label">Main Image 2 *</label>
							<input name="main_image_2" class="form-control" type="file" required accept="image/jpeg" />
						</div>
						<div class="form-group">
							<label class="control-label">Slide Shows *</label>
							<input name="slide_shows[]" class="form-control" type="file" required="" multiple="" accept="image/png, image/gif, image/jpeg" />
						</div>
						<div class="form-group">
							<label class="control-label">Description </label>
							<textarea name="description" class="form-control" rows="4" placeholder="Enter Description *" required></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Poject Completion Date *</label>
							<input name="project_date" class="form-control" id="demoDate" type="text" placeholder="Enter Poject Completion Date *" required>
						</div>
						<div class="form-group">
							<label class="control-label">Location *</label>
							<input name="location" class="form-control" type="text" placeholder="Enter Location  *" required>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary icon-btn" type="submit" name="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
							<button class="btn btn-danger icon-btn" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Clear</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
	<?php include_once('datatime_footer.php') ?>
	<?php include_once('close_html_footer.php') ?>