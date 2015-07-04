<?php $this->assign('h1', '-'); ?>

<!-- Login modal -->
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div style="float:right; font-size: 80%; margin-top: 3px;">
                <?= $this->Html->link(__('Forgot password?'), ['action' => 'forgot_password']) ?>
            </div>
            <div class="panel-title"><?= __('Sign In') ?></div>
        </div>
        <div style="padding-top:30px" class="panel-body">
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <?= $this->Form->create(null, ['id' => 'loginform', 'class' => 'form-horizontal']) ?>
                <?= $this->Flash->render() ?>
                <div style="margin-bottom: 25px" class="input-group">
                    <label for="email" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="email" />
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <label for="password" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="password" />
                </div>
            <!--
                <div class="input-group">
                    <?= $this->Form->input('remember', ['type' => 'checkbox', 'label' => __('Remember me')]) ?>
                </div>
                -->
                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-success']); ?>
                        <span style="margin-left:8px;"><?= __('or') ?></span>
                        <span class="pull-right" style="font-size: 85%; margin-top: 6px;"><?= __('Don\'t have an account?') ?> <?= $this->Html->link('Sign Up Here', ['action' => 'register']) ?></span>
                    </div>
                </div>
            <?= $this->Form->end() ?>
            <div style="border-top: 1px solid #999; padding-top:20px; margin-bottom: 0px;" class="row form-group">
                <div class="col-md-12">
                    <?= $this->Form->postLink('<i class="fa fa-facebook"></i>&nbsp;&nbsp;' . __('Login with Facebook'), ['action' => 'login'], ['escape' => false, 'class' => 'btn btn-primary', 'data' => ['provider' => 'Facebook']]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
