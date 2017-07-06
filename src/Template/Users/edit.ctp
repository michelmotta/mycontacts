<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="users form large-9 medium-8 columns content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Editar Usuário') ?></legend>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $this->Form->input('name', ['label' => __('Nome'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $this->Form->input('email', ['label' => __('Email'), 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $this->Form->input('username', ['label' => __('Nome de Usuário'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $this->Form->input('password', ['label' => __('Senha'), 'class' => 'form-control']); ?>
                    </div>
                </div>
            </fieldset>
            <center><?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary btn-lg btn-footer']) ?></center>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>