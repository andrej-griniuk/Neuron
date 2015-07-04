<ul class="nav nav-pills row">
    <?php if ($user->id): ?>
    <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
    ?></li>
    <?php endif; ?>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
</ul>
<div class="users form row col-lg-6">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('name');
            echo $this->Form->input('postcode');
            echo $this->Form->input('provider');
            echo $this->Form->input('provider_uid');
            echo $this->Form->input('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
