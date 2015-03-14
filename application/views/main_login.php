<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="modal-dialog">
		<form action="<?= base_url('main/checkLogin/') ?>" method="POST" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Login</h4>
				</div>
				<div class="modal-body">
					<?php if (strlen($error) > 0): ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Erro</strong> <?= $error ?>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label for="">Login</label>
						<input type="text" name="nome" class="form-control" id="" placeholder="Digite seu usuário">
					</div>
					<div class="form-group">
						<label for="">Senha</label>
						<input type="password" name="senha" class="form-control" id="" placeholder="Digite sua senha">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->

	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>