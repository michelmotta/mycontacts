<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="types view large-9 medium-8 columns content">
            <h3><?= h($type->name) ?></h3>
            <table class="table">
                <tr>
                    <th scope="row"><?= __('Nome') ?></th>
                    <td><?= h($type->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($type->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado') ?></th>
                    <td><?= h($type->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modificado') ?></th>
                    <td><?= h($type->modified) ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <h4><?= __('Observações') ?></h4>
                    <?= $this->Text->autoParagraph(h($type->observations)); ?>
                </div>
            </div>
            <div class="card-footer">
                <?= $this->Form->postLink(__('<i class="fa fa-fw fa-lg fa-times-circle"></i> Apagar'), ['action' => 'delete', $type->id], ['class' => 'btn btn-danger icon-btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id)]) ?>
            </div>
        </div>
    </div>
</div>       