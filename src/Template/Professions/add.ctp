<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="professions form large-9 medium-8 columns content">
            <?= $this->Form->create($profession) ?>
            <fieldset>
                <legend><?= __('Adicionar Profissão') ?></legend>
                <?php
                    echo $this->Form->input('name', ['label' => __('Nome'), 'class' => 'form-control']);
                    echo $this->Form->input('observations', ['label' => __('Observações'), 'class' => 'form-control']);
                ?>
            </fieldset>
            <center><?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary btn-lg btn-footer']) ?></center>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>        
