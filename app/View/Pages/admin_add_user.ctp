<section class="content-header">
    <h1>Usuarios</h1>
    <ol class="breadcrumb">
        <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/pages/users">Usuarios</a></li>
        <li><a href="javascript:;">Agregar</a></li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Agregar Usuario</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php
                echo $this->Form->create('User',['novalidate' => true,'id' => 'UserAddForm']);
                echo $this->Form->input('username',[
                        'label' => [
                            'text' => __('Nombre de usuario'),
                            'class' => 'control-label'
                        ],
                        'class' => 'form-control',
                        'div' => 'form-group col-md-4',
                        'type' => 'text'
                ]);
                
                echo $this->Form->input('password',[
                        'label' => [
                            'text' => __('Contraseña'),
                            'class' => 'control-label'
                        ],
                        'class' => 'form-control',
                        'div' => 'form-group col-md-4',
                        'type' => 'password'
                ]);
                echo $this->Form->end();
            ?>
        </div>
        <div class="box-footer">
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Crear
                </button>
                <?=$this->Html->link('<i class="fa fa-reply"></i> Volver',
                        ['action' => 'users','admin' => true],
                        ['escape' => false,'class' => 'btn btn-default']
                );?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('submit','#UserAddForm',function(e){
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