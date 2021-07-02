<!DOCTYPE html>
<html lang="en">

<head>
    <title>SBUB</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url('assets/undip.png');?>" type="image/x-icon'">

    <!-- prism css -->
    <link rel="stylesheet" href="<?= base_url('assets/main/css/plugins/prism-coy.css');?>">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url('assets/main/css/style.css');?>">
    
    

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
        <div class="navbar-wrapper container">
            <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Mhs');?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Mhs/pribadi');?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Data Pribadi</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Mhs/akademik');?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Data Akdaemik</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="container">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="<?= base_url('assets/undip.png');?>" alt="" class="logo" width="37" height="44">
                    &nbsp; Sistem Informasi 
                </a>
                <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
            </div>
            <div class="collapse navbar-collapse" style="background-color:#4680ff">
                
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-user-circle fa-fw" style="color:white"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                            
                                </div>
                                <ul class="pro-body">
                                    <li><a href="<?= base_url('Welcome/changePass');?>" class="dropdown-item"><i class="feather icon-lock"></i> Ganti Password</a></li>
                                    <li><a href="<?= base_url('welcome/logout');?>" class="dropdown-item"><i class="feather icon-power"></i> Keluar</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->