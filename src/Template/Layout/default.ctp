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
                <form action="<?= Router::url(['action' => 'index', 'controller' => 'Patents']) ?>" method="get" role="search" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" name="q" placeholder="Search..." class="form-control" value="<?php if (isset($this->request->query['q'])) echo $this->request->query['q']; ?>" />
                    </div>
                    <button class="btn btn-default" type="submit"><i class="fa fa-search" style="font-size: 1.2em"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="bs-docs-section">
            <?php if ($this->fetch('h1') != '-'): ?>
                <h1><?= ($this->fetch('h1') ? $this->fetch('h1') : $this->fetch('title')) ?></h1>
            <?php endif; ?>

            <?= $this->Flash->render() ?>

            <?php echo $this->fetch('content'); ?>
        </div>

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
