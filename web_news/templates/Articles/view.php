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
            
            <?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <?php if($article->publish == 0){ ?>
            <?= $this->Html->link(__('Publish'), ['action' => 'publish', $article->id], ['class' => 'button float-right']) ?>
        <?php }else{ ?>
            <?= $this->Html->link(__('UnPublish'), ['action' => 'unPublish', $article->id], ['class' => 'button float-right']) ?>
        <?php } ?>
        <div class="articles view content">
            <h3><?= h($article->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Img') ?></th>
                    <td><?= h($article->img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Publish') ?></th>
                    <td><?= h($article->publish) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $article->has('category') ? $this->Html->link($article->category->name, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= $article->has('user') ? $this->Html->link($article->user->name, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($article->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($article->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($article->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Title') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($article->title)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Sub Title') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($article->sub_title)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($article->content)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
