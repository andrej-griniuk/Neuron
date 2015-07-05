<div class="jumbotron">
    <div class="container">
        <h1>The inventors social network</h1>
        <p>Neuron is a new network that connects inventors, patents, and entrepreneurs.<br>
	Browse through patents and understand them in their wider context.<br>
	Connect with entrepreneurs and find talented inventors.
	</p>
        <?= $this->Form->create(null, ['id' => 'filter', 'type' => 'get', 'url' => ['action' => 'index', 'controller' => 'Patents']]) ?>
            <?= $this->Form->input('q', ['label' => false, 'placeholder' => 'Find a patent or inventor...', 'class' => 'input-lg']) ?>
            <button type="submit" class="btn btn-danger btn-lg"><i class="fa fa-search"></i> Search</button>
        <?= $this->Form->end() ?>
    </div>
</div>
