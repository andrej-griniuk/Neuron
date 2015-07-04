<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Inventor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patents'), ['controller' => 'Patents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patent'), ['controller' => 'Patents', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="inventors index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('patent_id') ?></th>
            <th><?= $this->Paginator->sort('pct_app') ?></th>
            <th><?= $this->Paginator->sort('appln_id') ?></th>
            <th><?= $this->Paginator->sort('inv_name') ?></th>
            <th><?= $this->Paginator->sort('address') ?></th>
            <th><?= $this->Paginator->sort('reg_code') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($inventors as $inventor): ?>
        <tr>
            <td><?= $this->Number->format($inventor->id) ?></td>
            <td>
                <?= $inventor->has('patent') ? $this->Html->link($inventor->patent->title, ['controller' => 'Patents', 'action' => 'view', $inventor->patent->id]) : '' ?>
            </td>
            <td><?= h($inventor->pct_app) ?></td>
            <td><?= $this->Number->format($inventor->appln_id) ?></td>
            <td><?= h($inventor->inv_name) ?></td>
            <td><?= h($inventor->address) ?></td>
            <td><?= h($inventor->reg_code) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $inventor->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventor->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventor->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
