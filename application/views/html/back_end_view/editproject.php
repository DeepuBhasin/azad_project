	<?php include_once('header.php') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('editsave'); ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $pageData['id']; ?>">
						<?php include_once('message.php'); ?>
						<div class="form-group">
							<label class="control-label">Project Title *</label>
							<input name="project_title" class="form-control" type="text" placeholder="Enter Project title *" required value="<?= $pageData['title'] ?>">
						</div>
						<div class="form-group">
							<label class="control-label">Project Category *</label>
							<select name="category" class="form-control" name="category" required id="demoSelect">
								<option value="">Select Category</option>
								<?php foreach ($projectCategory as $key => $value) : ?>
									<option value="<?= $value['id']; ?>" <?= ($pageData['category'] == $value['id']) ? 'SELECTED' : ''; ?>><?= ucfirst($value['name']); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Main Image 1 *</label>
							<div class="row">
								<div class="col-sm-6">
									<input name="main_image_1" class="form-control" type="file" accept="image/png, image/gif, image/jpeg" />
								</div>
								<div class="col-sm-6">
									<img src=" <?= public_front_end_path('/upload/projects/' . $pageData['main_image_1']); ?>" alt="<?= $pageData['main_image_1'] ?>" class="img-thumbnail " width="80" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Main Image 2 *</label>
								<div class="row">
									<div class="col-sm-6">
										<input name="main_image_2" class="form-control" type="file" accept="image/png, image/gif, image/jpeg" />
									</div>
									<div class="col-sm-6">
										<img src=" <?= public_front_end_path('/upload/projects/' . $pageData['main_image_2']); ?>" alt="<?= $pageData['main_image_1'] ?>" class="img-thumbnail " width="80" />
									</div>
								</div>

							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<label class="control-label">Slide Shows *</label>
										<input name="slide_shows[]" class="form-control" type="file"="" multiple="" accept=" image/png, image/gif, image/jpeg" />
									</div>
									<div class="col-sm-6">
										<?php
										$arrayImages = explode(',', $pageData['slide_show_images']);

										foreach ($arrayImages as $key => $value) :
										?>
											<img src=" <?= public_front_end_path('/upload/projects/' . $value); ?>" alt="<?= $value ?>" class="img-thumbnail " width="80" />
										<?php endforeach; ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Description </label>
									<textarea name="description" class="form-control" rows="4" placeholder="Enter Description *" required><?= $pageData['description']; ?></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Poject Completion Date *</label>
									<input name="project_date" class="form-control" id="demoDate" type="text" placeholder="Enter Poject Completion Date *" required value="<?= date('Y-m-d', strtotime($pageData['project_date'])); ?>">
								</div>
								<div class="form-group">
									<label class="control-label">Location *</label>
									<input name="location" class="form-control" type="text" placeholder="Enter Location  *" required value="<?= $pageData['location']; ?>">
								</div>
								<div class="form-group">
									<label class="control-label">Dashboard status *</label>
									<select name="dashboard_status" id="dashboard_status" class="form-control" required>
										<option value="">Select Status</option>
										<option <?php if ($pageData['dashboard_status'] == 0) {
													echo "SELECTED";
												} ?> value="0">No</option>
										<option <?php if ($pageData['dashboard_status'] == 1) {
													echo "SELECTED";
												} ?> value="1">Yes</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Visibile status *</label>
									<select name="visibile_status" id="visibile_status" class="form-control" required>
										<option value="">Select Status</option>
										<option <?php if ($pageData['visibile_status'] == 0) {
													echo "SELECTED";
												} ?> value="0">Inactive</option>
										<option <?php if ($pageData['visibile_status'] == 1) {
													echo "SELECTED";
												} ?> value="1">Active</option>
									</select>
								</div>

								<div class="card-footer">
									<button class="btn btn-primary icon-btn" type="submit" name="update"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
								</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
	<?php include_once('datatime_footer.php') ?>
	<?php include_once('close_html_footer.php') ?>