<?php
//debug($user);
use Cake\Routing\Router;

$this->assign('title', $user->name);
?>
<div class="row">
    <div class="col-sm-12 entry-meta">
        <time class="entry-date"><?= $user->created->format('F j, Y') ?></time>
    </div>
    <div class="col-sm-8 entry-content">
        <p>
            <span class="dropcap white"><?= substr($user->about, 0, 1) ?></span><?= substr($user->about, 1) ?>
            <br /><br />
            <?= __('Subscribe for videos on lifestyle, and of course fashion + beauty tips!') ?>
        </p>
        <p style="color:black; font-weight:bold;"><a href="javascript:;" class="subscribe-call">Subscribe to <?= $user->name ?> on Faceup</a></p>
    </div>

    <div class="col-sm-4">
        <img src="img/andrej.jpg" style="width:100%">
    </div>
</div>

<h2 class="post-title"><?= __('Latest Videos') ?></h2>
<br />
<div class="clearfix">
<?php foreach ($userVideos as $v): ?>
    <?= $this->element('video', compact('v')) ?>
<?php endforeach ;?>
</div>

<div style="clear:both;"></div>
<br><br>

<h2 class="post-title">Favourite Brands</h2>

<div class="col-sm-12">
    <img style="width:100%;"
         src="https://ds22j4pvvsrl6.cloudfront.net/sites/default/files/landing_pages/shop_block_beauty.png">
</div>

