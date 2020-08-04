<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V19</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->css(['Login/vendor/bootstrap/css/bootstrap.min.css','Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css','Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css','Login/vendor/animate/animate.css','Login/vendor/css-hamburgers/hamburgers.min.css','Login/vendor/animsition/css/animsition.min.css','Login/vendor/select2/select2.min.css','Login/vendor/daterangepicker/daterangepicker.css','Login/css/util.css','Login/css/main.css'])?>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> -->
<!--===============================================================================================-->	
	<!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
<!--===============================================================================================-->	
	<!-- <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
<!--===============================================================================================-->
</head>
<body>
	
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
	

    <?= $this->Html->script(['Login/vendor/jquery/jquery-3.2.1.min.js','Login/vendor/animsition/js/animsition.min.js','Login/vendor/bootstrap/js/popper.js','Login/vendor/bootstrap/js/bootstrap.min.js','Login/vendor/select2/select2.min.js','Login/vendor/daterangepicker/moment.min.js','Login/vendor/daterangepicker/daterangepicker.js','Login/vendor/countdowntime/countdowntime.js','js/main.js']); ?>
<!--===============================================================================================-->
	<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/daterangepicker/moment.min.js"></script> -->
	<!-- <script src="vendor/daterangepicker/daterangepicker.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/countdowntime/countdowntime.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->

</body>
</html>