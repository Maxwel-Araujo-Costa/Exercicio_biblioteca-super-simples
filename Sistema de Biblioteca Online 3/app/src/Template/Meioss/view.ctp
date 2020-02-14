<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meios $meios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Meios'), ['action' => 'edit', $meios->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meios'), ['action' => 'delete', $meios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meios->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Meioss'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meios'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="meioss view large-9 medium-8 columns content">
    <h3><?= h($meios->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $meios->has('user') ? $this->Html->link($meios->user->name, ['controller' => 'Users', 'action' => 'view', $meios->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $meios->has('book') ? $this->Html->link($meios->book->name, ['controller' => 'Books', 'action' => 'view', $meios->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($meios->id) ?></td>
        </tr>
    </table>
</div>
