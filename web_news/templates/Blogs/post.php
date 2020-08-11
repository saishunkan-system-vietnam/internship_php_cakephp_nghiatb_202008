<!-- Page Header -->
<header class="masthead" style="background-image: url('/upload_file/<?= $article->id ?>.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?= h($article->title); ?></h1>
            <h2 class="subheading"><?= h($article->sub_title); ?></h2>
            <span class="meta">Posted by
              <a href="#"><?= $article->has('user') ? $article->user->name : '' ?></a>
              on <?= h($article->modified); ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?= $article->content ?>
        </div>
      </div>
    </div>
  </article>