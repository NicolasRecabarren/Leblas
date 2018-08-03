<section class="content-header">
    <h1>Modificar Home <small>¡modifica tu página!</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Buscar página a modificar:</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
          <?=$this->Form->create('Page',['novalidate' => true]);?>
          <?=$this->Form->input('pages',[
                'label' => false,
                'div' => 'form-group',
                'class' => 'form-control',
                'options' => $paginas
            ]);?>
          <?=$this->Form->end();?>
        </div>
        <div class="box-footer">
          Footer
        </div>
    </div>
</section>