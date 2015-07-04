<div class="users index">
    <table cellpadding="0" cellspacing="0" class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= __('Full Name') ?></th>
            <th><?= $this->Paginator->sort('provider') ?></th>
            <th><?= $this->Paginator->sort('is_active') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->full_name) ?></td>
            <td><?= h($user->provider) ?></td>
            <td><?= ($user->is_active ? __('Yes') : __('No')) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?php // $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
