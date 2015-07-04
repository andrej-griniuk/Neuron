<?php
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Controller\Component\AuthComponent;
use Users\Model\Entity\User;
?>
<!DOCTYPE html>
<html lang="en">
<?= $this->Element('Layout' . DS . 'head') ?>
<body>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="<?= Router::url('/', true) ?>" class="navbar-brand"><?= Configure::read('Site.name') ?></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <?= $this->Element('Nav' . DS . 'main') ?>
            </ul>
        </div>
    </div>
</div>

<?php echo $this->fetch('content'); ?>

<div class="container">
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li class="pull-right"><a href="#top">Back to top</a></li>
                    <?= $this->Element('Nav' . DS . 'main') ?>
                </ul>
                <p><?= __('Copyright') ?> &copy; <?= Configure::read('Site.name') ?> <?= date('Y') ?></p>
            </div>
        </div>

    </footer>
</div>

<?=$this->element('Layout' . DS . 'foot') ?>

</body>
</html>
