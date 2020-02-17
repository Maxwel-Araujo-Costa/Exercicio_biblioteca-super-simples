<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'home']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3>Login</h3>
    <?php
    echo $this->Form->create();
    ?>
    <fieldset>
        <?php
        echo $this->Form->input('email', [
            'placeholder' => 'Seu email aqui',
            //'data-validation'=>'http://seu-site.com/email/validation'

        ]);
        echo $this->Form->input('password', [
            'label' => 'Senha',
            'placeholder' => '*****'
        ]);
        echo $this->Form->button('Send');
        ?>
    </fieldset>
    <?php
    echo $this->Form->end();
    ?>
</div>