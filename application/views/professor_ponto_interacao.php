<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pontos de interação</title>
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
            <h4>Definir Interação com o Ambiente</h4>
            <hr>

		<form action="<?= base_url('professor/inseririnteracao/') ?>" method="POST" role="form">
				<div class="modal-header">
					<h4 class="modal-title">Cadastrar interação</h4>
				</div>
				<div class="modal-body">
						
										
					<div class="col-md-3">	
						<div class="form-group">
							<label for="Jogo">Jogo</label>		
							<select name="idtema"  class"form-control" id="tema">
								<option value="0"> ----</option>
								<?php foreach ($jogos as $jogo){?>
								<option value="<?=$jogo->id;?>"><?=$jogo->nome; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				<		
					<input id="lat" type="hidden" name="lat">
					<input id="lng" type="hidden" name="lng">
					<input id="zoom" type="hidden" name="zoom">
					<div style="height: 200px; width: 100%" id="map"></div>
					<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Subscribe</button>
				</div>
			</form>
	     </div>
     </div>
 </div>
	

 	
    
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
	    /* Carga da instancia padrão do Google Maps */
	    var teste;

	    var map = new GMaps({
	      el: '#map',
	      lat: -12.043333,
	      lng: -77.028333,
	      center_changed: function(e) {
      		document.getElementById('lat').value = e.center.lat();
      		document.getElementById('lng').value = e.center.lng();
      		document.getElementById('zoom').value = e.zoom;
	      },
	      zoom_changed: function(e) {
      		document.getElementById('zoom').value = e.zoom;
	      }
	    });

	    /* Geolocalização do Google Maps */
		GMaps.geolocate({
		  success: function(position) {
		    map.setCenter(position.coords.latitude, position.coords.longitude);
		  },
		  error: function(error) {
		    alert('Erro na geolocalização: '+error.message);
		  },
		  not_supported: function() {
		    alert("Desculpe, seu navegador não suporta geolocalização, usando posição padrão.");
		  }
		});
    </script>

</body>
</html>