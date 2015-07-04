<?php
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Controller\Component\AuthComponent;
use Users\Model\Entity\User;
?>
<!DOCTYPE html>
<html lang="en">
<?= $this->Element('Layout' . DS . 'head') ?>
<body style="background:#FFFFFF">

<div id="wrapper" style="padding-left: 0;">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <?= $this->Html->link(Configure::read('Site.name'), '/', ['class' => 'navbar-brand']) ?>
        </div>
    </nav>

    <div class="container" style="margin-top: 8em;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?=$this->element('Layout' . DS . 'foot') ?>

</body>
</html>
