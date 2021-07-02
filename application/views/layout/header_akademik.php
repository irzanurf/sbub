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
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header" style="height : 150px;">
                        <?php if(empty($profile->profile)): ?>
                        <img src="<?= base_url('assets/profile.png');?>" alt="profile" width="50" height="60"/>
                        <?php else : ?>
                        <img class="img-radius" src="<?= base_url('assets/fotoProfile');?>/<?=$profile->profile?>" alt="profile" width="47" height="70"/>
                        <?php endif; ?>
				    
                        <div class="user-details text-center">
							<div id="more-details"><?= $profile->nama ?></div><br>
						</div>
                    </div>
                </div>    
				<ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-hasmenu active">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Menu Utama</span></a>
					    
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('Mhs');?>"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a></li>
					        <li><a href="<?= base_url('Mhs/pribadi');?>"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Data Pribadi</span></a></li>
                            <li><a href="<?= base_url('Mhs/akademik');?>"><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Data AKademik</span></a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Semester</label>&nbsp;&nbsp;
                        <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda yakin ingin menambah semester? Setelah semester ditambahkan, semester tidak akan dapat dihapus');" action="<?= base_url('Mhs/tambah_semester');?>">
                                                <button type="Submit" class="btn btn-icon btn-outline-primary has-ripple" style="width:20px; height:20px;" data-toggle="tooltip" data-placement="bottom" title="Tambah Semester">
                                                <i class="fas fa-fw fa-plus" style="font-size:10px;"></i>
                                                </button>
                                                </form>
					</li>
                    <?php
                        foreach($semester as $s) {
                    ?>
					<li class="nav-item">
					    <a href="<?= base_url('Mhs/akademik_semester');?>/<?=$s->semester?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Semester <?=$s->semester?> </span></a>
					</li>
                    <?php } ?>
				</ul>
                
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
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
        
    
</header>
<!-- [ Header ] end -->

 <!-- [ Main Content ] start -->
 <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ horizontal-layout ] start -->
                                    <div class="col-sm-4">
                                        <div class="card text-white bg-info ">
                                           
                                            <div class="card-body text-center">
                                            <a href="<?= base_url('Mhs');?>" class="btn btn-primary-outline"><img src="<?= base_url('assets/home.png');?>" alt="attach" width="120" height="120"/></a>
                                            <h5 class="card-title text-white">Dashboard</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card text-white bg-success ">
                                            <div class="card-body text-center">
                                            <a href="<?= base_url('Mhs/pribadi');?>" class="btn btn-primary-outline"><img src="<?= base_url('assets/user.png');?>" alt="attach" width="110" height="120"/></a>
                                            <h5 class="card-title text-white">Data Pribadi</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card text-white bg-warning ">
                                            <div class="card-body text-center">
                                            <a href="<?= base_url('Mhs/akademik');?>" class="btn btn-primary-outline"><img src="<?= base_url('assets/cap.png');?>" alt="attach" width="120" height="120"/></a>
                                            <h5 class="card-title text-white">Data Akademik</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <!-- [ horizontal-layout ] end -->
                            </div>
                            <!-- [ Main Content ] end -->