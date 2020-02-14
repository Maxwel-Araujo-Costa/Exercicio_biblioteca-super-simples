<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meios[]|\Cake\Collection\CollectionInterface $meioss
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Meios'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="meioss index large-9 medium-8 columns content">
    <h3><?= __('Meioss') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meioss as $meios): ?>
            <tr>
                <td><?= $this->Number->format($meios->id) ?></td>
                <td><?= $meios->has('user') ? $this->Html->link($meios->user->name, ['controller' => 'Users', 'action' => 'view', $meios->user->id]) : '' ?></td>
                <td><?= $meios->has('book') ? $this->Html->link($meios->book->name, ['controller' => 'Books', 'action' => 'view', $meios->book->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $meios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
