
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
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'blogs','action'=>'index']); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blogs/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'blogs','action'=>'post']); ?>">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'blogs','action'=>'contact']); ?>">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'login','action'=>'index']); ?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>