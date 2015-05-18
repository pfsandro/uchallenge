<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gerar QRcode</title>
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body background="<?php echo base_url() . 'moldura.gif' ?>" style="background-repeat: no-repeat">
         

             
          <?php    
    
              //set it to writable location, a place for temp generated PNG files
              $PNG_TEMP_DIR = '.'.DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
              //html PNG location prefix
              $PNG_WEB_DIR = "temp/";

              include  "/assets/qrcode/qrlib.php";    
    
              //ofcourse we need rights to create temp dir
            if (!file_exists($PNG_TEMP_DIR))
              mkdir($PNG_TEMP_DIR);
    
    
            $filename = $PNG_TEMP_DIR.'test.png';
          
    
            //processing form input
            //remember to sanitize user input in real-life solution !!!
            $errorCorrectionLevel = 'L';
            if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
               $errorCorrectionLevel = $_REQUEST['level'];    

                $matrixPointSize = 4;
            if (isset($_REQUEST['size']))
               $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


            if (isset($_REQUEST['data'])) { 
    
            //it's very important!
            if (trim($_REQUEST['data']) == '')
             die('data cannot be empty! <a href="?">back</a>');
            
            // user data
            $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
            QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
            } else {    
      
              QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
              }    
            
             echo ' <br> <br> <br> <br> <br> <br> <br> <br> <br><center><img src="'.base_url().$PNG_WEB_DIR.basename($filename).'" /></center>'; 


            
    ?>
       



	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
