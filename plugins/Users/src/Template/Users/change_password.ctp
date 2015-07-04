<?php $this->assign('h1', '-'); ?>

<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><?= __('Password Change') ?></div>
        </div>
        <div class="panel-body">
            <?= $this->Form->create(null, ['id' => 'signupform', 'class' => 'form-horizontal']) ?>
            <?= $this->Flash->render() ?>
            <?= $this->Form->input('password') ?>
            <?= $this->Form->input('password_repeat', ['label' => 'Password Confirmation', 'type' => 'password']) ?>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <?= $this->Form->button(__('Change'), ['class' => 'btn btn-info']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<br>
