<?php

Router::connect('/', array('admin' => true, 'controller' => 'plans', 'action' => 'index'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
