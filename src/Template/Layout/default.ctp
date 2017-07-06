<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Agenda RI Sistemas';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <?= $this->Html->script('DataTables.cakephp.dataTables') ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.13/dataRender/intl.js"></script>

    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

    <?= $this->Html->css('select2.min') ?>
    <?= $this->Html->script('select2.min.js') ?>
    <?= $this->Html->script('i18n/pt-BR') ?>
    <?= $this->Html->css('select2-bootstrap.min') ?>
    
    <?= $this->Html->css('bootstrap-datepicker') ?>
    <?= $this->Html->script('bootstrap-datepicker.min') ?>
    <?= $this->Html->script('i18n/bootstrap-datepicker.pt-BR') ?>

    <?= $this->Html->script('jquery.mask.min') ?>

    <?= $this->Html->css('style') ?>

    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container-fluid" style="margin-top: 30px;">
        <nav class="navbar navbar-inverse" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">My Contacts</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if($this->request->params['controller'] == 'Pages' && $this->request->params['action'] == 'display') $class = 'active'; else $class = ''; ?>
                    <li class="<?= $class ?>">
                      <?= $this->Html->link(__('<i class="glyphicon glyphicon-home"></i><span>Home</span>') ,['controller' => 'Pages', 'action' => 'display'], ['escape' => false]) ?>
                    </li>
                    <?php if($this->request->params['controller'] == 'Contacts' && $this->request->params['action'] == 'index') $class = 'active'; else $class = ''; ?>
                    <li class="<?= $class ?>">
                      <?= $this->Html->link(__('<i class="glyphicon glyphicon-phone-alt"></i><span>Contatos</span>') ,['controller' => 'Contacts', 'action' => 'index'], ['escape' => false]) ?>
                    </li>
                    <?php if($this->request->params['controller'] == 'Types') $class = 'active'; else $class = ''; ?>
                    <li class="<?= $class ?>">
                      <?= $this->Html->link(__('<i class="glyphicon glyphicon glyphicon-tag"></i><span>Tipos de Contatos</span>') ,['controller' => 'Types', 'action' => 'index'], ['escape' => false]) ?>
                    </li>
                    <?php if($this->request->params['controller'] == 'Professions') $class = 'active'; else $class = ''; ?>
                    <li class="<?= $class ?>">
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-briefcase"></i><span>Profissões</span>') ,['controller' => 'Professions', 'action' => 'index'], ['escape' => false]) ?>
                    </li>
                    <?php if($this->request->params['controller'] == 'Contacts' && $this->request->params['action'] == 'tagsPrint') $class = 'active'; else $class = ''; ?>
                    <li class="<?= $class ?>">
                      <?= $this->Html->link(__('<i class="glyphicon glyphicon-print"></i><span>Impressões</span>') ,['controller' => 'Contacts', 'action' => 'tagsPrint'], ['escape' => false]) ?>
                    </li>
                    <?php if($this->request->params['action'] == 'sendmail') $class = 'active'; else $class = ''; ?>
                    <li class="<?= $class ?>">
                      <?= $this->Html->link(__('<i class="glyphicon glyphicon-envelope"></i><span>E-mails</span>') ,['controller' => 'Contacts', 'action' => 'sendmail'], ['escape' => false]) ?>
                    </li>
                    <?php if($this->request->params['controller'] == 'Contacts' && $this->request->params['action'] == 'backups') $class = 'active'; else $class = ''; ?>
                    <li class="<?= $class ?>">
                      <?= $this->Html->link(__('<i class="glyphicon glyphicon-floppy-save"></i><span>Backups</span>') ,['controller' => 'Contacts', 'action' => 'backups'], ['escape' => false]) ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php $userName = $this->request->session()->read('Auth.User.name'); ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                        class="glyphicon glyphicon-user"></span><?= $userName; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php $userId = $this->request->session()->read('Auth.User.id'); ?>
                            <li><?= $this->Html->link(__('<i class="glyphicon glyphicon-user"></i> Perfil') ,['controller' => 'Users', 'action' => 'view', $userId], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link(__('<i class="glyphicon glyphicon-wrench"></i> Usuários') ,['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
                            <li class="divider"></li>
                            <li><?= $this->Html->link(__('<i class="glyphicon glyphicon-off"></i> Sair') ,['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <footer>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.datepicker').datepicker({
              language: "pt-BR",
              format: "dd/mm/yyyy",
              autoclose: true,
              todayHighlight: true
            });
            var maskBehavior = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            options = {onKeyPress: function(val, e, field, options) {
                    field.mask(maskBehavior.apply({}, arguments), options);
                }
            };

            $('.phone').mask(maskBehavior, options);
        });
    </script>
    </footer>
</body>
</html>
