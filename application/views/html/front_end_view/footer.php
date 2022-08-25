	<!-- footer 
			================================================== -->
	<footer>
		<div class="container">
			<div class="footer-widgets">
				<div class="row">
					<div class="col-md-4">
						<div class="widgets">
							<h2>About us</h2>
							<p><?= nl2br($pageData['about_us']); ?></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="widgets">
							<h2>Tags</h2>
							<ul class="tag-list">
								<?php
								$array = explode(',', $pageData['tags']);
								foreach ($array as $key1 => $value1) :
								?>
									<li><a href="#"><?= $value1 ?></a></li>
								<?php
								endforeach;
								?>
							</ul>
						</div>
					</div>

					<div class="col-md-4">
						<div class="widgets info-widget">
							<h2>Working Hours</h2>
							<p class="first-par">You can contact or visit us during working time.</p>
							<p><span>Tel: </span> <?= $pageData['phone1'] ?> <?= isset($pageData['phone2']) ? ', ' . $pageData['phone2'] : ''; ?></p>
							<p><span>Email: </span> <?= $pageData['email'] ?></p>
							<p><span>Working Hours: </span> <?= $pageData['working_hours'] ?></p>
							<p><span>Total Vistors : </span> <?= $totalCount ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="last-line">
			<div class="container">
				<p class="copyright">
					&copy; Copyright <?= date('Y'); ?>. <?= $pageData['copyright']; ?>
					<br />
					Design and Development by <a href="#">Deepinder Singh</a>

				</p>
			</div>
		</div>
	</footer>
	<!-- End footer -->
	</div>
	<!-- End Container -->

	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.min.js'); ?>"></script>
	<script type=" text/javascript" src="<?= public_front_end_path('js/jquery.migrate.js'); ?>"></script>
	<script type=" text/javascript" src="<?= public_front_end_path('js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.isotope.min.js'); ?>"></script>
	<script type=" text/javascript" src="<?= public_front_end_path('js/jquery.imagesloaded.min.js'); ?>"></script>
	<script type=" text/javascript" src="<?= public_front_end_path('js/retina-1.1.0.min.js'); ?>"></script>
	<script type=" text/javascript" src="<?= public_front_end_path('js/script.js'); ?>"></script>

	</body>

	</html>