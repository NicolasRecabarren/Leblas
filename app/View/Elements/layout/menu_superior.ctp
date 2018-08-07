<div class="container">
    <div class="row">
        <div class="box-img-caso1">
            <?=$this->Html->link(
                    $this->Html->image('logo_dark.png', ['alt' => 'CakePHP','class' => 'img-logo']),
                    ['controller' => 'pages', 'action' => 'home'],
                    ['escape' => false, 'class' => 'navbar-brand']
            );?>
        </div>
        <div class="box-img-caso2">
            <?=$this->Html->link(
                    $this->Html->image('logo_dark.png', ['alt' => 'CakePHP','class' => 'img-logo-2']),
                    ['controller' => 'pages', 'action' => 'home'],
                    ['escape' => false, 'class' => 'navbar-brand']
            );?>
        </div>
        <div class="col-sm-12 mainmenu_wrap"><div class="main-menu-icon visible-xs"><span></span><span></span><span></span></div>
            <ul id="mainmenu" class="nav menu sf-menu responsive-menu superfish" style="margin: 5px 0px;">
                <?php
                    $sections = [51,58,59,60,61];
                    $j = 0;
                    
                    foreach($seccionesMenu as $title => $slug): ?>
                        <li class="" style="border-radius: 10px;margin-right: 1px;">
                            <?=$this->Html->link($title,
                                    "#".($sections[$j]),
                                    ['style' => 'border-radius: 10px;','id' => "m$slug"]
                            );?>
                            <? $j++; ?>
                        </li><?php
                    endforeach;
                ?>
                <li class="" style="border-radius: 10px;margin-right: 1px;">
                    <a href="#contacto" id="mcontacto" style="border-radius: 10px;">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</div>