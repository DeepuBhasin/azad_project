<?php include_once('header.php'); ?>



<!-- contact section 
			================================================== -->
<section class="contact-section">
	<div class="container">
		<div class="col-md-4">
			<div class="contact-info">
				<h2>Contact Info</h2>
				<p><?= $contactPageData['contact_info'] ?></p>
				<ul class="information-list">
					<li><i class="fa fa-map-marker"></i><span><?= nl2br($contactPageData['address']); ?></span></li>
					<li><i class="fa fa-phone"></i><span> <?= $pageData['phone1'] ?></span> <?= isset($pageData['phone2']) ? '<span>' . $pageData['phone2'] : '</span>'; ?></li>


					<li><i class="fa fa-envelope-o"></i><a href="mailto:<?= $pageData['email'] ?>"><?= $pageData['email'] ?></a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-8">
			<?php include_once('message.php'); ?>
			<form id="contact-form" action="<?= base_url('contact') ?>" method="POST">
				<h2>Send us a message</h2>
				<div class="row">
					<div class="col-md-12">
						<input name="name" id="name" type="text" placeholder="Please Enter Name *" required>

						<input name="email" id="email" type="text" placeholder="Please Enter Email *" required>

						<input name="phone" id="phone" type="text" placeholder="Please Enter Phone *" required>

						<textarea name="message" id="message" placeholder="Please Enter Message *" required></textarea>
						<input type="submit" name="send" value="Send Message">
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- End contact section -->
<?php include_once('footer.php'); ?>