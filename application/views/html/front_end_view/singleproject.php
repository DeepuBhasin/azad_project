<!doctype html>


<html lang="en" class="no-js">

<head>
	<title>Construct</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/bootstrap.min.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/font-awesome.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/owl.carousel.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/owl.theme.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/style.css'); ?>" media="screen">

</head>

<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="top-line">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="info-list">
									<li>
										<i class="fa fa-phone"></i>
										Call us:
										<span><?= $pageData['phone1'] ?> <?= isset($pageData['phone2']) ? ', ' . $pageData['phone2'] : ''; ?></span>
									</li>
									<li>
										<i class="fa fa-envelope-o"></i>
										Email us:
										<span><?= $pageData['email'] ?></span>
									</li>
									<li>
										<i class="fa fa-clock-o"></i>
										working time:
										<span><?= $pageData['working_hours'] ?></span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?= base_url('home') ?>"><img src="<?= public_front_end_path('images/logo.png'); ?>" alt="" width="50"></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?= base_url('home'); ?>" title="Home">Home</a></li>
							<li><a href="<?= base_url('project'); ?>" title="Projects">Projects</a></li>
							<li><a href="<?= base_url('about'); ?>" title="About">About</a></li>
							<li><a href=" <?= base_url('contact'); ?>" title="Contact">Contact</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		<!-- End Header -->
		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1><?= $breadcrumbs ?></h1>
				<ul class="page-depth">
					<li><a href="<?= base_url('home') ?>" title="Home"> HOME</a></li>
					<li><a title="<?= $breadcrumbs; ?>"><?= strtoupper($breadcrumbs) ?></a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner section -->

		<!-- single-page section 
			================================================== -->
		<section class="single-page-section">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<img src="<?= public_front_end_path('upload/projects/compress/' . $projectPageData['main_image_1']); ?>" alt="<?= $projectPageData['title']; ?>" class="img-thumbnail">
						<img src="<?= public_front_end_path('upload/projects/compress/' . $projectPageData['main_image_2']); ?>" alt="<?= $projectPageData['title']; ?>" class="img-thumbnail">
					</div>
					<div class="col-md-5">
						<div class="project-content">
							<h2><?= strtoupper($projectPageData['title']); ?></h2>
							<p><?= nl2br($projectPageData['description']) ?></p>
							<div class="project-tags">
								<ul>
									<li><i class="fa fa-calendar"></i> <span>Date:</span> <?= date('d-m-Y', strtotime($projectPageData['project_date'])) ?></li>
									<li><i class="fa fa-map-marker"></i> <span>Location:</span> <?= $projectPageData['location'] ?></li>
									<li><i class="fa fa-usd"></i> <span>Value:</span> <?= $projectPageData['project_value'] ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End single-page section -->

		<!-- portfolio-section 
			================================================== -->
		<section class="portfolio-section">
			<div class="container">

				<div class="portfolio-box owl-wrapper">
					<div class="owl-carousel" data-num="3">
						<?php
						$arrayImages = explode(',', $projectPageData['slide_show_images']);

						foreach ($arrayImages as $key => $value) :
						?>
							<div class="item project-post">
								<div class="project-gallery">
									<img src="<?= public_front_end_path('upload/projects/compress/' . $value); ?>" alt="" class="img-thumbnail">
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>

			</div>
		</section>
		<!-- End portfolio section -->
		<!-- footer 
			================================================== -->
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
	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.migrate.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.imagesloaded.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/owl.carousel.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/retina-1.1.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/script.js'); ?>"></script>

</body>

</html>