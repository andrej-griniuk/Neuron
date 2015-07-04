<?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->input('email') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login'), ['class' => 'btn-primary']); ?>
<?= $this->Form->end() ?>
