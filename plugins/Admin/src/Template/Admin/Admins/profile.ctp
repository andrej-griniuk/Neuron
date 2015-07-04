<div class="admins form row col-lg-6">
    <?= $this->Form->create($admin); ?>
    <fieldset>
        <?php
        echo $this->Form->input('name', ['disabled' => true]);
        echo $this->Form->input('email', ['disabled' => true]);
        echo $this->Form->input('change_password', ['type' => 'checkbox']);
        ?>
        <div id="passwordFields" style="display: none">
            <?php
            echo $this->Form->input('password', ['value' => '']);
            echo $this->Form->input('password_repeat', ['label' => __('Repeat'), 'type' => 'password', 'value' => '']);
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<?php $this->append('script'); ?>
<script type="text/javascript">
    $(function(){
        $('#change-password').click(function(){
            if (this.checked)
                $('#passwordFields').show();
            else
                $('#passwordFields').hide();
        }).triggerHandler('click');
    });
</script>
<?php $this->end(); ?>
