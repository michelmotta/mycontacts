<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card">
    		<div class="card-body">
			 	<div class="jumbotron">
			    	<h1>Central de Backups</h1> 
			    	<p>Aqui você pode fazer o download de todos os contatos do banco de dados em formato de .CSV</p>
			    	<?= $this->Html->link('<span class="glyphicon glyphicon-cloud-download"></span> Fazer Download', [
						'controller' => 'Contacts', 
						'action' => 'export',
						'_ext' => 'csv'
					],
					[
						'class' => 'btn btn-primary btn-lg',
						'escape' => false
					]);?> 
			  	</div>
			</div>
		</div>
	</div>	
	<div class="col-md-2"></div>	
</div>		