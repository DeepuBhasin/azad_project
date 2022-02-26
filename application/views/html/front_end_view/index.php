<!doctype html>


<html lang="en" class="no-js">

<head>
	<title><?= $title ?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/bootstrap.min.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/jquery.bxslider.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/owl.carousel.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/owl.theme.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/font-awesome.css'); ?>" media="screen">
	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/settings.css" '); ?>media=" screen" />
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
                        <a class="navbar-brand" href="<?= base_url('home') ?>"><img src="<?= public_front_end_path('images/logo.png'); ?>" alt="" width="70"></a>
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

		<!-- home-section 
			================================================== -->
		<section id="home-section" class="slider1">

			<!--
			#################################
				- THEMEPUNCH BANNER -
			#################################
			-->
			<div class="tp-banner-container">
				<div class="tp-banner">
					<ul>
						<!-- SLIDE  -->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
							<!-- MAIN IMAGE -->
							<img src="<?= public_front_end_path('upload/slide/1.jpg'); ?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
							<!-- LAYERS -->

							<!-- LAYER NR. 1 -->
							<div class="tp-caption lft tp-resizeme rs-parallaxlevel-0" data-x="200" data-y="190" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-top corner-border"></span>
							</div>

							<!-- LAYER NR. 2 -->
							<div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0" data-x="200" data-y="330" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-bottom corner-border"></span>
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption lft tp-resizeme rs-parallaxlevel-0" data-x="900" data-y="190" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-top corner-border"></span>
							</div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0" data-x="900" data-y="330" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-bottom corner-border"></span>
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0" data-x="335" data-y="270" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">Great
								Construction
							</div>

						</li>

						<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
							<!-- MAIN IMAGE -->
							<img src="<?= public_front_end_path('upload/slide/2.jpg'); ?>" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
							<!-- LAYERS -->

							<!-- LAYER NR. 1 -->
							<div class="tp-caption lft tp-resizeme rs-parallaxlevel-0" data-x="200" data-y="190" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-top corner-border"></span>
							</div>

							<!-- LAYER NR. 2 -->
							<div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0" data-x="200" data-y="330" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-bottom corner-border"></span>
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption lft tp-resizeme rs-parallaxlevel-0" data-x="900" data-y="190" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-top corner-border"></span>
							</div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0" data-x="900" data-y="330" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-bottom corner-border"></span>
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0" data-x="340" data-y="270" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">Believe your
								dream
							</div>
						</li>
						<!-- SLIDE  -->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on" data-title="Parallax 3D">
							<!-- MAIN IMAGE -->
							<img src="<?= public_front_end_path('upload/slide/3.jpg'); ?>" alt="3dbg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
							<!-- LAYERS -->

							<!-- LAYER NR. 1 -->
							<div class="tp-caption lft tp-resizeme rs-parallaxlevel-0" data-x="200" data-y="190" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-top corner-border"></span>
							</div>

							<!-- LAYER NR. 2 -->
							<div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0" data-x="200" data-y="330" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="left-bottom corner-border"></span>
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption lft tp-resizeme rs-parallaxlevel-0" data-x="900" data-y="190" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-top corner-border"></span>
							</div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0" data-x="900" data-y="330" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><span class="right-bottom corner-border"></span>
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption finewide_medium_white lft tp-resizeme rs-parallaxlevel-0" data-x="345" data-y="270" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">We have
								tradition
							</div>
						</li>
					</ul>
					<div class="tp-bannertimer"></div>
				</div>
			</div>
		</section>
		<!-- End home section -->


		<!-- services-section 
			================================================== -->
		<section class="services-section">
			<div class="container">
				<div class="services-box">
					<div class="row">

						<div class="col-md-3">
							<div class="services-post">
								<img src="<?= public_front_end_path('upload/others/5.jpg'); ?>" alt="">
								<div class="services-content">
									<h2>Elegant Garden</h2>
									<p>Aenean sed justo tincidunt, vulputate nisi sit amet, rutrum ligula. Pellentesque
										dictum aliquam ornare. Sed elit lectus.</p>
									<a href="garden.html">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="services-post">
								<img src="<?= public_front_end_path('upload/others/2.jpg'); ?>" alt="">
								<div class="services-content">
									<h2>Small &amp; Large Building</h2>
									<p>Aenean sed justo tincidunt, vulputate nisi sit amet, rutrum ligula. Pellentesque
										dictum aliquam ornare. Sed elit lectus.</p>
									<a href="buildings.html">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="services-post">
								<img src="<?= public_front_end_path('upload/others/3.jpg'); ?>" alt="">
								<div class="services-content">
									<h2>Perfect Plans &amp; Projecting</h2>
									<p>Aenean sed justo tincidunt, vulputate nisi sit amet, rutrum ligula. Pellentesque
										dictum aliquam ornare. Sed elit lectus.</p>
									<a href="projecting.html">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="services-post">
								<img src="<?= public_front_end_path('upload/others/4.jpg'); ?>" alt="">
								<div class="services-content">
									<h2>Electricy installation</h2>
									<p>Aenean sed justo tincidunt, vulputate nisi sit amet, rutrum ligula. Pellentesque
										dictum aliquam ornare. Sed elit lectus.</p>
									<a href="projecting.html">Read More <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</section>
		<!-- End services section -->



		<!-- tabs-section 
			================================================== -->
		<section class="tabs-section">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="about-us-box">
							<h1 class="text-center">about us and our priorities</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.
							</p>
							<div class="row">
								<div class="col-md-4">
									<div class="about-us-post">
										<a href="#"><i class="fa fa-building-o"></i></a>
										<h2>Construction</h2>
										<span>build homes</span>
									</div>
									<div class="about-us-post">
										<a href="#"><i class="fa fa-cogs"></i></a>
										<h2>Maintanance</h2>
										<span>energy repair</span>
									</div>
								</div>
								<div class="col-md-4">
								<div class="about-us-post">
										<a href="#"><i class="fa fa-desktop"></i></a>
										<h2>Good Planning</h2>
										<span>architecture</span>
									</div>
									<div class="about-us-post">
										<a href="#"><i class="fa fa-desktop"></i></a>
										<h2>Good Planning</h2>
										<span>architecture</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="about-us-post">
										<a href="#"><i class="fa fa-users"></i></a>
										<h2>Awesome Stuff</h2>
										<span>1000+ workers</span>
									</div>
									<div class="about-us-post">
										<a href="#"><i class="fa fa-building-o"></i></a>
										<h2>Construction</h2>
										<span>build homes</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End tabs section -->

		<!-- news-section 
			================================================== -->
		<section class="news-section">
			<div class="container">

				<div class="news-box owl-wrapper">
					<div class="owl-carousel" data-num="4">

						<div class="item news-post">
							<div class="news-gallery">
								<img src="<?= public_front_end_path('upload/blog/news1.jpg'); ?>" alt="">
								<div class="date-post">
									<p>June <span>15</span></p>
								</div>
							</div>
							<div class="news-content">
								<h2><a href="single-post.html">Our News post 1</a></h2>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
								<a href="single-post.html">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div>

						<div class="item news-post">
							<div class="news-gallery">
								<img src="<?= public_front_end_path('upload/blog/news2.jpg'); ?>" alt="">
								<div class="date-post">
									<p>June <span>17</span></p>
								</div>
							</div>
							<div class="news-content">
								<h2><a href="single-post.html">Our News post 2</a></h2>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
								<a href="single-post.html">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div>

						<div class="item news-post">
							<div class="news-gallery">
								<img src="<?= public_front_end_path('upload/blog/news3.jpg'); ?>" alt="">
								<div class="date-post">
									<p>June <span>20</span></p>
								</div>
							</div>
							<div class="news-content">
								<h2><a href="single-post.html">Our News post 3</a></h2>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
								<a href="single-post.html">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div>

						<div class="item news-post">
							<div class="news-gallery">
								<img src="<?= public_front_end_path('upload/blog/news1.jpg'); ?>" alt="">
								<div class="date-post">
									<p>July <span>15</span></p>
								</div>
							</div>
							<div class="news-content">
								<h2><a href="single-post.html">Our News post 4</a></h2>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
								<a href="single-post.html">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div>

						<div class="item news-post">
							<div class="news-gallery">
								<img src="<?= public_front_end_path('upload/blog/news2.jpg'); ?>" alt="">
								<div class="date-post">
									<p>July <span>15</span></p>
								</div>
							</div>
							<div class="news-content">
								<h2><a href="single-post.html">Our News post 5</a></h2>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur..</p>
								<a href="single-post.html">Read More <i class="fa fa-angle-right"></i></a>
							</div>
						</div>

					</div>
				</div>

			</div>
		</section>
		<!-- End news section -->

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
	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.bxslider.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/owl.carousel.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.imagesloaded.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/retina-1.1.0.min.js'); ?>"></script>
	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.themepunch.tools.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/jquery.themepunch.revolution.min.js'); ?>"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/gmap3.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= public_front_end_path('js/script.js'); ?>"></script>


	<!-- Revolution slider -->
	<script type="text/javascript">
		jQuery(document).ready(function() {

			jQuery('.tp-banner').show().revolution({
				dottedOverlay: "none",
				delay: 10000,
				startwidth: 1140,
				startheight: 570,
				hideThumbs: 200,

				thumbWidth: 100,
				thumbHeight: 50,
				thumbAmount: 5,

				navigationType: "none",
				navigationArrows: "",

				touchenabled: "on",
				onHoverStop: "off",

				swipe_velocity: 0.7,
				swipe_min_touches: 1,
				swipe_max_touches: 1,
				drag_block_vertical: false,

				parallax: "mouse",
				parallaxBgFreeze: "on",
				parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

				keyboardNavigation: "off",

				navigationHAlign: "center",
				navigationVAlign: "bottom",
				navigationHOffset: 0,
				navigationVOffset: 60,

				shadow: 0,

				spinner: "spinner4",

				stopLoop: "off",
				stopAfterLoops: -1,
				stopAtSlide: -1,

				shuffle: "off",

				autoHeight: "off",
				forceFullWidth: "off",



				hideThumbsOnMobile: "off",
				hideNavDelayOnMobile: 1500,
				hideBulletsOnMobile: "off",
				hideArrowsOnMobile: "off",
				hideThumbsUnderResolution: 0,

				hideSliderAtLimit: 0,
				hideCaptionAtLimit: 0,
				hideAllCaptionAtLilmit: 0,
				startWithSlide: 0,
				fullScreenOffsetContainer: ".header"
			});

		});
	</script>
</body>

</html>