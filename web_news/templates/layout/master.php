<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NGHIA-SSV</title>

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
  <!-- $this->element('nav')  -->
  
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?= $this->Url->build(['controller'=>'blogs','action'=>'index']); ?>">BLOG</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Blogs','action'=>'index']); ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach ($categories as $category): ?>
                  <?php if($category->parent_id > 0){ ?>
                    <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'Blogs','action'=>'select',$category->id]); ?>"><?= $category->name ?></a>
                  <?php } ?>
                <?php endforeach; ?>
              </div>            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blogs/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Blogs','action'=>'contact']); ?>">Contact</a>
          </li>
          <li class="nav-item">
            <?php if ($this->Identity->isLoggedIn()) { ?>
              <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout']); ?>">Logout</a>
            <?php }else{ ?>
              <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Users','action'=>'index']); ?>">Login</a>
            <?php } ?>
            <li class="nav-item">
              <?= $this->Form->create() ?>
                <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
              <?= $this->Form->end() ?>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
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
