<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Áreas de Avaliação</title>
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron" style="">
            <img src="<?php echo base_url() . 'topo.png' ?>" class="img-responsive">
    </div>
	<?php echo form_open('professor/inserirareaavalia', 'id="form-area"'); ?>
 
    	<div class="col-lg-8 col-sm-6">
    		<label for="nome">Nome:</label>
                    <input class="form-control" type="text" name= "nome" value="<?php echo set_value('nome'); ?>" />
                    <span class="text-danger"><?php echo form_error('nome'); ?></span>

    				<input type="submit" name="cadastrar" value="Cadastrar" />        	
        </div>
   		

    	
    <?php echo form_close(); ?>
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>