<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title><?= $message ?></title>
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="assets/css/stylish-portfolio.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
   
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?= base_url('/main/login') ?>">
                    <i class="fa fa-play-circle"></i>  <span class="light">Iniciar</span> 
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                       
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <a href="<?= base_url('/main/login') ?>" class="btn btn-circle">Iniciar
                                            </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p> Sandro Oliveira Dorneles</p>
        </div>
    </footer>

   

 
	<!--	<div class="container>">
			<div class="page-header">
            	<img src="<?php echo base_url() . 'topo1.png' ?>" class="img-responsive">
    		</div>
    	</div>	

	<div class="col-md-12"><a class="btn btn-primary btn-xl page-scroll btn-block"<a href="<?= base_url('/main/login') ?>">Login</a></div>
	-->

	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
</body>
</html>