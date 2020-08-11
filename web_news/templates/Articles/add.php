<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articles form content">
            <?= $this->Form->create($article,['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Article') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('sub_title');
                    echo $this->Form->control('img',['type' => 'file']);
                    echo $this->Form->control('content',['id'=>'content']);
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    // echo $this->Form->control('user_id', ['options' => $users]);
                ?>
                <input type="hidden" name="user_id" value="<?= $this->Identity->get('id'); ?>">
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

