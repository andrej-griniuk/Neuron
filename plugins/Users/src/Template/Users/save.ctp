<ul class="nav nav-pills row">
    <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $user->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
        )
        ?></li>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
</ul>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <?php
        echo $this->Form->hidden('id');
        echo $this->Form->input('team_id', ['options' => $teams, 'empty' => true]);
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('password', ['value' => '']);
        echo $this->Form->input('role');
        echo $this->Form->input('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
