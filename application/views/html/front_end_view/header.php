<!doctype html>


<html lang="en" class="no-js">

<head>
    <title><?= $title ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/bootstrap.min.css'); ?>" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= public_front_end_path('css/font-awesome.css'); ?>" media="screen">
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
                        <a class="navbar-brand" href="<?= base_url('home') ?>"><img src="<?= public_front_end_path('images/logo.png'); ?>" alt=""></a>
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