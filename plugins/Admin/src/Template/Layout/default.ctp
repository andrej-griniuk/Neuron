<?php
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Controller\Component\AuthComponent;
use Users\Model\Entity\User;
?>
<!DOCTYPE html>
<html lang="en">
<?= $this->Element('Admin.Layout' . DS . 'head') ?>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"><?= __('Toggle navigation') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link(Configure::read('Site.name'), '/', ['class' => 'navbar-brand']) ?>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= h($userInfo['name']) ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <?= $this->Html->link('<i class="fa fa-fw fa-user"></i> ' . __('Profile'), ['controller' => 'Admins', 'action' => 'profile', 'plugin' => 'Admin'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-fw fa-users"></i> ' . __('Administrators'), ['controller' => 'Admins', 'action' => 'index', 'plugin' => 'Admin'], ['escape' => false]) ?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-fw fa-power-off"></i> ' . __('Log Out'), ['controller' => 'Admins', 'action' => 'logout', 'plugin' => 'Admin'], ['escape' => false]) ?>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <?= $this->Html->link('<i class="fa fa-fw fa-child"></i> ' . __('Activities'), ['controller' => 'Activities', 'action' => 'index', 'plugin' => 'Activities'], ['escape' => false]) ?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-fw fa-map-marker"></i> ' . __('Studios'), ['controller' => 'Studios', 'action' => 'index', 'plugin' => 'Studios'], ['escape' => false]) ?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-fw fa-calendar"></i> ' . __('Classes'), ['controller' => 'Lessons', 'action' => 'index', 'plugin' => 'Lessons'], ['escape' => false]) ?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-fw fa-users"></i> ' . __('Users'), ['controller' => 'Users', 'action' => 'index', 'plugin' => 'Users'], ['escape' => false]) ?>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $this->fetch('title') ?></h1>
                </div>
            </div>

            <?= $this->Flash->render() ?>

            <?php echo $this->fetch('content'); ?>

        </div>
    </div>
    <!-- /.container -->

    <?=$this->element('Admin.Layout' . DS . 'foot', ['plugin' => 'Admin']) ?>

</body>
</html>
