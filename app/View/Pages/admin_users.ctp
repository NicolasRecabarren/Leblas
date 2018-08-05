<section class="content-header">
    <h1>Listado de Usuarios</h1>
    <ol class="breadcrumb">
        <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/pages/users">Usuarios</a></li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Usuarios</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?= $this->Html->link('<i class="fa fa-plus"></i> &nbsp;&nbsp;Agregar',
                    ['controller' => 'pages','action' => 'add_user', 'admin' => true],
                    ['class' => 'btn btn-primary','escape' => false,'style' => 'margin-bottom: 20px;']
            );?>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nombre de Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= $user['User']['username'];?></td>
                            <td><?= $user['User']['status'] ? 'Habilitado' : 'Inhabilitado';?></td>
                            <td>
                                <?= $this->Html->link('<i class="fa fa-edit"></i> Editar',
                                        ['controller' => 'pages','action' => 'edit_user', 'admin' => true,$user['User']['id']],
                                        ['class' => 'btn btn-xs btn-success','escape' => false]
                                );?>
                                <?= $this->Html->link('<i class="fa fa-refresh"></i> Cambiar estado',
                                        ['controller' => 'pages','action' => 'admin_disable_user', 'admin' => true,$user['User']['id']],
                                        ['class' => 'btn btn-xs btn-default','escape' => false]
                                );?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>