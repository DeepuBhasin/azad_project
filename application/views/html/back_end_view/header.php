<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?= public_back_end_path('css/main.css'); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title ?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <!-- Navbar-->
        <header class="main-header hidden-print"><a class="logo" href="<?= base_url('backend_controller/dashboard'); ?>">
                Admin Panel
            </a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
                <!-- Navbar Right Menu-->
                <div class="navbar-custom-menu">
                    <ul class="top-nav">
                        <!-- User Menu-->
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i> <?= $admin_name; ?> </a>
                            <ul class="dropdown-menu settings-menu">
                                <li><a href="<?= base_url('changepassword'); ?>"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
                                <li><a href="<?= base_url('backend_controller/logout'); ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Side-Nav-->
        <aside class="main-sidebar hidden-print">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image"><img class="img-circle" src="<?= public_back_end_path('images/user.png'); ?>" alt="User Image"></div>
                    <div class="pull-left info">
                        <p>Hello <?= $admin_name; ?></p>

                    </div>
                </div>
                <!-- Sidebar Menu-->


                <ul class="sidebar-menu">
                    <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="<?= base_url('homepage') ?>"><i class="fa fa-book"></i><span>Home Page</span></a></li>
                    <li class="treeview"><a href="#"><i class="fa fa-bookmark"></i><span>Projects</span><i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('addproject') ?>"><i class="fa fa-circle-o"></i> Add Project</a></li>
                            <li><a href="<?= base_url('viewproject') ?>"><i class="fa fa-circle-o"></i> View Project</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('aboutpage') ?>"><i class="fa fa-clone"></i><span>About US Page</span></a></li>
                    <li><a href="<?= base_url('contactpage') ?>"><i class="fa fa-phone"></i><span>Contact Page</span></a></li>
                    <li><a href="<?= base_url('footerdiv') ?>"><i class="fa fa-copy"></i><span>Footer Div & Header Div</span></a></li>
                    <li><a href="<?= base_url();?>"><i class="fa fa-globe"></i><span>Website</span></a></li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1><i class="fa fa-dashboard"></i> <?= $breadcrumbs ?></h1>
                </div>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="<?= base_url('backend_controller/dashboard') ?>"><i class="fa fa-home fa-lg"></i> Home </a>
                        </li>
                        <li><?= $breadcrumbs ?></li>
                    </ul>
                </div>
            </div>