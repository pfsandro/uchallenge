<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Conteúdos</title>
    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
    <script src="<?= base_url('/assets/js/gmaps/gmaps.js') ?>" type="text/javascript"></script>
</script>

	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">UCHALLENGE</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Login <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">New User</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>

            <img src="<?php echo base_url() . 'topo1.png' ?>" class="img-responsive">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <h4>Painel de Controle</h4>
            <hr>
            <ul class="nav nav-stacked">
                  
                        <li class="active"><a href="<?= base_url('professor') ?>">Home</a></li>

                       <!-- <li><a href="<?= base_url('professor/area') ?>"></i> Areas Conhecimento </a></li>-->
                        <!--<li><a href="<?= base_url('/professor/areaavalia') ?>"></i> Areas de Avaliação </a></li>-->
                        <li><a href="<?= base_url('/professor/tema') ?>"></i> Temas </a></li>
                        <li class"dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              Jogos
                              <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="<?= base_url('/professor/jogo') ?>">Cadastro</a></li>
                              <li><a href="<?= base_url('/professor/jogol') ?>">Listar</a></li>  
                           </ul>
                         </li> 
                        <li><a href="<?= base_url('/professor/objaprendizagem') ?>"></i> Conteúdos </a></li>
                        <li class"dropdown">
  							           <a class="dropdown-toggle" data-toggle="dropdown" href="#">
   				 				            Ações
   				 				            <span class="caret"></span></a>
  							            <ul class="dropdown-menu">
   					 			            <li><a href="<?= base_url('/professor/desafio') ?>">Cadastro</a></li>
   					 			            <li><a href="<?= base_url('/professor/desafiol') ?>">Listar</a></li>	
  							           </ul>
                         </li>  
                       <li class"dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              Quiz
                              <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="<?= base_url('/professor/quiz') ?>">cadastro</a></li>
                              <li><a href="<?= base_url('/professor/quizl') ?>">Listar</a></li>  
                           </ul>
                      </li>   
             </ul            
				</div>
                      
                       
             <hr>
        </div>
        <!-- /col-3 -->
        <div class="col-sm-9">
            <h4>Cadastrar materia de apoio</h4>
            <hr>

		<form action="<?= base_url('professor/inserirobjeto/') ?>" method="POST" role="form" enctype="multipart/form-data">
				
				<div class="modal-body">
						
					<div class="form-group">
							<label for="formato de Arquivo">Tipo de Arquivo</label>		
							<select name="formato"  class"form-control" id="formato" required>
								<option value=""> selecionar</option>
								<option value="pdf"> PDF</option>
								<option value="mp3"> MP3</option>
								<option value="avi"> AVI</option>
								<option value="jpg"> JPG</option>
								<option value="mpeg"> MPEG</option>
							</select>
					</div>
				<div class="row">
					<div class="col-md-5">	
						<div class="form-group">
							<label for="areac">Area conhecimento</label>		
							<select name="idareac"  class"form-control" id="areac" required>
								<option value="">Selecionar</option>
								<?php foreach ($areasc as $areac){?>
								<option value="<?=$areac->id;?>" ><?=$areac->nome; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="areaa">Area avaliação</label>		
							<select name="idareaa"  class"form-control" id="areaa" required="required">
								<option value="">Selecionar</option>
								<?php foreach ($areasa as $areaa){?>
								<option value="<?=$areaa->id;?>"><?=$areaa->nome; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-3">	
						<div class="form-group">
							<label for="tema">Tema</label>		
							<select name="idtema"  class"form-control" id="tema" required>
								<option value="">Selecionar</option>
								<?php foreach ($temas as $tema){?>
								<option value="<?=$tema->id;?>"><?=$tema->nome; ?></option>
								<?php } ?>
							</select>
						</div>
						
					</div>
				</div>
					<input type="file" name="userfile" required />

					<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</div>
			</form>
	     </div>
     </div>
 </div>
	

 	
    
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>
</html>