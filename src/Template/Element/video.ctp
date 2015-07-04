<?php
use Cake\Routing\Router;
?>
<a
    href="<?= Router::url(['action' => 'view', $v->id, 'controller' => 'Videos', 'plugin' => false]) ?>"
    class="picture-item zoom-box"
    data-part='<?= json_encode($v->part) ?>'
    data-season='<?= json_encode($v->season) ?>'
    data-color='<?= json_encode($v->color) ?>'
    data-occasion='<?= json_encode($v->occasion) ?>'
    >
    <figure><img src="http://img.youtube.com/vi/<?= $v->youtube_id ?>/mqdefault.jpg" class="img-responsive" style="width:100%" /></figure>
    <div class="picture-item__details zoom-mask">
        <figcaption class="picture-item__title"><?= h($v->title) ?></figcaption>
    </div>
</a>
