<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->fetch('title');?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <?= $this->Html->css('admin/bootstrap/dist/css/bootstrap.min.css');?>
        <?= $this->Html->css('admin/font-awesome/css/font-awesome.min.css');?>
        <?= $this->Html->css('admin/Ionicons/css/ionicons.min.css');?>
        <?= $this->Html->css('admin/dist/css/AdminLTE.min.css');?>
        <?= $this->Html->css('admin/dist/css/skins/_all-skins.min.css');?>
        <?= $this->Html->css('jquery.toast.css');?>

        <?= $this->Html->script('/css/admin/jquery/dist/jquery.min.js');?>
        <?= $this->Html->script('/css/admin/bootstrap/dist/js/bootstrap.min.js');?>
        <?= $this->Html->script('/css/admin/jquery-slimscroll/jquery.slimscroll.min.js');?>
        <?= $this->Html->script('/css/admin/fastclick/lib/fastclick.js');?>
        <?= $this->Html->script('/css/admin/dist/js/adminlte.min.js');?>
        <?= $this->Html->script('/css/admin/dist/js/demo.js');?>
        <?= $this->Html->script('admin');?>
        <?= $this->Html->script('vendor/jquery.toast.js');?>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php echo $this->Session->flash(); ?>
            <header class="main-header">
                <!-- Logo -->
                <a href="javascript:;" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user-circle"></i>
                                    <span class="hidden-xs"><?=$logged_user['username'];?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header" style="height: 80px;">
                                        <i class="fa fa-user-circle fa-2x" style="color: #FFF;"></i>
                                        <p><?=$logged_user['username'];?></p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <?= $this->Html->link(__('Cerrar Sesión'),
                                                    ['controller' => 'pages','action' => 'logout','admin' => true],
                                                    ['class' => 'btn btn-default btn-flat','escape' => false]
                                            );?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <span class="fa fa-user-circle fa-3x" style="color: #FFF;"></span>
                        </div>
                        <div class="pull-left info">
                            <p><?=$logged_user['username'];?></p>
                            <a href="javascript:;"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header"><?= __('NAVEGACIÓN');?></li>
                        <li>
                            <?= $this->Html->link('<i class="fa fa-edit"></i><span>'.__('Modificar Secciones').'</span>',
                                    ['controller' => 'pages','action' => 'pages','admin' => true],
                                    ['class' => false,'escape' => false]
                            );?>
                        </li>
                        <!--<li class="treeview">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i> <span>Galerías</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Listado galerías').'</span>',
                                            'javascript:;',
                                            ['class' => false,'escape' => false]
                                    );?>
                                </li>
                                <li>
                                    <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>'.__('Listado Imágenes').'</span>',
                                            'javascript:;',
                                            ['class' => false,'escape' => false]
                                    );?>
                                </li>
                            </ul>
                        </li>-->
                        <li>
                            <?= $this->Html->link('<i class="fa fa-users"></i><span>'.__('Usuarios').'</span>',
                                    ['controller' => 'pages','action' => 'users','admin' => true],
                                    ['class' => false,'escape' => false]
                            );?>
                        </li>
                        <li>
                            <?= $this->Html->link('<i class="fa fa-envelope"></i><span>'.__('Contactos').'</span>',
                                    ['controller' => 'pages','action' => 'contacts','admin' => true],
                                    ['class' => false,'escape' => false]
                            );?>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?=$this->fetch('content');?>
            </div>
            
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab"></div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>Some information about this general settings option</p>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>Other sets of options are available</p>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>Allow the user to show his name in blog posts</p>
                            </div>
                            <!-- /.form-group -->
                            <h3 class="control-sidebar-heading">Chat Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('.sidebar-menu').tree();
            });
        </script>
    </body>
</html>