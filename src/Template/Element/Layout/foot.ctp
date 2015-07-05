<?php
use Cake\Core\Configure;
use Cake\Utility\Inflector;
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/jquery.jfeed.js"></script>

<?php
$this->append('script', $this->Html->script([
    'app',
]));
?>
<?php
$controller = Inflector::variable($this->request->params['controller']);
$action = Inflector::variable($this->request->params['action']);

if (is_readable(WWW_ROOT . 'js' . DS . ($path = 'c' . DS . $controller) . '.js')) {
    $this->append('script', $this->Html->script($path));
}

if (is_readable(WWW_ROOT . 'js' . DS . ($path = 'c' . DS . $controller . DS . $action) . '.js')) {
    $this->append('script', $this->Html->script($path));
}
?>
<?= $this->fetch('script') ?>
