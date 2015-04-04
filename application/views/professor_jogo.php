<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Jogos</title>
	<style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var map;

function initialize() {
  var mapOptions = {
    zoom: 15
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Location found using HTML5.'
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div id="map-canvas"></div>
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
						<select name="areac"  class"form-control" id="areac">
							<option value="0"> ----</option>
							<?php foreach ($areasc as $areac){?>
								<option value="<?php=$areac->id?>"><?=$areac->nome; ?></option>
							<?php } ?>
							
						</select>
					</div>
					<div class="form-group">
						<label for="areaa">Area avaliação</label>		
						<select name="areaa"  class"form-control" id="areaa">
							<option value="0"> ----</option>
							<?php foreach ($areasa as $areaa){?>
								<option value="<?php=$areaa->id?>"><?=$areaa->nome; ?></option>
							<?php } ?>
							
						</select>
					</div>

					<div class="form-group">
						<label for="tema">Tema do Jogo</label>		
						<select name="tema"  class"form-control" id="tema">
							<option value="0"> ----</option>
							<?php foreach ($temas as $tema){?>
								<option value="<?php=$tema->id?>"><?=$tema->nome; ?></option>
							<?php } ?>
							
						</select>
					</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
	

 	
    
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>