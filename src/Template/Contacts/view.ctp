<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="contacts view large-9 medium-8 columns content">
            <h3><?= h($contact->name) ?></h3>
            <table class="table">
                <tr>
                    <th scope="row"><?= __('Nome') ?></th>
                    <td><?= h($contact->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Referência') ?></th>
                    <td><?= h($contact->reference) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Tipo') ?></th>
                    <td><?= $contact->has('type') ? $this->Html->link($contact->type->name, ['controller' => 'Types', 'action' => 'view', $contact->type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Profissão') ?></th>
                    <td><?= $contact->has('profession') ? $this->Html->link($contact->profession->name, ['controller' => 'Professions', 'action' => 'view', $contact->profession->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('E-mail') ?></th>
                    <td><?= h($contact->email) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Fone 1') ?></th>
                    <td><?= h($contact->phone_one) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Fone 2') ?></th>
                    <td><?= h($contact->phone_two) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Fone 3') ?></th>
                    <td><?= h($contact->phone_tree) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Fone Especial') ?></th>
                    <td><?= h($contact->special_phone) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('CEP') ?></th>
                    <td><?= h($contact->cep) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Endereço') ?></th>
                    <td><?= h($contact->address) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Numero') ?></th>
                    <td><?= h($contact->number) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('bairro') ?></th>
                    <td><?= h($contact->neighborhood) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Complemento') ?></th>
                    <td><?= h($contact->complement) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Cidade') ?></th>
                    <td><?= h($contact->city) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Estado') ?></th>
                    <td><?= h($contact->state) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contact->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Nascimento') ?></th>
                    <td><?= h($contact->date_of_birth) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado') ?></th>
                    <td><?= h($contact->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modificado') ?></th>
                    <td><?= h($contact->modified) ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <h4><?= __('Observações') ?></h4>
                    <?= $this->Text->autoParagraph(h($contact->observations)); ?>
                </div>
            </div>
            <div class="card-footer">
                <?= $this->Form->postLink(__('<i class="fa fa-fw fa-lg fa-times-circle"></i> Apagar'), ['action' => 'delete', $contact->id], ['class' => 'btn btn-danger icon-btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
            </div>
        </div>
    </div>
</div>        
