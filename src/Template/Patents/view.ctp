<?php
$this->assign('title', $patent->title);
?>

<?php $this->append('script'); ?>
<script>

var active = "<?= h($patent->id) ?>";

var links = [
  {source: "WO1985001826", target: "WO1986001632", type: "suit"},
  {source: "WO1985001826", target: "WO1987001208", type: "suit"},
  {source: "WO1985001826", target: "WO1979001045", type: "suit"},
  {source: "WO1985004727", target: "WO1979001045", type: "suit"},
  {source: "WO1979001045", target: "WO1986007459", type: "suit"},
  {source: "WO1988004057", target: "WO1986007459", type: "suit"},
  {source: "WO1988007672", target: "WO1986007459", type: "suit"},
  {source: "WO1986004728", target: "WO1981000455", type: "suit"},
  {source: "WO1985004727", target: "WO1981000455", type: "resolved"}
];

var nodes = {
};

// Compute the distinct nodes from the links.
links.forEach(function(link) {
  link.source = nodes[link.source] || (nodes[link.source] = {name: link.source});
  link.target = nodes[link.target] || (nodes[link.target] = {name: link.target});
});

nodes[active]["active"] = true;

var width = 600,
    height = 400;

var force = d3.layout.force()
    .nodes(d3.values(nodes))
    .links(links)
    .size([width, height])
    .linkDistance(60)
    .charge(-300)
    .on("tick", tick)
    .start();

var svg = d3.select("#vis").append("svg")
    .attr("width", width)
    .attr("height", height);

// Per-type markers, as they don't inherit styles.
svg.append("defs").selectAll("marker")
    .data(["suit", "licensing", "resolved"])
  .enter().append("marker")
    .attr("id", function(d) { return d; })
    .attr("viewBox", "0 -5 10 10")
    .attr("refX", 15)
    .attr("refY", -1.5)
    .attr("fill","#fff")
    .attr("markerWidth", 6)
    .attr("markerHeight", 6)
    .attr("orient", "auto")
  .append("path")
    .attr("d", "M0,-5L10,0L0,5");

var path = svg.append("g").selectAll("path")
    .data(force.links())
  .enter().append("path")
    .attr("class", function(d) { return "link " + d.type; })
    .attr("marker-end", function(d) { return "url(#" + d.type + ")"; });

var circle = svg.append("g").selectAll("circle")
    .data(force.nodes())
  .enter().append("circle")
    .attr("r", 14)
    .style({"cursor": "pointer"})
    .on('click',function(d) {
      window.location = "/neuron/patents/view/"+d.name;
    })
    .on('mouseout', function(d){
      d3.select(this).attr("r",14)
    })
    .on('mouseover', function(d){
      d3.select(this).attr("r",18)
    })
    .attr("class", function(d) { return (d.active) ? "active-node" : "inactive-node"; })
    .call(force.drag);

var text = svg.append("g").selectAll("text")
    .data(force.nodes())
  .enter().append("text")
    .attr("x", 18)
    .attr("y", ".35em")
    .text(function(d) { return d.name; });

// Use elliptical arc path segments to doubly-encode directionality.
function tick() {
  path.attr("d", linkArc);
  circle.attr("transform", transform);
  text.attr("transform", transform);
}

function linkArc(d) {
  var dx = d.target.x - d.source.x,
      dy = d.target.y - d.source.y,
      dr = Math.sqrt(dx * dx + dy * dy);
  return "M" + d.source.x + "," + d.source.y + "A" + dr + "," + dr + " 0 0,1 " + d.target.x + "," + d.target.y;
}

function transform(d) {
  return "translate(" + d.x + "," + d.y + ")";
}

</script>
<?php $this->end(); ?>

<div class="row">
    <div id="vis" class="col-lg-8">
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
            <a target="_blank" href="https://patentscope.wipo.int/search/en/detail.jsf?docId=<?= $patent->id ?>" class="btn btn-danger"><?= __('Details') ?></a>&nbsp;&nbsp;
            <a target="_blank" href="http://neuron.vanillacommunity.com/discussion/7/section-g-physics#latest" class="btn btn-warning"><?= __('Comments') ?></a>
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

<?php $this->append('script'); ?>
<script>
    var PATENT = <?= json_encode($patent) ?>;
    $(function(){
        console.log(PATENT);
        console.log(PATENT.cited);
        console.log(PATENT.citing);
    })
</script>
<?php $this->end(); ?>
