<?php $this->assign('h1', '-'); ?>

<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><?= __('Sign Up') ?></div>
        </div>
        <div class="panel-body">
            <?= $this->Form->create($user, ['id' => 'signupform', 'class' => 'form-horizontal']) ?>
                <?= $this->Flash->render() ?>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->input('name') ?>
                <?= $this->Form->input('password') ?>
                <?= $this->Form->input('password_repeat', ['label' => 'Password Confirmation', 'type' => 'password']) ?>
                <?php // $this->Form->input('invitation_code') ?>
                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <?= $this->Form->button(__('Sign Up'), ['class' => 'btn btn-info']) ?>
                        <span style="margin-left:8px;"><?= __('or') ?></span>
                    </div>
                </div>
            <?= $this->Form->end() ?>
            <div style="border-top: 1px solid #999; padding-top:20px; margin-bottom: 0;" class="row form-group">
                <div class="col-md-offset-3 col-md-9">
                    <?= $this->Form->postLink('<i class="fa fa-facebook"></i>&nbsp;&nbsp;' . __('Sign Up with Facebook'), ['action' => 'login'], ['escape' => false, 'class' => 'btn btn-primary', 'data' => ['provider' => 'Facebook']]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
