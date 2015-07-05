<?php if (isset($this->request->query['q'])): ?>
    <?php $this->assign('title', __('Search: ') . $this->request->query['q']); ?>
<?php endif; ?>

<p><?= $this->Paginator->counter('{{count}} patents found') ?></p>

<table cellpadding="0" cellspacing="0" class="table table-hover table-bordered table-striped">
    <thead>
        <tr style="background: #222222;">
            <th style="width: 150px"><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= __('Inventors') ?></th>
            <th style="width: 150px"><?= $this->Paginator->sort('publication_date') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($patents as $patent): ?>
        <?php if (!$patent->inventors) continue; ?>
        <tr>
            <td><?= $this->Html->link(h($patent->id), ['action' => 'view', $patent->id]); ?></td>
            <td><?= h($patent->title) ?></td>
            <td>
            <?php
            $inventors = [];
            foreach ($patent->inventors as $inv) {
                $inventors[] = $this->Html->link(h($inv->inv_name), ['controller' => 'Inventors', 'action' => 'view', $inv->id]);
            }
            ?>
            <small><?= implode('<br />', $inventors) ?></small>
            </td>
            <td><?= h($patent->publication_date->format('d/m/Y')) ?></td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
</div>

<div style="clear:both;"></div>
<h1>CSIRO related datasets</h1>
<br>
<div id="csiro" class="row" style="margin-left:2px;"></div>

<?php if (isset($this->request->query['q'])): ?>
<?php $this->append('script'); ?>
<script>

   $(document).ready(function () {
     jQuery.browser = {};
jQuery.getFeed({
url: "api/loadCSIRO.php?name=<?= $this->request->query['q'] ?>",
   success: function(feed) {
     console.log(feed.items);
     for (var i = 0; i < 10; i++) {
       $("#csiro").append("<p><a href='"+feed.items[i].link+"'>CSIRO Dataset </a>"+feed.items[i].title+"</p>");
     }
   }
 });               
});
</script>
<?php $this->end(); ?>
<?php endif; ?>
