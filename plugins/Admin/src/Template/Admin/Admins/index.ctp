<ul class="nav nav-pills row">
    <li><?= $this->Html->link(__('New Admin'), ['action' => 'add']) ?></li>
</ul>
<div class="admins index">
    <table cellpadding="0" cellspacing="0" class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('is_active') ?></th>
            <th><?= $this->Paginator->sort('last_login_date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($admins as $admin): ?>
        <tr>
            <td><?= $this->Number->format($admin->id) ?></td>
            <td><?= h($admin->name) ?></td>
            <td><?= h($admin->email) ?></td>
            <td><?= ($admin->is_active ? __('Yes') : __('No')) ?></td>
            <td><?= h($admin->last_login_date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admin->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <li><?= $this->Paginator->numbers() ?></li>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
