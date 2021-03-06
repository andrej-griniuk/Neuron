<?php
use Cake\Routing\Router;
use Cake\Utility\Inflector;
use Cake\Core\Configure;
?>
<head>
    <base href="<?= Router::url("/", true) ?>" />
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <?= $this->fetch('meta') ?>
    <title><?= $this->fetch('title') ?> - <?= Configure::read('Site.name') ?></title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <?php
    $this->append('css', $this->Html->css([
        'bootstrap.min.css',
        'app.css',
    ]));

    $controller = Inflector::variable($this->request->params['controller']);
    $action = Inflector::variable($this->request->params['action']);

    if (is_readable(WWW_ROOT . 'css' . DS . ($path = 'c' . DS . $controller . '.css'))) {
        $this->append('css', $this->Html->css($path));
    }

    if (is_readable(WWW_ROOT . 'css' . DS . ($path = 'c' . DS . $controller . DS . $action . '.css'))) {
        $this->append('css', $this->Html->css($path));
    }
    ?>
    <?= $this->fetch('css') ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
