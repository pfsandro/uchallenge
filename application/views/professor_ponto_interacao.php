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
<body ng-app="mapa">
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

		<form action="<?= base_url('professor/inseririnteracao/') ?>" method="POST" role="form" ng-controller="mapaCtrl">
				<div class="modal-header">
					<h4 class="modal-title">Cadastrar interação</h4>
				</div>
				<div class="modal-body">
						
										
					<div class="col-md-3">	
						<div class="form-group">
							<label for="Jogo">Jogo</label>
							<select name="idtema" ng-model="jogo" ng-change="setCenter(jogo)" class"form-control" id="tema">
								<option value="0">----</option>
								<option value="{{j.id}}" ng-repeat="j in jogos">{{j.jogo}}</option>
							</select>
						</div>
					</div>

					<div style="height: 300px; width: 100%" id="map"></div>
					<div class="modal-footer">

          <input type="text" name="lat" id="lat">
          <input type="text" name="lng" id="lng">
          <input type="text" name="zoom" ng-model="zoom">
          <input type="text" name="acoes_id" ng-model="acoes_id">
          <input type="text" name="jogo_id" ng-model="jogo_id">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
	     </div>
     </div>
 </div>
	
    
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>

    <script type="text/javascript">

      angular.module('mapa',[]).controller('mapaCtrl', function($scope){
        var jogos = [];
      <?php foreach ($jogos as $jogo){?>
        jogos.push({
          id: '<?php echo $jogo->id; ?>',
          jogo: '<?php echo $jogo->jogo; ?>',
          tema_id: '<?php echo $jogo->tema_id; ?>',
          longitude: '<?php echo $jogo->longitude; ?>',
          latitude: '<?php echo $jogo->latitude; ?>',
          zoom: '<?php echo $jogo->zoom; ?>',
          acoes_id: '<?php echo $jogo->acoes_id; ?>'
        });
      <?php } ?>
        $scope.jogos = jogos;
        $scope.setCenter = function(id){
          var jogo = jogos.filter(function(j){
            return j.id == id;
          });
          map.setCenter(jogo[0].latitude, jogo[0].longitude);
          map.setZoom(parseInt(jogo[0].zoom));
          $scope.zoom = jogo[0].zoom;
          $scope.acoes_id = jogo[0].acoes_id;
          $scope.jogo_id = jogo[0].id;
        };
      });

	    /* Carga da instancia padrão do Google Maps */
	    var teste;

	    var map = new GMaps({
	      el: '#map',
	      lat: -12.043333,
	      lng: -77.028333,
        click: function(e) {
          map.removeMarkers();
          map.addMarker({
            lat: e.latLng.lat(),
            lng: e.latLng.lng(),
            //title: 'ponto'
            //infoWindow: {}
          });
          document.getElementById('lat').value = e.latLng.lat();
          document.getElementById('lng').value = e.latLng.lng();
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