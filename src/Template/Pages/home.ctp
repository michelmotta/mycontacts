<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Mensagem</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body"><center><h2>SEJA BEM-VINDO(A)</h2></center>
                 <?php $userName = $this->request->session()->read('Auth.User.name'); ?>
                <center><p style="font-size: 60px;"><?= $userName; ?></p></center></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">DATA ATUAL</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <center><h2>HOJE É DIA</h2></center>
                <center><p style="font-size: 60px;"><?= date('d/m/Y'); ?></p></center>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Contatos</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <center><h2>QUANTIDADE DE CONTATOS</h2></center>
                <center><p style="font-size: 60px;"><?= $this->Number->format($totalContacts) ?></p></center>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">LINKS RÁPIDOS</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                         <?= $this->Html->link(__('<i class="glyphicon glyphicon-phone-alt"></i><span>Contatos</span>') ,['controller' => 'Contacts', 'action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'width:100%;margin-top:19px;', 'escape' => false]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link(__('<i class="glyphicon glyphicon glyphicon-tag"></i><span>Tipos de Contatos</span>') ,['controller' => 'Types', 'action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'width:100%;margin-top:19px;', 'escape' => false]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link(__('<i class="glyphicon glyphicon-briefcase"></i><span>Profissões</span>') ,['controller' => 'Professions', 'action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'width:100%;margin-top:19px;', 'escape' => false]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Html->link(__('<i class="glyphicon glyphicon-print"></i><span>Impressões</span>') ,['controller' => 'Contacts', 'action' => 'tagsPrint'], ['class' => 'btn btn-primary', 'style' => 'width:100%;margin-top:19px;', 'escape' => false]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link(__('<i class="glyphicon glyphicon-envelope"></i><span>E-mails</span>') ,['controller' => 'Contacts', 'action' => 'sendmail'], ['class' => 'btn btn-primary', 'style' => 'width:100%;margin-top:19px;', 'escape' => false]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link(__('<i class="glyphicon glyphicon-floppy-save"></i><span>Backups</span>') ,['controller' => 'Contacts', 'action' => 'backups'], ['class' => 'btn btn-primary', 'style' => 'width:100%;margin-top:19px;', 'escape' => false]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link(__('<i class="glyphicon glyphicon-wrench"></i> Usuários') ,['controller' => 'Users', 'action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'width:100%;margin-top:19px;', 'escape' => false]) ?>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})
</script>