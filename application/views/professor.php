<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $titulo ?></title>
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>



	<div class="jumbotron" style="">
            <img src="<?php echo base_url() . 'topo.png' ?>" class="img-responsive">
    </div>
	  		<div class="col-md-2"><a class="btn btn-primary btn-block" href="<?= base_url('professor/area') ?>">Area</a> </div>
	  		<div class="col-md-2"><a class="btn btn-primary btn-block"href="<?= base_url('/professor/tema') ?>">Tema</a> </div>
	  		<div class="col-md-2"><a class="btn btn-primary btn-block"href="<?= base_url('/professor/jogo') ?>">Jogo</a> </div>
	  		<div class="col-md-2"><a class="btn btn-primary btn-block"href="<?= base_url('/professor/areaavalia') ?>">Area de Avaliação</a></div>
	  		<div class="col-md-2"><a class="btn btn-primary btn-block"href="<?= base_url('/professor/desafio') ?>">Desafios</a> </div>
	  		<div class="col-md-2"><a class="btn btn-primary btn-block"href="<?= base_url('/professor/Problemas') ?>">Problemas</a> </div>
	  
   

	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
