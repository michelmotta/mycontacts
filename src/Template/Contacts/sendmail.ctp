<?php
/**
  * @var \App\View\AppView $this
  */

  use Cake\Routing\Router;
?>
<style type="text/css">
	.categories-table{ width: 100% !important; }
</style>
<div class="card">
    <div class="card-body">
    	<?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Enviar e-mail(s)') ?></legend>
            <div class="row">
            	<div class="col-md-4">
            		<?php echo $this->Form->input('name', ['label' => __('Nome de quem está enviando'), 'class' => 'form-control']); ?>
            	</div>
            	<div class="col-md-4">
            		<?php echo $this->Form->input('usermail', ['label' => __('E-mail de quem está enviando'), 'class' => 'form-control']); ?>
            	</div>
            	<div class="col-md-4">
            		<?php echo $this->Form->input('subject', ['label' => __('Assunto do E-mail'), 'class' => 'form-control']); ?>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-12">
            		<?php echo $this->Form->input('emails', ['type' => 'select','name' => 'emails[]', 'label' => __('E-mail(s) para ser enviado(s)'), 'class' => 'form-control']); ?>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-12">
            		<?php echo $this->Form->input('content', ['type' => 'textarea','label' => __('Conteúdo do E-mail'), 'class' => 'form-control']); ?>
            	</div>
            </div>		
        </fieldset>
        <center><?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary btn-lg btn-footer']) ?></center>
        <?= $this->Form->end() ?>
    </div>
</div>    
<script>tinymce.init({ selector:'textarea' });</script>
<script type="text/javascript">
  $('select').select2({
    theme: 'bootstrap',
    language: 'pt-BR',
  	multiple: true,
    ajax: {
      url: '<?php echo Router::url(array('controller' => 'Contacts', 'action' => 'sendmail'));?>',
      dataType: 'json',
      delay: 250,
      processResults: function (emails) {
        return {
          results: $.map(emails.data, function (value, key) {
              return {
                  id: value.email,
                  text: value.email
              }
          })
      };
      },
      cache: true
    }
  });
</script>