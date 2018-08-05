<section class="content-header">
    <h1>Contactos Recibidos</h1>
    <ol class="breadcrumb">
        <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/pages/contacts">Contactos</a></li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Contactos</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono de contacto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td><?= $contact['Contact']['id'];?></td>
                            <td><?= $contact['Contact']['nombre'];?></td>
                            <td><?= $contact['Contact']['email'];?></td>
                            <td><?= $contact['Contact']['telefono'];?></td>
                            <td>
                                <?= $this->Html->link('<i class="fa fa-eye"></i> Ver',
                                        ['controller' => 'pages','action' => 'view_contact', 'admin' => true,$contact['Contact']['id']],
                                        ['class' => 'btn btn-xs btn-success','escape' => false]
                                );?>
                                <?= $this->Html->link('<i class="fa fa-refresh"></i> Eliminar',
                                        ['controller' => 'pages','action' => 'admin_delete_contact', 'admin' => true,$contact['Contact']['id']],
                                        ['class' => 'btn btn-xs btn-default','escape' => false,'confirm' => '¿Está seguro de eliminar este contacto?']
                                );?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>