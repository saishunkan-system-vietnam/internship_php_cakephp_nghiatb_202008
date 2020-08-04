<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <?= $this->Html->css(['Frontend/vendor/bootstrap/css/bootstrap.min.css','Frontend/vendor/fontawesome-free/css/all.min.css','Frontend/css/clean-blog.min.css'])?>
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Custom fonts for this template -->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <!-- <link href="css/clean-blog.min.css" rel="stylesheet"> -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

  <!-- Navigation -->
  <?= $this->element('nav') ?>
  <!-- Content  -->
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  <hr>

  <!-- Footer -->
<?= $this->element('footer') ?>

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <?= $this->Html->script(['Frontend/vendor/jquery/jquery.min.js', 'Frontend/vendor/bootstrap/js/bootstrap.bundle.min.js','Frontend/vendor/bootstrap/js/bootstrap.bundle.min.js']); ?>
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Custom scripts for this template -->
  <!-- <script src="js/clean-blog.min.js"></script> -->

</body>

</html>
