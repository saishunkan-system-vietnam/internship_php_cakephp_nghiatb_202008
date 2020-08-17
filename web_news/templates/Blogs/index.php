  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>SSV Blog</h1>
            <span class="subheading">Tin Tức - Sự Kiện - Nổi Bật</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($articles as $article): ?>
        <div class="post-preview">
          <a href="<?= $this->Url->build(['controller'=>'blogs','action'=>'post',$article->id]); ?>">
            <h2 class="post-title">
              <?= h($article->title); ?>
            </h2>
            <h3 class="post-subtitle">
            <?= h($article->sub_title); ?>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#"><?= $article->has('user') ? $article->user->name : '' ?></a>
            on <?= h($article->modified); ?></p>
        </div>
        <hr>
      <?php endforeach; ?>
        <!-- Pager -->
        <!-- <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div> -->
        <div class="paginator">
          <ul class="pagination">
              <?= $this->Paginator->first('<< ' . __('first')) ?>
              <?= $this->Paginator->prev('< ' . __('previous')) ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(__('next') . ' >') ?>
              <?= $this->Paginator->last(__('last') . ' >>') ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  
