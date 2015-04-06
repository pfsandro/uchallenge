<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Jogos</title>
    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
    <script src="<?= base_url('/assets/js/gmaps/gmaps.js') ?>" type="text/javascript"></script>
</script>

	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div class="modal-dialog">
		<form action="<?= base_url('professor/inserirjogo/') ?>" method="POST" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Novo Jogo</h4>
				</div>
				<div class="modal-body">
						
					<div class="form-group">

						<label for="nome">Nome</label>
						<input type="text" name="nome" class="form-control" id="nome" placeholder="Digite Nome do Jogo">
					</div>
					<div class="form-group">
						<label for="areac">Area conhecimento</label>		
						<select name="idareac"  class"form-control" id="areac">
							<option value="0"> ----</option>
							<?php foreach ($areasc as $areac){?>
								<option value="<?=$areac->id;?>"><?=$areac->nome; ?></option>
							<?php } ?>
							
						</select>
					</div>
					<div class="form-group">
						<label for="areaa">Area avaliação</label>		
						<select name="idareaa"  class"form-control" id="areaa">
							<option value="0"> ----</option>
							<?php foreach ($areasa as $areaa){?>
								<option value="<?=$areaa->id;?>"><?=$areaa->nome; ?></option>
							<?php } ?>
							
						</select>
					</div>

					<div class="form-group">
						<label for="tema">Tema</label>		
						<select name="idtema"  class"form-control" id="tema">
							<option value="0"> ----</option>
							<?php foreach ($temas as $tema){?>
								<option value="<?=$tema->id;?>"><?=$tema->nome; ?></option>

							<?php } ?>
							
						</select>
					</div>
					<input id="lat" type="hidden" name="lat">
					<input id="lng" type="hidden" name="lng">
					<input id="zoom" type="hidden" name="zoom">
					<div style="height: 200px; width: 100%" id="map"></div>
					<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
	

 	
    
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