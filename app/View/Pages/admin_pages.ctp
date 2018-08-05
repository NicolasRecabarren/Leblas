<?=$this->Html->css('admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>
<?=$this->Html->script('/css/admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>
<section class="content-header">
    <h1>Modificar Sección <small>¡modifica tu página!</small></h1>
    <ol class="breadcrumb">
        <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/pages/pages">Modificar Secciones</a></li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sección a modificar:</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
          <?=$this->Form->create('Page',['novalidate' => true]);?>
          <?=$this->Form->input('pages',[
                'label' => false,
                'div' => 'form-group col-md-12',
                'class' => 'form-control',
                'id' => 'pagesSelect',
                'empty' => 'Seleccione',
                'options' => $paginas
            ]);?>
          <?=$this->Form->end();?>
        </div>
        <div class="box-footer page-form">
          <i>Ninguna página seleccionada.</i>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('change','#pagesSelect',function(e){
            e.preventDefault();
            var $this = $(this);
            $.ajax({
                url: "<?=$this->Html->url(['plugin' => false,'controller' => 'pages','action' => 'getPage','admin' => true]);?>",
                type: "POST",
                data: {page: $this.val()},
                success: function(response){
                    $('.page-form').html(response);
                    $('.page-form form textarea').wysihtml5();
                },
                error: function(){
                    alert_error("Ha ocurrido un error.");
                }
            });
        });
        
        $('body').on('submit','#EditPageForm',function(e){
            e.preventDefault();
            var error = 0;
            
            var inputTitle = $('#PageTitle');
            if( $.trim(inputTitle.val()) == ""){
                addError(inputTitle,"Debe ingresar el título.");
                error++;
            }
            
            var inputOrder = $('#PageOrderMenu');
            if( $.trim(inputOrder.val()) == ""){
                addError(inputOrder,"Debe ingresar el orden.");
                error++;
            }
            
            if(error == 0){
                $(this).get(0).submit();
            }
            return false;
        });
    });
</script>