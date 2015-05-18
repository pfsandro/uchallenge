<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gerar QRcode</title>
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
            <h4>Gerar QRcode</h4>
            <hr>
           <h4> Digite uma dica ou gere o QRcode com a resposta do Desafio </h4>
         <form  target="_blank" action="<?= base_url('professor/qrcode') ?>" method="POST" role="form">
             
            <?php echo 'Dados: </br><textarea rows="4" cols="30" name="data">'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):$acoes[0]->nome).'</textarea>';?>
                   
            <br>
            ECC:&nbsp;<select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
            </select>&nbsp;
             Size:&nbsp;<select name="size">
        
            <?php
            for($i=10;$i<=20;$i++)
              echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';?>
        
            </select>
            <input type="submit" value="GENERATE">
          </form><hr/>
        
      
     </div>
 </div>


	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
