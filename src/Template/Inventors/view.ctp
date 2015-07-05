<?php
$this->assign('title', $inventor->inv_name);
?>
<p>

</p>
<div class="row">
<div class="col-sm-9">
<p style="margin-top:10px;margin-bottom:20px;">Internet enthusiast. Certified problem solver. Bacon nerd. Beer ninja. Communicator.</p>
<button class="btn btn-sm btn-info">Twitter</button> &nbsp;&nbsp;
<button class="btn btn-sm btn-warning">LinkedIn</button>
</div>
<div class="col-sm-3">
<img src="http://api.randomuser.me/portraits/med/men/<?=rand ( 20 , 50 ) ?>.jpg">
</div>
</div>
<h3><?= __('Patents') ?></h3>
<table cellpadding="0" cellspacing="0" class="table table-hover table-bordered table-striped">
    <thead>
    <tr>
        <th style="width: 150px"><?= __('Id') ?></th>
        <th><?= __('Title') ?></th>
        <th><?= __('Inventors') ?></th>
        <th style="width: 150px"><?= __('Publication Date') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($patents as $patent): ?>
        <tr>
            <td><?= $this->Html->link(h($patent->id), ['action' => 'view', $patent->id, 'controller' => 'Patents']); ?></td>
            <td><?= h($patent->title) ?></td>
            <td>
                <?php
                $inventors = [];
                foreach ($patent->inventors as $inv) {
                    $inventors[] = $this->Html->link(h($inv->inv_name), ['controller' => 'Inventors', 'action' => 'view', $inv->id]);
                }
                ?>
                <small><?= implode('<br />', $inventors) ?></small>
            </td>
            <td><?= h($patent->publication_date->format('d/m/Y')) ?></td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>

<div id="other-inventions"></div>

