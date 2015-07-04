<ul class="nav nav-pills row">
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
</ul>

<div class="users row col-lg-12">
    <table class="table">
        <tbody>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('First Name') ?></th>
                <td><?= h($user->first_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Last Name') ?></th>
                <td><?= h($user->last_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Provider') ?></th>
                <td><?= h($user->provider) ?></td>
            </tr>
            <tr>
                <th><?= __('Last Login Date') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Last Login IP') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Is Active') ?></th>
                <td>
                    <?php if ($user->is_active): ?>
                        <?= __('Yes') ?>
                        <?= $this->Form->postLink(__('Deactivate'), ['action' => 'active', $user->id, 0], ['class' => 'btn btn-warning']) ?>
                    <?php else: ?>
                        <?= __('No') ?>
                        <?= $this->Form->postLink(__('Activate'), ['action' => 'active', $user->id, 1], ['class' => 'btn btn-success']) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($user->modified) ?></td>
            </tr>
        </tbody>
    </table>
</div>
