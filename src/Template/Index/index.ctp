<div class="jumbotron">
    <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <?= $this->Form->create(null, ['id' => 'filter', 'type' => 'get', 'url' => ['action' => 'index', 'controller' => 'Patents']]) ?>
            <?= $this->Form->input('q', ['label' => false, 'placeholder' => 'search...', 'class' => 'input-lg']) ?>
            <button type="submit" class="btn btn-danger btn-lg"><i class="fa fa-search"></i> Search</button>
        <?= $this->Form->end() ?>
    </div>
</div>
