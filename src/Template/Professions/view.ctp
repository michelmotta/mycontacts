<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="professions view large-9 medium-8 columns content">
            <h3><?= h($profession->name) ?></h3>
            <table class="table">
                <tr>
                    <th scope="row"><?= __('Nome') ?></th>
                    <td><?= h($profession->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($profession->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado') ?></th>
                    <td><?= h($profession->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modificado') ?></th>
                    <td><?= h($profession->modified) ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <h4><?= __('Observations') ?></h4>
                    <?= $this->Text->autoParagraph(h($profession->observations)); ?>
                </div>
            </div>
            <div class="card-footer">
                <?= $this->Form->postLink(__('<i class="fa fa-fw fa-lg fa-times-circle"></i> Apagar'), ['action' => 'delete', $profession->id], ['class' => 'btn btn-danger icon-btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $profession->id)]) ?>
            </div>
        </div>
    </div>
</div>        
