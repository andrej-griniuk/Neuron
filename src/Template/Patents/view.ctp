<?php
$this->assign('title', $patent->title);
?>

<div class="row">
    <div class="col-lg-8">
        [TREE]
    </div>
    <div class="col-lg-4">
        <h3><?= __('Patent') ?></h3>
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th><?= __('Publication Date') ?></th>
                    <td><?= $patent->publication_date->format('j F Y') ?></td>
                </tr>
                <tr>
                    <th><?= __('Patent ID') ?></th>
                    <td><?= h($patent->id) ?></td>
                </tr>
            <?php if ($patent->inventors): ?>
                <?php if ($patent->inventors[0]->pct_app): ?>
                <tr>
                    <th><?= __('Pct App') ?></th>
                    <td><?= h($patent->inventors[0]->pct_app) ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($patent->inventors[0]->app_id): ?>
                <tr>
                    <th><?= __('Application ID') ?></th>
                    <td><?= h($patent->inventors[0]->app_id) ?></td>
                </tr>
                <?php endif; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <p>
            <a href="https://patentscope.wipo.int/search/en/detail.jsf?docId=<?= $patent->id ?>" class="btn btn-danger"><?= __('Details') ?></a>
        </p>
        <?php if ($patent->inventors): ?>
            <h3><?= __('Inventors') ?></h3>
            <table class="table table-hover table-bordered">
            <?php foreach ($patent->inventors as $inventor): ?>
                <tr>
                    <td>
                        <?= $this->Html->link(h($inventor->inv_name), ['action' => 'view', $inventor->id, 'controller' => 'Inventors']) ?><br />
                        <small><?= h($inventor->address) ?>, <?= h($inventor->reg_code) ?></small>
                    </td>
                    <td>
                        <?= h($inventor->ctry_code) ?>
                    </td>
                    <td>
                        <?= h($inventor->inv_share * 100) ?>%
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php
debug($patent->cited);
debug($patent->citing);
?>
