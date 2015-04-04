<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro area</title>
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body bgcolor="black">
<div class="modal-dialog">
		<form action="<?= base_url('professor/inserirarea/') ?>" method="POST" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Inserir Área de Conhecimento</h4>
				</div>
				<div class="modal-body">
						
				<div class="form-group">

						<label for="nome">Nome</label>
						<input type="text" name="nome" class="form-control" id="" placeholder="Digite a área de conhecimento">
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->

<!-- <div class="jumbotron" style="">
            <img src="<?php echo base_url() . 'topo.png' ?>" class="img-responsive">
    </div>
	<?php echo form_open('professor/inserirarea', 'id="form-area"'); ?>
 
    	<label for="nome">Nome:</label><br/>
    		<input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
    		<div class="error"><?php echo form_error('nome'); ?></div>
    	<input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?> -->
	
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>