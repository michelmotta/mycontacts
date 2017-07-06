<style>
body{
	background: #2A3F54;
}
.card{
	background: #2A3F54;
	color: #fff;
	border-bottom: 3px solid #fff;
	box-shadow: none;
}
legend{
	color: #fff;
}
.btn-primary{
	background: #1ABB9C;
	width: 100%;
}
.form-control{
	height: 50px;
}
</style>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<center><h1 style="margin-top:130px;color:#fff">AGENDA RI SISTEMAS</h1></center>
		<div class="card">
		    <div class="card-body">
				<div class="users form">
				<?= $this->Form->create() ?>
				    <fieldset>
				        <legend><center><?= __('Informe a nova senha') ?></center></legend>
				        <?= $this->Flash->render() ?>
				        <?= $this->Form->input('password', ['label' => __('Nova Senha'), 'class' => 'form-control', 'placeholder' => 'Digite sua nova senha', 'required']) ?>
				    </fieldset>
				<center><?= $this->Form->button(__('Resetar'), ['class' => 'btn btn-primary btn-lg btn-footer']) ?></center>
				<?= $this->Form->end() ?>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-md-4"></div>
</div>	