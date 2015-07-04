<?php
$this->assign('h1','-');
?>

<h2>Revenue Opportunities</h2>
<br>
<ul style="font-size:20px;line-height:40px; list-style-type:none">
<li><input type="checkbox"> &nbsp;Product Referral Revenue
<li><input type="checkbox"> &nbsp;Advertising
<li><input type="checkbox"> &nbsp;Private Video Tutorials
<li><input type="checkbox"> &nbsp;Custom Makeup Box

</ul>
<br>
<p>Account linked using &nbsp;<img src="http://tradiewebguys.com.au/site/wp-content/uploads/2014/08/paypal-logo.png" style="width:80px;">
<br><a href="#">Unlink</a> / <a href="#">View Account</a></p>


<img style="margin-top:8px;max-width:800px;" src="https://open.bufferapp.com/wp-content/uploads/2014/04/Screen-Shot-2014-04-28-at-9.34.08-PM.png">
<br>
<br>
<h2>Special Referrals</h2>
<br>
<div class="row">
<div class="col-sm-5">
<p>New special offer from Maybelline. Earn <b>20%</b> for each referral of Maybelline Fruit Jel Tip Lip Gloss.</p>
</div>
<div class="col-sm-4">
<img style="width:100%" src="./img/gloss.jpg">
</div>
</div>

<h2>Preferences</h2>
<br>
<div class="row col-lg-6" style="margin-bottom:30px;">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        ?>
        <?php if (!$user->provider): ?>
            <?php
            echo $this->Form->input('change_password', ['type' => 'checkbox']);
            ?>
            <div id="passwordFields" style="display: none">
                <?php
                echo $this->Form->input('password', ['value' => '']);
                echo $this->Form->input('password_repeat', ['label' => __('Repeat'), 'type' => 'password', 'value' => '']);
                ?>
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
        <?php endif; ?>
    </fieldset>
    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
