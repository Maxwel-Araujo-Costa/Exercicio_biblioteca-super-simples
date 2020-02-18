<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'home']) ?> </li>
        <li><?= $this->Html->link(__('Sair'), ['action' => 'logout']) ?> </li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?php $this->Html->script('jquery-1.7.2.js'); ?>
    <form method="post" id="info" action="">

        <fieldset>
            <legend><?= __('Add User') ?></legend>
            <label for="name">First name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br><br>
            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password"><br><br>
        </fieldset>
        <?= $this->Form->submit(__('Submit')) ?>


    </form>
    <script>
        $(document).ready(function() {
            $("#info").submit(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    type: "POST",
                    url: "http://localhost:8765/api/users/add",
                    data: {
                        name: name,
                        email: email,
                        password: password
                    },
                    success: function(data) {
                        console.log(data); // show response from the php script.
                        alert("success");
                    }
                });
            });
        });
    </script>
</div>