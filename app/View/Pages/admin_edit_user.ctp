<section class="content-header">
    <h1>Usuarios</h1>
    <ol class="breadcrumb">
        <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/pages/users">Usuarios</a></li>
        <li><a href="javascript:;">Editar</a></li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Usuario</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <?php echo $this->Form->create('User',['novalidate' => true,'id' => 'UserEditForm']); ?>
        <div class="box-body">
            <?php
                echo $this->Form->hidden('id');
                echo $this->Form->input('username',[
                        'label' => [
                            'text' => __('Nombre de usuario'),
                            'class' => 'control-label'
                        ],
                        'class' => 'form-control',
                        'div' => 'form-group col-md-4',
                        'type' => 'text'
                ]);
                
                $this->request->data['User']['password'] = "";
                echo $this->Form->input('password',[
                        'label' => [
                            'text' => __('Contraseña'),
                            'class' => 'control-label'
                        ],
                        'class' => 'form-control',
                        'div' => 'form-group col-md-4',
                        'type' => 'password'
                ]);
            ?>
        </div>
        <div class="box-footer">
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <?=$this->Html->link('<i class="fa fa-reply"></i> &nbsp;&nbsp;Volver',
                        ['action' => 'users','admin' => true],
                        ['escape' => false,'class' => 'btn btn-default']
                );?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('submit','#UserEditForm',function(e){
            e.preventDefault();
            var error = 0;
            
            var inputUsername = $('#UserUsername');
            if( $.trim(inputUsername.val()) == "" ){
                addError(inputUsername.parent(),"Campo obligatorio.");
                error++;
            }
            
            if(error == 0){
                $(this).get(0).submit();
            }
            return false;
        });
    });
</script>