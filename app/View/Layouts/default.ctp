<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        <?php 
        echo 
        Configure::read('Application.name')
        .' - '.
        (!empty($title_for_layout) ? $title_for_layout : ''); 
        ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <style>
    body {
      padding-top: 60px;
      padding-bottom: 40px;
    }
    </style>
    <?php 
    echo 
    $this->Html->css('normalize.css').
    $this->Html->css('bootstrap-'.Configure::read('Layout.theme').'.min', null, array('data-extra' => 'theme')).
    $this->Html->css('bootstrap-responsive.min').
    $this->Html->css('style'); 

    if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . '.css')) {
      echo $this->Html->css($this->params->controller);
    }

    if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . DS . $this->params->action . '.css')) {
      echo $this->Html->css($this->params->controller . '/' . $this->params->action);
    }
    
    echo 
    $this->Html->script('lib/modernizr');
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <?php echo $this->Html->link(Configure::read('Application.name'), '/', array('class' => 'brand')); ?>

                <div class="nav-collapse">
                    <ul class="nav">

                        <?php 
                        if (!AuthComponent::user('id')) { ?>
                            <li class="<?php echo $this->params->controller == 'users' && $this->action == 'login' ? 'active' : ''; ?>">
                                <?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?>
                            </li>
                            <li class="<?php echo $this->params->controller == 'pages' && $this->action == 'about' ? 'active' : ''; ?>">
                                <?php echo $this->Html->link(__('About'), '/about'); ?>
                            </li>
                        <?php
                        } ?>

                        <?php 
                        if (AuthComponent::user('id')) { ?>
                            <li class="dropdown <?php echo $this->params->controller == 'customers' ? 'active' : ''; ?>">
                                <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Customers'); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                    <li class="<?php echo $this->params->controller == 'customers' && $this->action == 'index' ? 'active' : ''; ?>"><?php echo $this->Html->link(__('List'), array('controller' => 'customers', 'action' => 'index')) ?></li>
                                    <li class="<?php echo $this->params->controller == 'customers' && $this->action == 'add' ? 'active' : ''; ?>"><?php echo $this->Html->link(__('Register'), array('controller' => 'customers', 'action' => 'add')) ?></li>
                                </ul>
                            </li>
                            <li class="dropdown <?php echo $this->params->controller == 'servers' ? 'active' : ''; ?>">
                                <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Servers'); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                    <li class="<?php echo $this->params->controller == 'servers' && $this->action == 'index' ? 'active' : ''; ?>"><?php echo $this->Html->link(__('List'), array('controller' => 'servers', 'action' => 'index')) ?></li>
                                    <li class="<?php echo $this->params->controller == 'servers' && $this->action == 'add' ? 'active' : ''; ?>"><?php echo $this->Html->link(__('Register'), array('controller' => 'servers', 'action' => 'add')) ?></li>
                                </ul>
                            </li>
                            <li class="dropdown 
                                <?php 
                                echo 
                                $this->params->controller == 'connection_types' || 
                                $this->params->controller == 'users' ||
                                ($this->params->controller == 'pages' && $this->action == 'about') ||
                                ($this->params->controller == 'pages' && $this->action == 'preferences')
                                    ? 'active' 
                                    : ''; ?>">
                                <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-black icon-cog"></i><?php echo __('Config'); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                    <li class="<?php echo $this->params->controller == 'connection_types' ? 'active' : ''; ?>"><?php echo $this->Html->link(__('Connection Types'), array('controller' => 'connection_types', 'action' => 'index')) ?></li>
                                    
                                    <?php
                                    if (AuthComponent::user('role') == 'admin') { ?>
                                        <li class="<?php echo $this->params->controller == 'users' ? 'active' : ''; ?>"><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')) ?></li>
                                    <?php 
                                    } ?> 
                                    <li class="divider"></li>
                                    <li class="<?php echo $this->params->controller == 'pages' && $this->action == 'preferences' ? 'active' : ''; ?>">
                                        <?php echo $this->Html->link(__('Preferences'), '/preferences'); ?>
                                    </li>
                                    <li class="<?php echo $this->params->controller == 'pages' && $this->action == 'about' ? 'active' : ''; ?>">
                                        <?php echo $this->Html->link(__('About'), '/about'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php 
                        } ?>
                    </ul>

                    <?php 
                    if (AuthComponent::user('id')) { ?>
                        <ul class="nav pull-right">
                            <li id="fat-menu" class="dropdown">
                                <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-black icon-user"></i> 
                                    <?php echo AuthComponent::user('username') ?> 
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                    <li>
                                        <?php 
                                        echo $this->Html->link(
                                            '<i class="icon-black icon-edit"></i>'. __('Edit'),
                                            '/users/edit/'.AuthComponent::user('id'),
                                            array(
                                                'tabindex' => '-1',
                                                'escape'   => false
                                            )
                                        ); ?>
                                    </li>
                                    <li>
                                        <?php 
                                        echo $this->Html->link(
                                            '<i class="icon-black icon-off"></i>'. __('Logout'),
                                            '/users/logout',
                                            array(
                                                'tabindex' => '-1',
                                                'escape'   => false
                                            )
                                        ); ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>   
                    <?php 
                        # Busca rápida.
                        echo $this->Form->create(
                            'SearchCustomer',
                            array(
                                'url' => array(
                                    'controller' => 'customers',
                                    'action' => 'index'
                                ),
                                'class' => 'navbar-search pull-left',
                                'inputDefaults' => array(
                                    'error' => false,
                                    'label' => false
                                )
                            )
                        );
                            # Input name.
                            echo $this->Form->input('name', array(
                                'class'       => 'search-query',
                                'placeholder' => __('Search')
                            ));
                            ?>
                        </form>
                    <?php
                    } ?>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container" role="main" id="main">

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('sql_dump'); ?>

        <hr>

        <footer>
            <p>&copy; <?php echo Configure::read('Application.name') ?> 2013</p>
        </footer>

    </div> <!-- /container -->

    <!-- JS -->
    <?php
    if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . '.js')) {
        echo $this->Html->script($this->params->controller);
    }
    
    if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . DS . $this->params->action . '.js')) {
        echo $this->Html->script($this->params->controller . '/' . $this->params->action);
    }
    
    echo $this->Html->script(
        array(
            'lib/bootstrap.min',
            'src/scripts.js',
            'lib/jquery.tmpl.min',
            'lib/zeroClipboard/ZeroClipboard.min'
        ));
    ?>

    <script language="JavaScript">
        // Copy cliplboard.
        $(document).ready(function()
        {
            ZeroClipboard.setDefaults({
                moviePath: "<?php echo $this->Html->url('/js/lib/zeroClipboard/ZeroClipboard.swf', true) ?>" 
            });
        
            var clip = new ZeroClipboard($('.button-copy'));
        });
    </script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <!--<script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>-->
</body>
</html>