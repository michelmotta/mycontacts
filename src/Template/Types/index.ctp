<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
    function myLinkBuilder (data, type, full, meta, edit, editUrl, view, viewUrl) {
        return '<div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs">Escolher <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="' + viewUrl + '/' + data + '">' + view + '</a></li><li><a href="' + editUrl + '/' + data + '">' + edit + '</a></li></ul>';
    }
</script>
<div class="card">
    <div class="card-body">
        <nav>
            <?= $this->Html->link(__('Novo Tipo de Contato'), ['action' => 'add'], ['class' => 'btn btn-primary pull-right']) ?>
        </nav>
        <div class="categories index large-9 medium-8 columns content">
            <h3><?= __('Tipos de Contato') ?></h3>
        <?php
        $options = [
            'language' => [
                'url' => 'http://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json'
            ],
            'ajax' => [
                'url' => $this->Url->build() // current controller, action, params
            ],
            'data' => $data,
            'deferLoading' => $data->count(), // https://datatables.net/reference/option/deferLoading
            'columns' => [
                [   
                    'title' => __('Id'),
                    'name' => 'Types.id',
                    'data' => 'id',
                    'searchable' => false,
                ],
                [
                    'title' => __('Nome'),
                    'name' => 'Types.name',
                    'data' => 'name'
                ],
                [
                    'title' => __('Criado'),
                    'name' => 'Types.created',
                    'data' => 'created',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.intlDateTime("pt-BR")')
                ],
                [
                    'title' => __('Modificado'),
                    'name' => 'Types.modified',
                    'data' => 'modified',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.intlDateTime("pt-BR")')
                ],
                [
                    'title' => __('Ações'),
                    'data' => 'id',
                    'sortable' => false,
                    'searchable' => false,
                    'render' => $this->DataTables->callback('myLinkBuilder', [__('Editar'), $this->Url->build(['action' => 'edit']), __('Ver'), $this->Url->build(['action' => 'view'])]),
                ],
            ],
            'order' => [0, 'asc'], // order by id
        ];
        echo $this->DataTables->table('categories-table', $options, ['class' => 'table']);
        ?>
    </div>
</div>