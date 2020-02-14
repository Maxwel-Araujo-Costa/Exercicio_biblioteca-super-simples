<div class="colunm content">
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