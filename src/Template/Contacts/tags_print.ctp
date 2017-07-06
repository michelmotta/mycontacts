<?php
/**
  * @var \App\View\AppView $this
  */

  use Cake\Routing\Router;
?>
<div class="row">
	<div class="col-md-6">
		<div class="card">
		    <div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron">
							<?= $this->Form->create(null, ['url' => ['controller' => 'Contacts', 'action' => 'etiquetaOne']]) ?>
						    	<center><p>Etiquetas 8923MC (1 col)</p></center>
						    	<?php echo $this->Form->input('etiqueta_one', ['type' => 'select','name' => 'etiqueta_one[]', 'label' => __('Selecione nome(s) para gerar etiqueta(s)'), 'class' => 'form-control']); ?>
								<center>
									<?= $this->Form->button(__('<span class="glyphicon glyphicon-save-file"></span> Gerar PDF'), ['class' => 'btn btn-primary btn-lg', 'style' => 'margin-top: 30px;', 'escape' => false]) ?>
								</center>
							<?= $this->Form->end() ?>
					  	</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<div class="col-md-6">
		<div class="card">
		    <div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron">	
							<?= $this->Form->create(null, ['url' => ['controller' => 'Contacts', 'action' => 'etiquetaTwo']]) ?>
					    	<center><p>Etiquetas 6280 (3 col)</p></center>
					    	<?php echo $this->Form->input('etiqueta_two', ['type' => 'select','name' => 'etiqueta_two[]', 'label' => __('Selecione nome(s) para gerar etiqueta(s)'), 'class' => 'form-control']); ?>
					    	<center>
								<?= $this->Form->button(__('<span class="glyphicon glyphicon-save-file"></span> Gerar PDF'), ['class' => 'btn btn-primary btn-lg', 'style' => 'margin-top: 30px;', 'escape' => false]) ?>
							</center>
							<?= $this->Form->end() ?>
						</div>	
					</div> 
				</div>
			</div>		 	
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="jumbotron">
				    	<center><p>Fichas para cadastro</p></center>
				    	<center>
				    	<?= $this->Html->link('<span class="glyphicon glyphicon-save-file"></span> Gerar PDF', [
							'controller' => 'Contacts', 
							'action' => 'fichaCadastro'
						],
						[
							'class' => 'btn btn-primary btn-lg',
							'escape' => false
						]);?> 
						</center>
				  	</div>
				</div>  	
			</div> 
		<div class="col-md-3"></div> 	
	</div>
</div>
<script type="text/javascript">
  $('select').select2({
    theme: 'bootstrap',
    language: 'pt-BR',
  	multiple: true,
    ajax: {
      url: '<?php echo Router::url(array('controller' => 'Contacts', 'action' => 'searchContact'));?>',
      dataType: 'json',
      delay: 250,
      processResults: function (emails) {
        return {
          results: $.map(emails.data, function (value, key) {
              return {
                  id: value.name,
                  text: value.name
              }
          })
      };
      },
      cache: true
    }
  });
</script>