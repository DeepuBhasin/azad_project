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
                                <li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
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
                    <li><a href="<?= base_url('footerdiv') ?>"><i class="fa fa-dashboard"></i><span>Footer Div</span></a></li>
                    <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Footer</span><i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="bootstrap-components.html"><i class="fa fa-circle-o"></i> Bootstrap Elements</a></li>
                            <li><a href="http://fontawesome.io/icons/" target="_blank"><i class="fa fa-circle-o"></i> Font Icons</a></li>
                            <li><a href="ui-cards.html"><i class="fa fa-circle-o"></i> Cards</a></li>
                            <li><a href="widgets.html"><i class="fa fa-circle-o"></i> Widgets</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Forms</span><i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="form-components.html"><i class="fa fa-circle-o"></i> Form Components</a></li>
                            <li><a href="form-custom.html"><i class="fa fa-circle-o"></i> Custom Components</a></li>
                            <li><a href="form-samples.html"><i class="fa fa-circle-o"></i> Form Samples</a></li>
                            <li><a href="form-notifications.html"><i class="fa fa-circle-o"></i> Form Notifications</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Tables</span><i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="table-basic.html"><i class="fa fa-circle-o"></i> Basic Tables</a></li>
                            <li><a href="table-data-table.html"><i class="fa fa-circle-o"></i> Data Tables</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="#"><i class="fa fa-file-text"></i><span>Pages</span><i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                            <li><a href="page-login.html"><i class="fa fa-circle-o"></i> Login Page</a></li>
                            <li><a href="page-lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen Page</a></li>
                            <li><a href="page-user.html"><i class="fa fa-circle-o"></i> User Page</a></li>
                            <li><a href="page-invoice.html"><i class="fa fa-circle-o"></i> Invoice Page</a></li>
                            <li><a href="page-calendar.html"><i class="fa fa-circle-o"></i> Calendar Page</a></li>
                            <li><a href="page-mailbox.html"><i class="fa fa-circle-o"></i> Mailbox</a></li>
                            <li><a href="page-error.html"><i class="fa fa-circle-o"></i> Error Page</a></li>
                        </ul>
                    </li>
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