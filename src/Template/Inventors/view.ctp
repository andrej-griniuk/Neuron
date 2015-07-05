<?php
$this->assign('title', $inventor->inv_name);
?>
<p>

</p>
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

