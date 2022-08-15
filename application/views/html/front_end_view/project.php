<?php include_once('header.php'); ?>

<!-- portfolio-section 
			================================================== -->
<section class=" portfolio-section">
	<div class="container">
		<div class="portfolio-box iso-call">

			<?php foreach ($projectPageData as $key => $value) : ?>
				<div class="project-post interior">
					<div class="project-gallery">
						<img src="<?= public_front_end_path('upload/projects/' . $value['main_image_1']); ?>" alt="<?= $value['title']; ?>">
						<div class="hover-box">
							<div class="inner-hover">
								<h2><a href="<?= base_url('project/' . $value['id']); ?>" title="<?= $value['title'] ?>"><?= $value['title'] ?></a></h2>
								<span><?= ucfirst($value['name']); ?></span>
							</div>
						</div>
						
					</div>
					<a href="<?= base_url('project/' . $value['id']); ?>" title="<?= $value['title'] ?>"><h6 style="color:#000; text-transform: uppercase; text-align:center;"><?= $value['title'] ?></h6></a>
				</div>
			<?php endforeach; ?>

		</div>

	</div>
</section>
<!-- End portfolio section -->
<?php include_once('footer.php'); ?>