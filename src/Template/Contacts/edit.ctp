<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="contacts form large-9 medium-8 columns content">
            <?= $this->Form->create($contact) ?>
            <fieldset>
                <legend><?= __('Editar Contato') ?></legend>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->Form->input('name', ['label' => __('Nome'), 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $this->Form->input('reference', ['label' => __('Referência'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('type_id', ['options' => $types, 'label' => __('Tipo'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('profession_id', ['options' => $professions, 'label' => __('Profissão'), 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $this->Form->input('email', ['label' => __('E-mail'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('date_of_birth', ['type' => 'text', 'empty' => true, 'label' => __('Nascimento'), 'class' => 'form-control datepicker']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('phone_one', ['label' => __('Fone 1'), 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $this->Form->input('phone_two', ['label' => __('Fone 2'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('phone_tree', ['label' => __('Fone 3'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('special_phone', ['label' => __('Fone Especial'), 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $this->Form->input('address', ['label' => __('Endereço'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('number', ['label' => __('Número'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('neighborhood', ['label' => __('Bairro'), 'class' => 'form-control']); ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <?php echo $this->Form->input('complement', ['label' => __('Complemento'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $this->Form->input('cep', ['label' => __('CEP'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $this->Form->input('city', ['label' => __('Cidade'), 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $this->Form->input('state', ['label' => __('Estado'), 'class' => 'form-control']); ?>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->Form->input('observations', ['label' => __('Observação'), 'class' => 'form-control']); ?>
                    </div>
                </div>       
            </fieldset>
            <center><?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary btn-lg btn-footer']) ?></center>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>       
