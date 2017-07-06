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
	<center><h1 style="margin-top:100px;color: #fff;">My Contacts</h1></center>
		<div class="card">
		    <div class="card-body">
				<div class="users form">
				<?= $this->Form->create() ?>
				    <fieldset>
				        <legend><center><?= __('Informe seu usuário e senha') ?></center></legend>
				        <?= $this->Flash->render() ?>
				        <?= $this->Form->input('username', ['label' => __('Nome de usuário'), 'class' => 'form-control', 'placeholder' => 'Digite seu nome de usuário', 'required']) ?>
				        <?= $this->Form->input('password', ['label' => __('Senha'), 'class' => 'form-control', 'placeholder' => 'Digite a senha do usuário', 'required']) ?>
				    </fieldset>
				<center><?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary btn-lg btn-footer']) ?></center>
				<?= $this->Form->end() ?>
				<center>
		    		<?= $this->Html->link('Esqueceu a senha?', ['controller' => 'Users', 'action' => 'recovery'],['style' =>'color:#fff;padding-top:20px;display: inline-block;']);?> 
				</center>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-md-4"></div>
</div>	