<ul class="nav nav-pills row">
    <?php if ($admin->id): ?>
    <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]
            )
    ?></li>
    <?php endif; ?>
        <li><?= $this->Html->link(__('List Admins'), ['action' => 'index']) ?></li>
</ul>
<div class="admins form row col-lg-6">
    <?= $this->Form->create($admin); ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('password', ['value' => '']);
            echo $this->Form->input('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
