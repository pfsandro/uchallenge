<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lista de Ações</title>
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

                        <li><a href="<?= base_url('professor/area') ?>"></i> Areas Conhecimento </a></li>
                        <li><a href="<?= base_url('/professor/areaavalia') ?>"></i> Areas de Avaliação </a></li>
                        <li><a href="<?= base_url('/professor/tema') ?>"></i> Temas </a></li>
                        <li><a href="<?= base_url('/professor/jogo') ?>"></i> Jogos </a></li>
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
            <h4>Lista</h4>
            <hr>
            <div class="col-md-9">
				<table id="lista" class="table table-striped">
				<tr>
					<th> ID Ação </th>
					<th> Questão</th>
					<th> Objetivo Pedagógico </th>
					<th> Alterar </th>
					<th> Excluir</th>
          <th> Interação</th>
				</tr>
			<?php foreach ($acoes as $acao) {?>
				
			<tr>
				<th><?=$acao->id;?></th>
				<th><?=$acao->nome;?></th>	
				<th><?=$acao->objetivopedagogico;?></th>	
				<th><a href="<?=base_url('professor/alterarq/'.$acao->id)?>" class="btn btn-primary">Alterar</a></th>
				<th><a href="<?=base_url('professor/excluirq/'.$acao->id)?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir registro?');">excluir</a></th>	
				<th><a href="<?=base_url('professor/alterarq/'.$acao->id)?>" class="btn btn-primary">Associar ao ambiente</a></th>
						
			</tr>
				<?php }?>
	</table>	
  
</div>



        </div>
     </div>
 </div>

 	    
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

  <script src="/javascripts/application.js" type="text/javascript">
    $(document).ready(function() {
      $('#lista').dataTable();
    } );
  </script>
    
</body>
</html>